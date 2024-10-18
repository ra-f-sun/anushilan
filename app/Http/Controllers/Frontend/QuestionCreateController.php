<?php

namespace App\Http\Controllers\Frontend;

use Mpdf\Mpdf;
use App\Models\Category;
use App\Models\Question;
use App\Models\QuestionSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class QuestionCreateController extends Controller
{
    public function questionCreate($id)
    {
        $filter = request('filter', 'all');

        $query = Question::where('category_id', $id)->where('status', 1);

        if ($filter === 'newest') {
            $query->orderBy('created_at', 'desc');
        }

        $questions = $query->get();
        $totalQuestion = $questions->count();

        return view('frontend.question_create', compact('questions', 'totalQuestion', 'id'));
    }



    public function generatePDF(Request $request)
    {
        $selectedQuestionIds = $request->input('selected_questions', []);
        if (empty($selectedQuestionIds)) {
            return redirect()->back()->with('error', 'Please select at least one question.');
        }
        if (Auth::user()->user_type == 'teacher' || Auth::user()->user_type == 'student') {
            $selectedQuestions = Question::whereIn('id', $selectedQuestionIds)->with('category')->get();

            $categoryName = '';

            if ($selectedQuestions->count() > 0) {
                $categoryId = $selectedQuestions->first()->category_id;
                $category = Category::find($categoryId);
                $categoryName = $category ? strip_tags($category->category_name) : $categoryName;
            }

            $mpdf = new \Mpdf\Mpdf([
                'fontDir' => [realpath(public_path('fonts'))],
                'fontdata' => [
                    'solaimanlipi' => [
                        'R' => 'solaimanlipi/SolaimanLipi-Regular.ttf',
                    ],
                ],
                'default_font' => 'solaimanlipi',
            ]);

            $html = '<html><head><style>
            body { font-family: solaimanlipi, sans-serif; font-size: 14px; line-height: 1.6; }
            .category-name { margin-bottom: 20px; font-size: 16px; font-weight: bold; }
            .question-list { list-style-type: none; padding: 0; }
            .question-item { margin-bottom: 20px; }
            .question-content { display: flex; flex-direction: column; margin-bottom: 1px; }
            .question-number { font-weight: bold; margin-bottom: 5px; }
            .answer { font-weight: bold; margin-top: 5px; }
        </style></head><body>';

            if (!empty($categoryName)) {
                $html .= '<div class="category-name">Category: ' . htmlspecialchars($categoryName) . '</div>';
            }

            $html .= '<ul class="question-list">';

            foreach ($selectedQuestions as $key => $question) {
                $formattedQuestion = htmlspecialchars_decode($question->question);
                $formattedAnswer = htmlspecialchars_decode($question->answer);

                $html .= '<li class="question-item">';
                $html .= '<div class="question-content">';
                $html .= '<div class="question-number">' . ($key + 1) . '</div>';
                $html .= '<div class="question-text">' . nl2br($formattedQuestion) . '</div>';
                $html .= '</div>';
                $html .= '<div class="answer">Answer: ' . nl2br($formattedAnswer) . '</div>';
                $html .= '</li>';
            }

            $html .= '</ul></body></html>';

            $mpdf->WriteHTML($html);


            return $mpdf->Output('selected_questions.pdf', 'D'); // 'D' for download
        } else {
            return redirect()->back()->with('error', 'Only teachers are allowed for creating questions.');
        }
    }

    public function makeQuestion(Request $request)
    {
        $request->validate([
            'selected_questions' => 'required|array',
            'selected_questions.*' => 'integer|exists:questions,id',
        ]);

        $selectedQuestions = $request->input('selected_questions', []);
        $questions = Question::whereIn('id', $selectedQuestions)->get();
        $totalQuestion = $questions->count();

        return view('frontend.exam_question', compact('questions', 'totalQuestion'));
    }
}
