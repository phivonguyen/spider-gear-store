@extends('layout')
<!-- Begin Page Title -->
@section('title', "Profile")
<!-- End Page Title -->

<!-- Begin Header Script -->
@section('header-script') @endsection
<!-- End Header Script -->

<!-- Begin Body -->
@section('body')
<div class="container w-25 mt-5 bg-light pt-4 pb-4">
    <h2 class="mb-4 text-center">Your Profile</h2>
    <hr class="my-4" />
    <form action="{{ route('user/profile/post') }}" method="POST">
        @csrf

        <div class="mb-3 row">
            <div class="col">
                <label for="first_name" class="form-label">First name:</label>
                <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="first_name"
                    value="{{ $user->first_name }}"
                />
            </div>
            <div class="col">
                <label for="middle_name" class="form-label">Middle name:</label>
                <input
                    type="text"
                    class="form-control"
                    id="middle_name"
                    name="middle_name"
                    value="{{ $user->middle_name }}"
                />
            </div>
            <div class="col">
                <label for="last_name" class="form-label">Last name:</label>
                <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="last_name"
                    value="{{ $user->last_name }}"
                />
            </div>
        </div>

        @if ($errors->has('first_name'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        </div>
        @elseif ($errors->has('middle_name'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('middle_name') }}</span>
        </div>
        @elseif ($errors->has('last_name'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                value="{{ $user->email }}"
            />
        </div>

        @if ($errors->has('email'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        @endif

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input
                type="text"
                class="form-control"
                id="phone"
                name="phone"
                value="{{ $user->phone }}"
            />
        </div>

        @if ($errors->has('phone'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('phone') }}</span>
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
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script') @endsection
<!-- End Footer Script -->
