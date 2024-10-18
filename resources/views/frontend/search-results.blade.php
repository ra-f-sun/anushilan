@extends('frontend.layouts.master')
@section('frontend.content')

<section class="search-results-area py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Search Questions</h2>

        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <form action="{{ route('search.questions') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="question" class="form-control"
                                placeholder="Enter your question here" value="{{ request('question') }}">
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('all.class') }}" class="btn btn-success">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="mb-4 text-muted">Found {{ $results->count() }} result(s) for your search.</p>

        @if ($results->isNotEmpty())
            <div class="results-list">
                @foreach ($results as $question)
                    <div class="card mb-4 shadow-sm question-card">
                        <div class="card-body">
                            <!-- Question title and category -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-3">{!! $question->question !!}</h5>

                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <button class="btn btn-outline-primary btn-sm toggle-answer"
                                    data-target="answer-{{ $question->id }}">
                                    <i class="fas fa-eye me-1"></i> Show Answer
                                </button>
                                <span class="category-badge bg-light text-primary border rounded px-3 py-2">
                                    <i class="fas fa-tag me-2"></i>
                                    <i>Category Name : </i>
                                        <strong>{!! $question->category->category_name !!}</strong>

                                </span>
                            </div>
                            <div id="answer-{{ $question->id }}" class="answer mt-3" style="display: none;">
                                <hr>
                                <p class="card-text">{!! $question->answer !!}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                No results found for your search. Please try different keywords or categories.
            </div>
        @endif
    </div>
</section>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-answer');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const answerDiv = document.getElementById(targetId);

                if (answerDiv.style.display === 'none' || answerDiv.style.display === '') {
                    answerDiv.style.display = 'block';
                    this.textContent = 'Hide Answer';
                    this.classList.replace('btn-outline-primary', 'btn-primary');
                } else {
                    answerDiv.style.display = 'none';
                    this.textContent = 'Show Answer';
                    this.classList.replace('btn-primary', 'btn-outline-primary');
                }
            });
        });
    });
</script>
