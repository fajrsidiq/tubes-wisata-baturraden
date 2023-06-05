@extends('layouts.app')

@section('title')
    Register Account
@endsection

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-4 col-11">
        <div class="card p-3 rounded shadow-sm">
            <img src="{{ asset('assets/logo.png') }}" width="200" class="mx-auto mt-4" alt="">
            <h3 class="text-center mt-4">Registrasi</h3>
            <p class="fw-bold text-center">Membuat Akun Baru</p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Nomor Telepon">
                    <div class="form-control-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Ulangi Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-sm mt-3">
                    Register
                </button>
            </form>
            <div class="d-flex justify-content-between mt-3">
                <p class="fw-bold mb-0">Sudah Punya Akun ?</p>
                <a href="{{ route('login') }}">Login Sekarang!</a>
            </div>
        </div>
    </div>
</div>
@endsection