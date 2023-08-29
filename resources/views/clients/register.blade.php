@extends('layout')
<!-- Begin Page Title -->
@section('title', "Register")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container-sm w-25 mt-5 bg-light pt-3 pb-3">
    <h3 class="text-center">Register</h3>
    <hr class="my-4" />
    <form action="{{ route('user/register/post') }}" method="POST">
        @csrf

        <div class="mt-3">
            <label for="username" class="form-label">Username:</label>
            <input
                type="text"
                class="form-control"
                id="username"
                placeholder="Enter username"
                name="username"
                value="{{ old('username') }}"
            />
        </div>

        @if ($errors->has('username'))
        <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif

        <div class="mt-3">
            <label for="password" class="form-label">Password:</label>
            <div class="input-group">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter password"
                    name="password"
                    value="{{ old('password') }}"
                />
            </div>
        </div>

        @if ($errors->has('password'))
        <span class="text-danger mb-3">{{ $errors->first('password') }}</span>
        @endif

        <div class="mt-3">
            <label for="password_confirmation" class="form-label"
                >Password confirmation:</label
            >
            <div class="input-group">
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    placeholder="Enter password confirmation"
                    name="password_confirmation"
                    value="{{ old('password_confirmation') }}"
                />
            </div>
        </div>

        @if ($errors->has('password_confirmation'))
        <span
            class="text-danger mb-3"
            >{{ $errors->first('password_confirmation') }}</span
        >
        @endif

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger">Register</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script') @endsection
<!-- End Footer Script -->
