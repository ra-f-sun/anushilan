@extends('frontend.layouts.master')
@section('frontend.content')

    <section class="question-area pt-20px pb-40px">
        <div class="container">
            <!-- Question Search Box (Top) -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="question-search">
                        <section class="image-upload-area pt-80px pb-40px">
                            <div class="container">
                                <h5 class="pb-20px">ছবি থেকে প্রশ্ন নিতে চাইলে এখানে ছবি আপলোড করুন</h5>
                                <div class="border p-4 rounded"> <!-- Add border here -->
                                    <form method="POST" action="{{ route('ocr') }}" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-4 col-form-label text-md-right">{{ __('') }}</label>
                    
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>
                    
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </section>
                        <h5>প্রশ্ন সার্চ</h5>
                        <form action="{{ route('search.questions') }}" method="GET">
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <label for="questionSearch" class="form-label"> </label>
                                    <div class="input-group">
                                        {{-- <select name="category" class="form-select" style="max-width: 200px;">
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{!! $cat->category_name !!}</option>
                                        @endforeach
                                    </select> --}}
                                        <input type="text" name="question" id="questionSearch" class="form-control"
                                            placeholder="Enter your question here">
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label class="form-label"> </label>
                                    <button type="submit" class="btn btn-primary w-100">Search</button>
                                </div>
                            </div>
                        </form>
                        
            
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar with categories -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header submit-btn text-white">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-graduation-cap me-2"></i>ক্লাস
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    @foreach ($categories as $cat)
                                        <li class="list-group-item {{ $category_id == $cat->id ? 'active' : '' }}">
                                            <a href="{{ route('all.class', ['category_id' => $cat->id]) }}"
                                                class="d-flex align-items-center text-decoration-none {{ $category_id == $cat->id ? 'text-white' : 'text-dark' }}">
                                                <i class="fas fa-book-open me-3"></i>
                                                <span>{!! $cat->category_name !!}</span>
                                                @if ($category_id == $cat->id)
                                                    <i class="fas fa-check-circle ms-auto"></i>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content area -->
                <div class="col-lg-9">
                    <!-- Subcategories -->
                    @if ($subcategories->isNotEmpty())
                        <div class="subcategories mb-4">
                            <h4 class="pb-4">বিষয়
                                </h4>
                            <div class="row">
                                @foreach ($subcategories as $subcat)
                                    <div class="col-md-4 mb-3">
                                        <a href="{{ route('all.class', ['category_id' => $category_id, 'subcategory_id' => $subcat->id]) }}"
                                            class="btn btn-outline-secondary w-100 {{ $subcategory_id == $subcat->id ? 'active' : '' }}">
                                            {!! $subcat->category_name !!}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Sub-subcategories -->
                    @if ($subsubcategories->isNotEmpty())
                        <div class="subsubcategories mb-4">
                            <h5>
                                অধ্যায়</h5>
                            <div class="row">
                                @foreach ($subsubcategories as $subsubcat)
                                    <div class="col-md-4 mb-3">
                                        <a href="{{ route('all.class', ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'subsubcategory_id' => $subsubcat->id]) }}"
                                            class="btn btn-outline-info w-100 {{ $subsubcategory_id == $subsubcat->id ? 'active' : '' }}">
                                            {!! $subsubcat->category_name !!}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Question Types -->
                    <div class="question-types mb-4">
                        <h4 class="pb-4"> প্রশ্নের ধরন
                            </h4>
                        <select id="questionTypeFilter" class="form-select">
                            <option value="">Select a question type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Questions -->
                    <div class="questions-section">
                        <h4 class="pb-4">প্রশ্নসমূহ</h4>
                        <div id="selectTypeMessage" class="alert alert-info">
                            Please select a question type to view questions.
                        </div>
                        @if ($questions->isNotEmpty())
                            @foreach ($questions as $type_id => $type_questions)
                                <div class="question-type mb-4" data-type-id="{{ $type_id }}" style="display: none;">
                                    <h5>{{ $types->find($type_id)->type }}</h5>
                                    @foreach ($type_questions as $index => $question)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title">{!! $question->question !!}</h6>
                                                <button class="btn btn-sm btn-primary mt-2 toggle-answer"
                                                    data-index="{{ $type_id }}-{{ $index }}">
                                                    Show Answer
                                                </button>
                                                <div id="answer-{{ $type_id }}-{{ $index }}"
                                                    class="answer mt-3" style="display: none;">
                                                    <p>{!! $question->answer !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <p id="noQuestionsMessage" style="display: none;">No questions available for this category.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-answer');
        const questionTypeFilter = document.getElementById('questionTypeFilter');
        const questionTypes = document.querySelectorAll('.question-type');
        const selectTypeMessage = document.getElementById('selectTypeMessage');
        const noQuestionsMessage = document.getElementById('noQuestionsMessage');

        // Toggle answer functionality
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const answerDiv = document.getElementById('answer-' + index);

                if (answerDiv.style.display === 'none' || answerDiv.style.display === '') {
                    answerDiv.style.display = 'block';
                    this.textContent = 'Hide Answer';
                } else {
                    answerDiv.style.display = 'none';
                    this.textContent = 'Show Answer';
                }
            });
        });

        // Filter questions by type
        questionTypeFilter.addEventListener('change', function() {
            const selectedTypeId = this.value;

            if (selectedTypeId === '') {
                // No type selected, show the message
                selectTypeMessage.style.display = 'block';
                noQuestionsMessage.style.display = 'none';
                questionTypes.forEach(type => type.style.display = 'none');
            } else {
                // Type selected, hide the message and show relevant questions
                selectTypeMessage.style.display = 'none';
                let questionsFound = false;

                questionTypes.forEach(type => {
                    if (type.getAttribute('data-type-id') === selectedTypeId) {
                        type.style.display = 'block';
                        questionsFound = true;
                    } else {
                        type.style.display = 'none';
                    }
                });

                // Show "No questions" message if no questions found for the selected type
                noQuestionsMessage.style.display = questionsFound ? 'none' : 'block';
            }
        });
    });
</script>
