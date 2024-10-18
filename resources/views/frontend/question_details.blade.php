@extends('frontend.layouts.master')
@section('frontend.content')
    <section class="hero-area pattern-bg-2 bg-white shadow-sm overflow-hidden pt-30px pb-30px">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="row align-items-center">
                <!-- Image on the left -->
                <div class="col-lg-5 ms-auto">
                    <div class="image-box">
                        <img class="w-100 rounded lazy" src="{{ $category->getFirstMediaUrl() }}" alt="Category Image">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-content py-5">
                        <h3 class="fs-19 fw-medium pb-3">{!! $category->category_name !!}</h3>
                        <p class="section-desc pb-4">{!! $category->description !!}</p>

                        <div class="price-box mb-4 mt-3 p-3"
                            style="border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
                            <span class="fw-bold" style="color: #333; font-size: 16px;">Price:</span>
                            <span class="price fw-bold"
                                style="color: #e74c3c; font-size: 24px;">৳{{ number_format($category->price) }}</span>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <button type="submit" class="btn btn-primary">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Custom CSS for styling -->
<style>
    /* Reset padding and margin for body */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
    }

    /* General container styling */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0px;
    }

    /* Style for the price box */
    .price-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 160px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Style for the image */
    .image-box img {
        border-radius: 10px;
        object-fit: cover;
        max-height: 350px;
    }

    /* Button styles */
    .btn.theme-btn {
        padding: 10px 20px;
        background-color: #2980b9;
        color: white;
        border-radius: 30px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn.theme-btn:hover {
        background-color: #1f639a;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        .price-box {
            max-width: 100%;
        }

        .image-box img {
            max-height: 250px;
        }
    }
</style>
