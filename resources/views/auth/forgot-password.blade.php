
@extends('auth.layout')

@section('title')
Forgot Password
@endsection

@section('content')

<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                <div class="login_wrap widget-taber-content background-white">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <img class="border-radius-15" src="assets/imgs/page/forgot_password.svg" alt="" />
                            <h2 class="mb-15 mt-15">Forgot your password?</h2>
                            <p class="mb-30">Not to worry, we got you! Let’s get you a new password. Please enter your email address or your Username.</p>
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Reset password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



