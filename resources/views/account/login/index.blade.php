@extends('layout') @section('title', 'Forgot password') @section('body')

<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>login</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div
                class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2"
            >
                <div class="theme-card">
                    <h3 class="text-center">Login</h3>
                    <form action="{{ url('processLogin') }}" class="theme-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                name="email"
                                type="text"
                                class="form-control"
                                placeholder="Email"
                                required=""
                            />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required=""
                            />
                        </div>
                        <input type="submit" class="btn btn-solid btn-md btn-block" value="login">

                        <a
                            class="float-end txt-default mt-2"
                            href="forget-pwd.html"
                            >Forgot your password?</a
                        >
                    </form>
                    <p class="mt-3">
                        Sign up for a free account at our store. Registration is
                        quick and easy. It allows you to be able to order from
                        our shop. To start shopping click register.
                    </p>
                    <a href="register.html" class="txt-default pt-3 d-block"
                        >Create an Account</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
