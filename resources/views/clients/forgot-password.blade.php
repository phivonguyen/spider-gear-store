@extends('layout')
<!-- Begin Page Title -->
@section('title', "Login")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container-sm w-25 mt-5 bg-light pt-3 pb-3">
    <h3 class="text-center">Forgot Password</h3>
    <hr class="my-4" />
    <form action="{{ route('user/forgot-password/post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" />
        </div>

        @if ($errors->has('email'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        @endif

        <!--  -->
        @if ($errors->has('status'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('status') }}</span>
        </div>
        @endif

        <div class="text-center">
            <button type="submit" class="btn btn-danger w-100">Send</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script') @endsection
<!-- End Footer Script -->
