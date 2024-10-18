@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="page-title pb-3">
                <h2 class="text-center">- আমার প্যাকেজ তালিকা -</h2>
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
                @foreach ($packages as $package)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="media media-card align-items-center hover-y">
                            <div class="shadow-sm flex-shrink-0 me-3 border border-gray text-center">
                                <!-- Display image for each category -->
                                <img src="{{ $package->getFirstMediaUrl() }}" alt="{{ $package->name }}" height="70"
                                    width="70" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-title text-truncate">
                                    <!-- Category name, clickable to go to another page -->
                                    <a href="{{ route('show.package.category',$package->id) }}"
                                        class="text-decoration-none">
                                        {!! $package->title !!}
                                    </a>
                                </h5>
                                

                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            
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
