@extends('layouts.app')

@section('title')
    Selamat Datang ! ! !
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4 col-11">
            <div class="card p-3 rounded shadow-sm">
                <img src="{{ asset('assets/logo.png') }}" width="200" class="mx-auto mt-4" alt="">
                <h3 class="text-center mt-4">LOGIN</h3>
                <p class="fw-bold text-center">Masukkan Akun Anda</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl  @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl  @error('password') is-invalid @enderror"
                            name="password" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Ingat Saya
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-sm mt-3">
                        Log in
                    </button>
                </form>
                <div class="d-flex justify-content-between mt-3">
                    <p class="fw-bold mb-0">Belum Punya Akun ?</p>
                    <a href="{{ route('register') }}">Registrasi Sekarang !</a>
                </div>
            </div>
        </div>
    </div>
@endsection