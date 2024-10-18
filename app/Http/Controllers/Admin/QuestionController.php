<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Options;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('admin.question.index', compact('questions'));
    }

    public function create()
    {
        $types = Type::where('status', 1)->get();
        return view('admin.question.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'question' => 'required|string',
            'type_id' => 'required',
            'description' => 'sometimes|string',
            'status' => 'required|integer',
        ]);

        $question = Question::create([
            'question' => $request->question,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'answer' => $request->answer,
            'description' => $request->description,
            'status' => $request->status,
            // 'plan_type' => $request->plan_type,
        ]);
        if ($request->hasFile('image')) {
            $question->addMediaFromRequest('image')->toMediaCollection();
        }

        // $options = [
        //     ['option' => $request->option_1, 'question_id' => $question->id],
        //     ['option' => $request->option_2, 'question_id' => $question->id],
        //     ['option' => $request->option_3, 'question_id' => $question->id],
        //     ['option' => $request->option_4, 'question_id' => $question->id],
        // ];

        // foreach ($options as $index => $option) {
        //     $optionModel = Options::create($option);

        //     if ($request->answer === "option_" . ($index + 1)) {
        //         $question->update(['answer_id' => $optionModel->id]);
        //     }
        // }

        return redirect()->route('question.index')->with('success', 'Question created successfully!');
    }


    public function edit(string $id)
    {
        $categories = Category::with('children')->get();
        $types = Type::where('status', 1)->get();
        $questions = Question::with('options')->findOrFail($id);

        return view('admin.question.edit', [
            'questions' => $questions,
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'question' => 'required|string',
            'description' => 'sometimes|string',
            'type_id' => 'required',
            'status' => 'required|integer',

        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status
        ]);
        if ($request->hasFile('image')) {
            $question->clearMediaCollection();
            $question->addMediaFromRequest('image')->toMediaCollection();
        }
        // $options = $question->options;
        // $options[0]->update(['option' => $request->option_1]);
        // $options[1]->update(['option' => $request->option_2]);
        // $options[2]->update(['option' => $request->option_3]);
        // $options[3]->update(['option' => $request->option_4]);

        return redirect()->route('question.index')->with('success', 'Question updated successfully!');
    }


    public function destroy(string $id)
    {
        $questions = Question::find($id);
        $questions->delete();

        return redirect()->back();
    }


    public function show(string $id)
    {
        $question = Question::with(['category', 'type', 'options'])->findOrFail($id);
        return view('admin.question.show', compact('question'));
    }





}
