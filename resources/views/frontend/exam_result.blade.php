@extends('frontend.layouts.master')
@section('frontend.content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="text-center mb-4">Hello, <span class="text-primary">{{ Auth::user()->name }}</span>!</h2>
            <h3 class="text-center mb-4">Your Exam Results</h3>
            <div class="result-summary text-center">
                <h3 class="mb-3">Score: <span class="text-primary">{{ $score }}</span> out of <span class="text-primary">{{ $totalQuestions }}</span></h3>
                <h4 class="mb-4">Percentage: <span class="text-primary">{{ number_format($percentage) }}%</span></h4>
            </div>

            <div class="feedback-message mt-4">
                @if ($score == $totalQuestions)
                    <p class="text-center text-success"><i class="fas fa-trophy mr-2"></i>Excellent! You answered all questions correctly!</p>
                @elseif($score >= ($totalQuestions / 2))
                    <p class="text-center text-info"><i class="fas fa-thumbs-up mr-2"></i>Good Job! You answered more than half of the questions correctly!</p>
                @else
                    <p class="text-center text-danger"><i class="fas fa-book-reader mr-2"></i>You need more practice! Keep trying!</p>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('bookshelf.question', ['id' => $category_id]) }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-eye mr-2"></i>Show all answers
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
