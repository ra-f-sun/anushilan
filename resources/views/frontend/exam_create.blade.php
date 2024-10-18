@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="selected-questions-area py-5">
        <div class="container">
            <div class="selected-questions-main-bar">
                <h2 class="text-center mb-4">Selected Questions</h2>

                @if($questions->isEmpty())
                    <div class="alert alert-warning text-center">
                        No questions to display.
                    </div>
                @else
                    <div class="questions-list">
                        @foreach ($questions as $key => $question)
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Question {{ $key + 1 }}</strong>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2 fs-5">{!! $question->question !!}</p>
                                    <p class="mb-0 text-muted fs-6">Answer: {!! $question->answer !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('generate.pdf') }}" class="btn btn-primary">Download as PDF</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
