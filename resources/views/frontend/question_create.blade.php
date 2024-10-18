@extends('frontend.layouts.master')
@section('frontend.content')
<section class="question-area">
    <div class="container">
        <div class="question-main-bar pt-40px pb-40px">
            <div class="filters pb-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                    <h3 class="fs-22 fw-medium">All Questions</h3>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <p class="pt-1 fs-15 fw-medium lh-20">{{ $totalQuestion }} questions</p>
                    <form method="GET" action="{{ route('questionCreate', $id) }}">
                        <div class="filter-option-box w-10">
                            <select name="filter" class="form-select" onchange="this.form.submit()">
                                <option value="all" {{ request('filter') === 'all' ? 'selected' : '' }}>All</option>
                                <option value="newest" {{ request('filter') === 'newest' ? 'selected' : '' }}>Newest</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <form id="question-form" method="POST">
                @csrf
                <div class="questions-snippet border-top border-top-gray p-4">
                    @foreach ($questions as $key => $ques)
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="question{{ $key }}" name="selected_questions[]" value="{{ $ques->id }}"
                                    {{ is_array(old('selected_questions')) && in_array($ques->id, old('selected_questions')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="question{{ $key }}">{{ $key + 1 }}.</label>
                            </div>
                            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#answer{{ $key }}" aria-expanded="false" aria-controls="answer{{ $key }}">
                                <i class="fas fa-chevron-down"></i> Show Answer
                            </button>
                        </div>
                        <div class="card-body">
                            <p class="mb-2 text-dark fs-5">{!! $ques->question !!}</p>
                            <!-- Answer section -->
                            <div class="collapse" id="answer{{ $key }}">
                                <div class="card card-body">
                                    <p class="mb-0 text-muted fs-6">Answer: {!! $ques->answer !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-3" formaction="{{ route('generate.pdf') }}">Generate PDF</button>
                <button type="button" class="btn btn-success mt-3" id="make-question-btn">Make Question</button>
            </form>
        </div>
    </div>
</section>

@endsection

<!-- Include jQuery (ensure it's loaded before your script) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Ensure the DOM is fully loaded before attaching event listeners
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('make-question-btn').addEventListener('click', function() {

        var form = document.getElementById('question-form');

        form.action = "{{ route('make.question') }}";

        form.method = "GET";

        form.submit();
    });
});

</script>
