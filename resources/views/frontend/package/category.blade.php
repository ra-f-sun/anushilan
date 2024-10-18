@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="page-title pb-3">
                <h2 class="text-center">- List -</h2>
            </div>
            <div class="filters pb-3">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <form action="{{ route('allCategory') }}" method="GET">
                        <div class="form-group d-flex">
                            <input class="form-control form--control form-control-sm h-auto lh-34" type="text"
                                name="search" placeholder="Search by category" @isset($searchCategory) value="{{ $searchCategory }}"@endisset>
                            <button class="form-btn" type="submit">
                                <i class="la la-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="btn-group btn--group mb-3">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">All</label>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packages->categories as $category)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="media media-card align-items-center hover-y">
                            <div class="shadow-sm flex-shrink-0 me-3 border border-gray text-center">
                                <!-- Display image for each category -->
                                <img src="{{ $category->getFirstMediaUrl() }}" alt="{{ $category->name }}" height="70"
                                    width="70" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-title text-truncate">
                                    <!-- Category name, clickable to go to another page -->
                                    <a href="{{ route('show.package.category.question', ['id' => $category->id]) }}"
                                        class="text-decoration-none">
                                        {!! $category->category_name !!}
                                    </a>
                                </h5>
                                @if ($category->children->count() > 0)
                                    <button class="btn btn-sm btn-light mt-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#subcategory-{{ $category->id }}" aria-expanded="false"
                                        aria-controls="subcategory-{{ $category->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 1024 1024">
                                            <path d="M8.2 275.4c0-8.6 3.4-17.401 10-24.001 13.2-13.2 34.8-13.2 48 0l451.8 451.8
                                                     445.2-445.2c13.2-13.2 34.8-13.2 48 0s13.2 34.8 0 48L542 775.399c-13.2
                                                     13.2-34.8 13.2-48 0l-475.8-475.8c-6.8-6.8-10-15.4-10-24.199z" />
                                        </svg>
                                    </button>
                                @endif

                                <!-- Subcategories collapse -->
                                <div class="collapse mt-2 subcategory-collapse" id="subcategory-{{ $category->id }}">
                                    <ul class="list-unstyled">
                                        @foreach ($category->children as $subcategory)
                                            <li class="subcategory-item">
                                                <!-- Subcategory links with custom styles -->
                                                <a href="{{ route('questionCreate', ['id' => $subcategory->id]) }}"
                                                    class="subcategory-link">
                                                    {!! $subcategory->category_name !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{--  <div class="pager pt-20px">
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
            <p class="fs-13 pt-2">Showing 1-20 of 50,577 results</p>
        </div>  --}}
        </div>
    </section>
@endsection

<style>
    .media-card {
        transition: all 0.3s ease;
    }

    .media-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-light {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
    }

    .subcategory-collapse {
        background-color: #f8f9fa;
        /* Light background for contrast */
        border: 1px solid #dee2e6;
        /* Light border for definition */
        border-radius: 0.25rem;
        /* Rounded corners */
        padding: 10px;
    }

    .subcategory-item {
        padding: 8px 12px;
        /* Spacing for items */
        border-bottom: 1px solid #e9ecef;
        /* Divider between items */
        transition: background-color 0.3s;
        /* Smooth transition for hover effect */
    }

    .subcategory-item:last-child {
        border-bottom: none;
        /* Remove border from the last item */
    }

    .subcategory-item:hover {
        background-color: #e9ecef;
        /* Background color on hover */
    }

    .subcategory-link {
        text-decoration: none;
        /* Remove underline from links */
        color: #007bff;
        /* Color for links */
        font-weight: 500;
        /* Slightly bolder text */
    }

    .subcategory-link:hover {
        text-decoration: underline;
        /* Underline on hover */
    }
</style>
