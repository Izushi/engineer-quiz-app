<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Quiz;
use App\Models\Option;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, int $categoryId)
    {
        return view('admin.quizzes.create', compact('categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request, int $categoryId)
    {
        $quiz = new Quiz();
        $quiz->category_id = $categoryId;
        $quiz->question = $request->question;
        $quiz->explanation = $request->explanation;
        $quiz->save();
        $quizId = $quiz->id;

        $options = [
            ['quiz_id' => $quizId, 'content' => $request->content1, 'is_correct' => $request->isCorrect1],
            ['quiz_id' => $quizId, 'content' => $request->content2, 'is_correct' => $request->isCorrect2],
            ['quiz_id' => $quizId, 'content' => $request->content3, 'is_correct' => $request->isCorrect3],
            ['quiz_id' => $quizId, 'content' => $request->content4, 'is_correct' => $request->isCorrect4],
        ];

        foreach ($options as $option) {
            $newOption = new Option();
            $newOption->quiz_id = $option['quiz_id'];
            $newOption->content = $option['content'];
            $newOption->is_correct = $option['is_correct'];
            $newOption->save();
        }

        return redirect()->route('admin.categories.show', compact('categoryId'))->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $categoryId, int $quizId)
    {
        $quiz = Quiz::with('options', 'category')->findOrFail($quizId);
        $category = $quiz->category;
        $options = $quiz->options;
        return view('admin.quizzes.edit', compact('quiz', 'category', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, int $categoryId, int $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $quiz->question = $request->question;
        $quiz->explanation = $request->explanation;
        $quiz->save();

        $options = [
            ['optionId' => (int)$request->optionId1, 'content' => $request->content1, 'is_correct' => $request->isCorrect1],
            ['optionId' => (int)$request->optionId2, 'content' => $request->content2, 'is_correct' => $request->isCorrect2],
            ['optionId' => (int)$request->optionId3, 'content' => $request->content3, 'is_correct' => $request->isCorrect3],
            ['optionId' => (int)$request->optionId4, 'content' => $request->content4, 'is_correct' => $request->isCorrect4],
        ];

        foreach ($options as $option) {
            $updateOption = Option::findOrFail($option['optionId']);
            $updateOption->content = $option['content'];
            $updateOption->is_correct = $option['is_correct'];
            $updateOption->save();
        }

        return redirect()->route('admin.categories.show', compact('categoryId'))->with('success', 'Category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $categoryId, int $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $quiz->delete();
        return redirect()->route('admin.categories.show', compact('categoryId'));
    }
}
