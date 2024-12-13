@extends('auth.base-auth')
@section('content')
    <main class="main-content  mt-0 animate__animated animate__fadeIn">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg "
            style="background-image: url('{{ asset('argon/assets/img/rg-bg.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container animate__animated animate__fadeInDown">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                        <p class="text-lead text-white">Di PerumKita. Portal Warga Perumahan Pintar dan Modern. Mari daftar
                            menjadi anggota perumahan untuk mendapatkan pengalaman seru bersama yang lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0 animate__animated animate__jackInTheBox">
                        <div class="card-header text-center pt-4 pb-0">
                            <h5>Register</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Name" aria-label="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                        aria-label="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-0 position-relative">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password" aria-label="Password">
                                    <span id="togglePassword" class="position-absolute top-50 end-0 translate-middle-y me-3"
                                        style="cursor: pointer; display: none;">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <p class="text-secondary ms-2" style="font-size: 12px"><i>Password Minimal 8
                                    Karakter</i></p>
                                <div class="mb-3">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password" aria-label="Confirm Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const toggleIcon = togglePassword.querySelector('i'); // Target <i> element

            // Initially show or hide the toggle icon based on input value
            passwordInput.addEventListener('input', () => {
                if (passwordInput.value.trim() === '') {
                    togglePassword.style.display = 'none'; // Hide icon when input is empty
                } else {
                    togglePassword.style.display = 'block'; // Show icon when there is input
                }
            });

            togglePassword.addEventListener('click', () => {
                // Toggle password visibility
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

                // Toggle icon class
                toggleIcon.className = isPassword ? 'fa fa-eye-slash' : 'fa fa-eye';
            });
        });
    </script>
@endsection
