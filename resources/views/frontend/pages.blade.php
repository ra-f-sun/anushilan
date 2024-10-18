@extends('frontend.layouts.master')
@section('frontend.content')

<section class="hero-area pattern-bg-2 bg-white shadow-sm overflow-hidden pt-60px pb-60px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        {{-- <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="section-title fs-40 pb-3 lh-55">{!! $allPages->title !!}</h1>
                    {{--  <p class="section-desc pb-40px">{!! $allPages->second_title !!}</p>  --}}
                    <p class="section-desc">{!! $allPages->description !!}</p>
                </div>
            </div>
            <div class="col-lg-6 ms-auto">
                <div class="img-box text-center">
                    <img class="img-fluid rounded-3 lazy js-tilt" src="{{ $allPages->getFirstMediaUrl() }}" alt="image">
                </div>
            </div>
        </div> --}}
    </div>
</section>


@endsection

<style>
    .hero-area {
    position: relative;
    background: #f9f9f9;
    padding-top: 60px;
    padding-bottom: 60px;
}

.hero-area .stroke-shape {
    position: absolute;
    z-index: 1;
}

.stroke-shape-1 { top: 0; left: 0; width: 100px; height: 100px; background: rgba(0, 0, 0, 0.1); }
.stroke-shape-2 { top: 50%; left: 10%; width: 200px; height: 200px; background: rgba(0, 0, 0, 0.05); }
.stroke-shape-3 { bottom: 0; right: 0; width: 150px; height: 150px; background: rgba(0, 0, 0, 0.1); }
.stroke-shape-4 { top: 20%; right: 20%; width: 100px; height: 100px; background: rgba(0, 0, 0, 0.1); }
.stroke-shape-5 { bottom: 30%; left: 20%; width: 80px; height: 80px; background: rgba(0, 0, 0, 0.1); }
.stroke-shape-6 { top: 70%; right: 10%; width: 120px; height: 120px; background: rgba(0, 0, 0, 0.05); }

.hero-content {
    position: relative;
    z-index: 2;
}

.section-title {
    font-size: 40px;
    line-height: 55px;
    color: #333;
    margin-bottom: 15px;
}

.section-desc {
    font-size: 18px;
    color: #555;
    margin-bottom: 40px;
}

.img-box {
    position: relative;
    z-index: 2;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.rounded-3 {
    border-radius: 15px;
}

.text-center {
    text-align: center;
}

</style>
