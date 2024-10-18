<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function categoryWiseExam()
    {
        $categories = Category::where('is_premium', 0)->get();
        return view('frontend.category_wise_question', compact('categories'));
    }

    public function showExamQuestion($id)
    {
        $questions = Question::where('category_id', $id)->where('status', 1)->get();
        $totalQuestion = $questions->count();
        return view('frontend.exam_question', compact('questions', 'totalQuestion', 'id'));
    }



    public function submitExam(Request $request)
    {
        $userAnswers = $request->input('answers');
        $score = 0;
        $totalQuestions = count($userAnswers);

        foreach ($userAnswers as $questionId => $userAnswer) {
            $question = Question::find($questionId);
            $correctAnswer = $question->answer;
            $category_id = $question->category_id;
            $normalizedUserAnswer = $this->normalizeText($userAnswer);
            $normalizedCorrectAnswer = $this->normalizeText($correctAnswer);

            if ($normalizedUserAnswer === $normalizedCorrectAnswer) {
                $score++;
            }
        }
    if ($totalQuestions > 0) {
        $percentage = ($score / $totalQuestions) * 100;
    } else {
        $percentage = 0;
    }

        return view('frontend.exam_result', compact('score', 'totalQuestions','percentage','category_id'));
        }

    private function normalizeText($text)
    {
        $text = trim($text);
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);

        return $text;
    }

}
