@extends('site.template')
@section('css')
<style>
    .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: #fccb06;

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: #fccb06;
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>
@stop
@section('content')
<section class="h-100 gradient-form" style="background-color: #1c4f9c;">
    <div class="container py-5 h-50">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                    
                  <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Admin LOGIN</h4>
                    @if(session('message'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('message') }}
                      </div>
                    @else
                    <small>Please login to your account</small>
                    @endif
                  </div>
                  <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">Username</label>
                      <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email Address" required autofocus/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example22">Password</label>
                      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                      <a class="text-muted" href="" style="float:right;">Forgot password?</a>
                      
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                        <button type="submit" class="thm-btn about-one__btn">Login</button>
                    </div>  
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 col-lg-12" style="text-align:center;">
                    <img src="{{ asset('site/assets/images/logo2.png') }}" alt="" width="200">
                  <h4 class="mb-4">Notics</h4>
                  <p class="small mb-0" style="color:#333;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
