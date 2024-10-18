@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="question-area">
        <div class="container">
            <div class="page-title pb-3">
                <h2 class="text-center">- প্রশ্ন তালিকা -</h2>
            </div>
            <div class="question-main-bar pt-40px pb-40px">
                <div class="filters pb-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                        <h3 class="fs-22 fw-medium">All Questions</h3>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <p class="pt-1 fs-15 fw-medium lh-20">{{ $totalQuestion }} questions</p>
                    </div>
                </div>
                <form action="{{ route('submit.exam') }}" method="POST">
                    @csrf
                    <div class="questions-snippet border-top border-top-gray p-4">
                        @foreach ($questions as $key => $ques)
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label"
                                            for="question{{ $key }}">{{ $key + 1 }}.</label>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Display the question -->
                                    <p class="mb-2 text-dark fs-5">{!! $ques->question !!}</p>

                                    <!-- Input field for user's answer -->
                                    <div class="form-group">
                                        <label for="answer{{ $ques->id }}">Answer:</label>
                                        <input type="text" class="form-control" name="answers[{{ $ques->id }}]"
                                            id="answer{{ $ques->id }}" placeholder="Type your answer here...">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Add hidden input for total questions count -->
                        <input type="hidden" name="totalQuestions" value="{{ count($questions) }}">

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Submit Exam</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
