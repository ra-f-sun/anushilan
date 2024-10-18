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
                <form action="{{ route('generate.pdf') }}" method="POST">
                    @csrf
                    <div class="questions-snippet border-top border-top-gray p-4">
                        @foreach ($questions as $key => $ques)
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="question{{ $key }}" name="selected_questions[]" value="{{ $ques->id }}">
                                    <label class="form-check-label" for="question{{ $key }}">{{ $key + 1 }}.</label>
                                </div>
                                <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#answer{{ $key }}" aria-expanded="false" aria-controls="answer{{ $key }}">
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



                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mt-3">Generate PDF</button>
                </form>








                {{--  <div class="pager pt-30px px-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination generic-pagination pe-1">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="fs-13 pt-2">Showing 1-10 results of 50,577 questions</p>
            </div>  --}}
            </div>
        </div>
    </section>
@endsection
