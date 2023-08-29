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
    <h3 class="text-center">Login</h3>
    <hr class="my-4" />
    <form action="{{ route('user/login/post') }}" method="POST">
        @csrf

        <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username:</label>
            <input
                type="text"
                class="form-control"
                id="username"
                placeholder="Enter username"
                name="username"
            />
        </div>

        @if ($errors->has('username'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('username') }}</span>
        </div>
        @endif

        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label for="password" class="form-label">Password:</label>
                <a
                    href="{{ route('user/forgot-password/get') }}"
                    class="float-right"
                    >Forgot password</a
                >
            </div>

            <div class="input-group">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter password"
                    name="password"
                />
                <a
                    class="btn btn-outline-dark"
                    type="button"
                    id="togglePassword"
                    href="#"
                >
                    <i class="fa-regular fa-eye"></i>
                </a>
            </div>
        </div>

        @if ($errors->has('password'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        @endif
        <!--  -->
        @if ($errors->has('login'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('login') }}</span>
        </div>
        @endif
        <!--  -->
        @if ($errors->has('status'))
        <div class="mb-3">
            <span class="text-danger">{{ $errors->first('status') }}</span>
        </div>
        @endif

        <div class="form-check mb-3">
            <label class="form-check-label">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                />
                Remember me
            </label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger w-100">Login</button>
        </div>
        <div class="text-center mt-2">
            <a href="{{ route('user/register/get') }}">Create new account</a>
        </div>
    </form>
</div>
@endsection
<!-- End Body -->

<!-- Begin Footer Script -->
@section('footer-script')
<script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", function () {
        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordInput.setAttribute("type", type);

        if (type === "text") {
            togglePassword.className = `btn btn-outline-danger`;
            return (togglePassword.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`);
        }

        togglePassword.className = `btn btn-outline-dark`;
        return (togglePassword.innerHTML = `<i class="fa-regular fa-eye"></i>`);
    });
</script>
@endsection
<!-- End Footer Script -->
