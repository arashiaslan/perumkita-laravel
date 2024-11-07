@extends('auth.base-auth')
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto animate__animated animate__fadeInLeft">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Masukin Email dan Password anda untuk Login</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email"
                                                class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Email" aria-label="Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password" aria-label="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum punya akun?
                                        <a href="{{ route('register') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column animate__animated animate__fadeInRight">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{asset('argon/assets/img/lgn-bg.jpg')}}');
          background-size: cover;">
                                <span class="mask bg-gradient-secondary opacity-4"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">"Kerinduan akan rumah ada di dalam diri kita semua, tempat yang aman di mana kita bisa menjadi diri sendiri tanpa dipertanyakan."</h4>
                                <p class="text-white position-relative" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">-Maya Angelou.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
