@extends('layout')
<!-- Begin Page Title -->
@section('title', "Reset Password")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container-sm w-25 mt-5 bg-light pt-3 pb-3">
    <h3 class="text-center">Reset Password</h3>
    <hr class="my-4" />
    <form
        action="{{ route('user/reset-password/post', ['token' => $token]) }}"
        method="POST"
    >
        @csrf
        <input type="text" hidden value="{{ $token }}" />
        <div class="mt-3">
            <label for="password" class="form-label">New password:</label>
            <div class="input-group">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter password"
                    name="new_pw"
                    value="{{ old('new_pw') }}"
                />
            </div>
        </div>

        @if ($errors) @foreach ($errors as $error)
        <span class="text-danger mb-3">{{ $error }}</span>
        @endforeach @endif
        <!--  -->
        @if ($errors->has('new_pw'))
        <span class="text-danger mb-3">{{ $errors->first('new_pw') }}</span>
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
                    name="new_pw_confirmation"
                    value="{{ old('new_pw_confirmation') }}"
                />
            </div>
        </div>

        @if ($errors->has('new_pw_confirmation'))
        <span
            class="text-danger mb-3"
            >{{ $errors->first('new_pw_confirmation') }}</span
        >
        @endif

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-danger">Reset</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script') @endsection
<!-- End Footer Script -->
