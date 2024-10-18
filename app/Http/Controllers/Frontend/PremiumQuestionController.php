<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mybookshelf;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PremiumQuestionController extends Controller
{
    // public function premiumQuestion()
    // {
    //     $categoryIds = Question::where('plan_type', 'premium')
    //         ->pluck('category_id')
    //         ->unique();
    //     // dd($categoryIds);
    //     $types = Type::all();
    //     $categories = Category::whereIn('id', $categoryIds)->get();
    //     return view('frontend.premium-question', compact('categories','types'));
    // }

    //     public function premiumQuestion(Request $request)
    //     {
    //         $categoryIds = Question::where('plan_type', 'premium')
    //             ->pluck('category_id')
    //             ->unique();

    // //         $categoriesWithParent = Category::whereIn('id', $categoryIds)
    // //             ->orWhereIn('parent_id', $categoryIds)
    // //             // ->where('parent_id', '=', 0)
    // // // ->with('recursiveCategory')
    // //             ->get();
    //         // $categoriesWithParent = Category::with('recursiveCategory') ->get();
    //         $categories = Category::whereIn('id', $categoryIds)->get();
    //         dd($categories);


    //         return view('frontend.premium-question', compact('categories'));
    //     }

    public function premiumQuestion(Request $request)
    {
        $userCategoryIds = Mybookshelf
        ::where('user_id', auth()->id())
        ->pluck('category_id')
        ->toArray();
        $categories = Category::where('is_premium', 1)->where('status', 1)->with('questions')->get();
        return view('frontend.premium-question', compact('categories','userCategoryIds'));
    }

   // In PremiumQuestionController.php
// In PremiumQuestionController.php
public function questionDetails($id)
{
    $category = Category::find($id);

    if (!$category) {
        abort(404, 'Category not found');
    }

    return view('frontend.question_details', compact('category'));
}
// public function details()
// {

//     return view('frontend.question_details');
// }


    public function showBookshelfCategory()
    {
        $categoryIds = Mybookshelf::where('user_id',auth()->id())->pluck('category_id');
        $categories = Category::whereIn('id',$categoryIds)->get();
        return view('frontend.bookshelf.category',compact('categories'));
    }


    public function questionShow($id)
    {
        $filter = request('filter', 'all');

        $query = Question::where('category_id', $id)->where('status', 1);

        if ($filter === 'newest') {
            $query->orderBy('created_at', 'desc');
        }

        $questions = $query->get();
        $totalQuestion = $questions->count();

        return view('frontend.bookshelf.question', compact('questions', 'totalQuestion', 'id'));
    }


}
