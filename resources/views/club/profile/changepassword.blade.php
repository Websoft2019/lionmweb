@extends('site.template')
@section('css')
    <style>
        .profilebox{
            border: 1px solid #ccc;
            padding: 20px;
        }
        .information{
            margin-top: 30px;
        }
        ul.information-item{
            list-style: none;
        }
        .information-item b{
            margin-top: 40px;
            color: #023c8a;
        }
    </style>
@stop
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Profile</li>
            </ul>
            <h2>Change Password</h2>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
        <div class="row">
            <form method="POST" action="{{ route('club.password.update') }}">
                @csrf
                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth()->user()->email }}" required autocomplete="email" autofocus>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __(' New Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
           </div>
        </div>
    </div>
</section>
@stop