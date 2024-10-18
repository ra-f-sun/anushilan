@extends('frontend.layouts.master')
@section('frontend.content')

<div class="container">
    <h1 class="text-center mb-5 text-primary">Contact Us</h1>
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="form-label required">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
                    </div>
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="form-label required">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Phone Field -->
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    @error('phone')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Message Field -->
                <div class="mb-4">
                    <label for="message" class="form-label required">Message</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-comment-dots"></i></span>
                        <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Your message..."></textarea>
                    </div>
                    @error('message')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Submit <i class="fa fa-paper-plane ms-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

<style>
    body {
        background: linear-gradient(to right, #ece9e6, #ffffff);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
    }
    .btn-primary {
        background-color: #6c63ff;
        border-color: #6c63ff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #5751d1;
        border-color: #5751d1;
    }
    .form-group label {
        font-weight: 600;
    }
    .required:after {
        content:" *";
        color: red;
    }
    .container {
        padding-top: 50px;
        padding-bottom: 50px;
    }
    @media (max-width: 576px) {
        .card {
            margin: 20px;
        }
    }
</style>
<script>
    // Example: Fade in the form on load
    document.addEventListener('DOMContentLoaded', function () {
        const card = document.querySelector('.card');
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        setTimeout(() => {
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, 100);
    });
</script>