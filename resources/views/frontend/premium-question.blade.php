@extends('frontend.layouts.master')
@section('frontend.content')

    <section class="get-started-area pt-80px pb-50px pattern-bg bg-gray">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">আমাদের সাথে পথচলা শুরু হোক এখনি!</h2>
                <p class="section-subtitle">Join us today and be a part of our journey!</p>
            </div>
            <div class="row pt-50px">
                @foreach ($categories as $key => $value)
                    <div class="col-lg-3 responsive-column-half">
                        <div class="card card-item hover-y text-center">
                            <div class="card-body">
                                <img src="{{ $value->getFirstMediaUrl() }}" alt="bubble">
                                <h5 class="card-title pt-4 pb-2">{!! $value->category_name !!}</h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::words(strip_tags($value->description), 20, '...') }}
                                </p>
                                <p class="card-amount">Price: ৳{{ $value->price }}</p>
                                {{-- <a href="{{ route('questionDetails', ['id' => $value->id]) }}"
                                    class="btn btn-primary more-details-btn">More Details</a> --}}
                                    @if (in_array($value->id, $userCategoryIds))
                                    <a href="{{ route('show.package.category.question', ['id' => $value->id]) }}"
                                        class="btn btn-success">View Question</a>
                                @else
                                    <a href="{{ route('questionDetails', ['id' => $value->id]) }}"
                                        class="btn btn-primary more-details-btn">More Details</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

<script>
    function toggleAnswers(button) {
        var answers = button.nextElementSibling;
        if (answers.style.maxHeight === "0px" || answers.style.maxHeight === "") {
            answers.style.maxHeight = answers.scrollHeight + "px";
            button.textContent = "Hide Answers";
        } else {
            answers.style.maxHeight = "0";
            button.textContent = "Show Answers";
        }
    }
</script>

<style>
    .get-started-area {
        background: linear-gradient(135deg, #f3f4f6, #e2e8f0);
        /* Gradient background */
        position: relative;
        overflow: hidden;
    }

    .get-started-area::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('path/to/your-pattern.png') no-repeat center center;
        background-size: cover;
        opacity: 0.1;
        z-index: 1;
    }

    .container {
        position: relative;
        z-index: 2;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
        padding: 0.5rem;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #555;
        margin-bottom: 2rem;
        font-style: italic;
    }

    .btn-primary {
        background-color: #3490dc;
        /* Primary button color */
        color: #fff;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border: none;
        border-radius: 0.5rem;
        text-transform: uppercase;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2779bd;
        /* Darker shade on hover */
        text-decoration: none;
    }

    .pt-80px {
        padding-top: 80px;
    }

    .pb-50px {
        padding-bottom: 50px;
    }

    .bg-gray {
        background-color: #f7f7f7;
    }

    .card-item {
        width: 300px;
        /* Fixed width */
        height: 400px;
        /* Fixed height */
        margin: 0 auto;
        /* Center the card */
        overflow: hidden;
        /* Hide overflow */
    }

    .card-item img {
        width: 100%;
        /* Full width of the container */
        height: 200px;
        /* Fixed height for images */
        object-fit: cover;
        /* Maintain aspect ratio, cropping if necessary */
    }

    .card-text {
        height: 60px;
        /* Fixed height for the text container */
        overflow: hidden;
        /* Hide overflow */
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Limit to 3 lines */
        -webkit-box-orient: vertical;
        margin-bottom: 10px;
    }

    .card-body {
        padding: 15px;
    }

    .more-details-btn {
        margin-top: 10px;
    }

    .card-amount {
        margin-top: 10px;
        font-weight: bold;
    }
</style>
