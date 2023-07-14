@extends('layouts.master-page-fluid')

@section('content')
    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">
        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Our Website</h2>
                    <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites
                        with Bootstrap</p>
                </div>
                <div class="col-lg-8">
                    <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                        @if (auth()->check())
                            <input type="url" class="form-control"
                                placeholder="Example: http://super-long-link.com/shorten-it" name="original_url">
                            <input type="button" class="btn btn-primary create-short-url" value="Create your page">
                        @else
                            <input type="url" class="form-control"
                                placeholder="Example: http://super-long-link.com/shorten-it">
                            <input type="button" class="btn btn-primary" value="Sign up and get your link"
                                data-toggle="modal" data-target="#modal-regis">
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero Section -->

    <!-- Modal Register Section -->
    <div class="modal fade" id="modal-regis">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create an Account
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="pt-1">
                            <form class="user" id="new-user">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName"
                                        aria-describedby="emailHelp" name="name" placeholder="Enter Name..." required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="email" placeholder="Enter Email Address..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUserName"
                                        aria-describedby="emailHelp" name="username" placeholder="Enter User Name..."
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                <a href="#" class="btn btn-primary btn-user btn-block regist-submit">
                                    Submit
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small already-acc" href="#" data-toggle="modal"
                                    data-target="#modal-sing-in">Already have an
                                    account?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Register Section -->

    <!-- Modal Register Section -->
    <div class="modal fade" id="modal-sing-in">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Sign In
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="pt-1">
                            <form class="user" id="sing-in">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="email"
                                        placeholder="Enter Email Address Or Username..." required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" name="password" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-user btn-block login-submit">
                                    Login
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#" data-dismiss="modal">Need an account? Sign up!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="#" data-dismiss="modal">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Register Section -->
@endsection
