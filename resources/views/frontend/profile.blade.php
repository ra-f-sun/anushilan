
@extends('frontend.layouts.master')
@section('frontend.content')
<section class="contact-area pt-80px pb-80px">
    <div class="container">
        <div class="page-title pb-3">
            <h2 class="text-center">Profile Information</h2>
        </div>
        <form action="{{ route('user.profile.update') }}" method="POST" class="contact-form card card-item" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="col-lg-7">
                   
                    <div class="form-group" style="display: flex; justify-content: center;">
                        <div style="display: flex; align-items: center;">
                            <img src="{{asset( Auth::user()->getFirstMediaUrl() ?: 'frontend/images/profile.jpg')}}" 
                                 alt="" 
                                 style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
                            <input type="file" id="name" name="image" class="form-control form--control fs-14 ml-3" placeholder="e.g. Alex smith" style="width: 60%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control form--control fs-14" value="{{ Auth::user()->name }}" placeholder="e.g. Alex smith">
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Your Role</label>
                        <input type="text" id="name" name="name" class="form-control form--control fs-14" value="{{ Auth::user()->user_type }}" placeholder="e.g. Alex smith">
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Email <span class="text-gray">(Address never made public)</span></label>
                        <input type="email" id="email" name="email"  value="{{ Auth::user()->email }}" class="form-control form--control fs-14" placeholder="e.g. alexsmith@gmail.com">
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Phone Number</label>
                        <input type="tel" id="phone-number" name="phone"  value="{{ Auth::user()->phone }}"  class="form-control form--control fs-14" placeholder="Your phone number">
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-20">Address</label>
                        <textarea id="message" name="address" class="form-control form--control fs-14" rows="6" placeholder="Your Address">{{ Auth::user()->address }}</textarea>
                    </div><!-- end form-group -->
                    <div class="form-group mb-0">
                        <button id="send-message-btn" class="btn btn-primary" type="submit">Submit</button>
                    </div><!-- end form-group -->
                </div><!-- end col-lg-7 -->
            </form>
                <div class="col-lg-5">
                    <div class="contact-information-wrap ps-4 border-left border-left-gray h-100">
                        <h3 class="fs-20 pb-3 fw-bold">Change Password</h3>
                        <div class="divider"><span></span></div>
                      
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                
                                <div class="mb-3">
                                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                        placeholder="Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="newPasswordInput" class="form-label">New Password</label>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Confirm New Password">
                                </div>
                
                            </div>
                
                            <div class="card-footer">
                                <button id="send-message-btn" class="btn btn-primary" type="submit">Submit</button>
                            </div>
                
                        </form>
                        <h3 style="margin-top: 20px;" class="fs-20 pb-3 fw-bold">Contact Information</h3>
                        <div class="divider"><span></span></div>
                        <p class="pt-3 pb-2">Business consulting excepteur sint occaecat cupidatat consulting non proident.</p>
                        <ul class="generic-list-item fs-15">
                            <li class="mb-3"><div class="icon-element icon-element-xs shadow-sm d-inline-block me-2"><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#3cb1c6"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.54 5c.06.89.21 1.76.45 2.59l-1.2 1.2c-.41-1.2-.67-2.47-.76-3.79h1.51m9.86 12.02c.85.24 1.72.39 2.6.45v1.49c-1.32-.09-2.59-.35-3.8-.75l1.2-1.19M7.5 3H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.49c0-.55-.45-1-1-1-1.24 0-2.45-.2-3.57-.57-.1-.04-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.45-5.15-3.76-6.59-6.59l2.2-2.2c.28-.28.36-.67.25-1.02C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1z"/></svg></div> {{ Auth::user()->phone }}</li>
                            <li class="mb-3"><div class="icon-element icon-element-xs shadow-sm d-inline-block me-2"><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#3cb1c6"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg></div><a href="mailto:example@yourwebsite.com" class="d-inline-block">{{ Auth::user()->email }}</a></li>
                            <li class="mb-3"><div class="icon-element icon-element-xs shadow-sm d-inline-block me-2"><svg xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#3cb1c6"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg></div> {{ Auth::user()->address }}</li>
                        </ul>
                        
                    </div>
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        
       
        
    </div><!-- end container -->
</section>
@endsection