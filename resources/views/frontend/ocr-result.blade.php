@extends('frontend.layouts.master')

@section('frontend.content')
    <div class="container mt-5">
        <h4>ছবির সকল তথ্য</h4>
        <div class="card ocr-card">
            <div class="card-body ">
                @if ($success)
                    <p class="card-text">{{ $text }}</p>
                @else
                    <h5 class="card-title text-danger">Error:</h5>
                    <p class="card-text">{{ $message }}</p>
                    @if (isset($error_details))
                        <pre>{{ json_encode($error_details, JSON_PRETTY_PRINT) }}</pre>
                    @endif
                @endif
            </div>
        </div>
        {{-- <a href="{{ route('your.upload.route') }}" class="btn btn-primary mt-3">Upload Another Image</a> --}}
        <div class="ocr-h5">
            <h5>প্রশ্নেটি আংশিক বা সম্পূর্ণ কপি করে প্রশ্নব্যাংকে সার্চ করুন</h5>
            <a href="{{ route('all.class') }}" class="btn btn-primary px-5 lh-24">প্রশ্নব্যাংক</a>
        </div>
    </div>
@endsection

