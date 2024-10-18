<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Type;
use App\Models\Pages;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Question;
use App\Models\Mybookshelf;
use Illuminate\Http\Request;
use setasign\Fpdi\PdfReader\Page;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function ocrImage(Request $request)
    {
       
        $request->validate([
            'image' => 'required|image|max:5120', // 5MB Max
        ]);

       
        $imagePath = $request->file('image')->getPathname();
        $imageData = base64_encode(file_get_contents($imagePath));

        // Google Vision API URL
        $url = 'https://vision.googleapis.com/v1/images:annotate?key=' . env('GOOGLE_API_KEY');

        // Prepare the request payload
        $payload = [
            'requests' => [
                [
                    'image' => [
                        'content' => $imageData,
                    ],
                    'features' => [
                        [
                            'type' => 'TEXT_DETECTION',
                        ],
                    ],
                ],
            ],
        ];

        // Make the HTTP request to Google Vision API
        $response = Http::post($url, $payload);

        // Debug the response
        if ($response->failed()) {
            // Log the error message for debugging
            \Log::error('Google Vision API Error:', $response->json());

            // Return the view with error details
            return view('frontend.ocr-result', [
                'success' => false,
                'message' => 'Error processing the image.',
                'error_details' => $response->json(), // Include detailed error information
            ]);
        }

        // Process the successful response
        $result = $response->json();
        $textAnnotations = $result['responses'][0]['textAnnotations'] ?? [];
        $detectedText = $textAnnotations ? $textAnnotations[0]['description'] : '';

        return view('frontend.ocr-result', [
            'success' => true,
            'text' => $detectedText,
        ]);
    }
    public function home()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('frontend.home', compact('sliders'));
    }

    // Method to show the OCR result view
    public function showOcrResult()
    {
        return view('frontend.ocr-result');
    }


    // public function allClass(Request $request)
    // {
    //     $categories = Category::where('parent_id', 0)->get();
    //     $subcategories = Category::where('parent_id', '!=', 0)->get();
    //     $types = Type::all();

    //     // Get category_id from query parameters
    //     $category_id = $request->query('category_id', null);

    //     if ($category_id) {
    //         $questions = Question::with('type')
    //             ->where('category_id', $category_id)
    //             ->get()
    //             ->groupBy('type_id');
    //     } else {
    //         $questions = Question::with('type')->get()->groupBy('type_id');
    //     }

    //     return view('frontend.all-class-question', compact('types', 'questions', 'categories', 'category_id','subcategories'));
    // }

    public function allClass(Request $request)
    {
        $categories = Category::where('status', 1)->where('is_premium', 0)->where('parent_id', 0)->get();
        $category_id = $request->input('category_id');
        $subcategory_id = $request->input('subcategory_id');
        $subsubcategory_id = $request->input('subsubcategory_id');
        $premiumCategories = Category::where('is_premium', 1)->where('status', 1)->with('questions')->get();
        $userCategoryIds = Mybookshelf::where('user_id', auth()->id())->pluck('category_id')->toArray();

        $subcategories = $category_id ? Category::where('parent_id', $category_id)->where('is_premium', 0)->get() : collect();
        $subsubcategories = $subcategory_id ? Category::where('parent_id', $subcategory_id)->where('is_premium', 0)->get() : collect();

        $questions = collect();

        if ($subsubcategory_id) {
            $questions = Question::where('category_id', $subsubcategory_id);
        } elseif ($subcategory_id) {
            $questions = Question::where('category_id', $subcategory_id);
        } elseif ($category_id) {
            $questions = Question::where('category_id', $category_id);
        } else {
            $questions = Question::whereIn('category_id', $categories->pluck('id'));
        }

        $questions = $questions->whereHas('category', function($query) {
            $query->where('is_premium', 0);
        });

        $questions = $questions->with(['type', 'category'])->get()->groupBy('type_id');

        $types = Type::all();

        return view('frontend.all-class-question', compact(
            'categories', 'subcategories', 'subsubcategories', 'questions', 'types',
            'category_id', 'subcategory_id', 'subsubcategory_id', 'premiumCategories', 'userCategoryIds'
        ));
    }

    public function searchQuestions(Request $request)
    {
        $categoryId = $request->input('category');
        $question = $request->input('question');

        $query = Question::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        if ($question) {
            $query->where('question', 'LIKE', "%{$question}%");
        }
        $results = $query->with(['category' => function($query) {
            $query->select('id', 'category_name');
        }])->get();
        $categories = Category::all();

        return view('frontend.search-results', compact('results', 'categories', 'categoryId', 'question'));
    }

    public function allPages($slug)
    {
        $allPages = Pages::where('status', 1)->where('slug', $slug)->first();
        return view('frontend.pages', compact('allPages'));
    }

    public function contactInfo(){
        return view('frontend.contact_us');
    }

    public function SubmitContact(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'sometimes',
            'message' => 'required|string',
        ]);

        try {
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone ?? '',
                'message' => $request->message,
            ]);

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {

            return back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
}
