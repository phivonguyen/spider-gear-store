@extends('layout')
<!-- Begin Page Title -->
@section('title', "Change password")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container w-25 mt-5 bg-light pt-4 pb-4">
    <h2 class="mb-4 text-center">Change Password</h2>
    <hr class="my-4" />
    <form action="{{ route('user/change-password/post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="old_pw" class="form-label">Old password:</label>
            <input
                type="password"
                class="form-control"
                id="old_pw"
                name="old_pw"
            />
        </div>

        @if ($errors->has('old_pw'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('old_pw') }}</span>
        </div>
        @endif

        <div class="mb-3">
            <label for="new_pw" class="form-label">New password:</label>
            <input
                type="password"
                class="form-control"
                id="new_pw"
                name="new_pw"
            />
        </div>

        @if ($errors->has('new_pw'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('new_pw') }}</span>
        </div>
        @endif

        <div class="mb-3">
            <label for="new_pw_confirmation" class="form-label"
                >New password confirmation:</label
            >
            <input
                type="password"
                class="form-control"
                id="new_pw_confirmation"
                name="new_pw_confirmation"
            />
        </div>

        @if ($errors->has('new_pw_confirmation'))
        <div class="mb-3">
            <span
                class="text-danger"
                >{{ $errors->first('new_pw_confirmation') }}</span
            >
        </div>
        @endif

        <!--  -->
        @if ($errors->has('success'))
        <div class="mb-3 text-center">
            <span class="text-success">{{ $errors->first('success') }}</span>
        </div>
        @endif

        <!--  -->
        @if ($errors->has('fail'))
        <div class="mb-3 text-center">
            <span class="text-danger">{{ $errors->first('fail') }}</span>
        </div>
        @endif

        <div class="text-center">
            <button type="submit" class="btn btn-danger">Change</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin End Script -->
@section('end-script') @endsection
<!-- End End Script -->
