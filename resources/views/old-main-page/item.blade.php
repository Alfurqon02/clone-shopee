@extends('layouts.main')
@section('container')

<div id="modalBuy" class="popupContainer" style="display:none;">
    <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>
            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label>Username</label>
                <input type="text" name="username" id="username" required />
                <br />

                <label>Password</label>
                <input type="password" name="password" id="password" required />
                <br />

                <div class="checkbox">
                    <input id="remember" type="checkbox" />
                    <label for="remember">Remember me on this computer</label>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i>
                            Back</a></div>
                    <div class="one_half last"><button type="submit" class="btn btn_red">Login</button></div>
                </div>
            </form>

            <a href="#" class="forgot_password">Forgot password?</a>
        </div>

        <!-- Register Form -->
        <div class="user_register">
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <label>Full Name</label>
                <input name="name" id="name" type="text" required />
                <br />
                <label>Username</label>
                <input name="username" id="username" type="text" required />
                <br />
                <label>Email Address</label>
                <input name="email" id="email" type="email" required />
                <br />
                <label>Password</label>
                <input name="password" id="password" type="password" required />
                <br />
                <div class="action_btns">
                    <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i>
                            Back</a></div>
                    <div class="one_half last"><button type="submit" class="btn btn_red">Register</button></div>
                </div>
            </form>
        </div>
    </section>
</div>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight me-5" data-wow-duration="1s" data-wow-delay="0.5s"
                                style="width: 200px; height: 200px; max-width:100%; max-height:100%;">
                                <img src="{{ asset($image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="ms-5 left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>{{ $name }}</h3>
                                        <h3 style="-webkit-text-stroke:1px rgb(0, 0, 0); color:white; margin-bottom:3%;">Rp.
                                            {{ $price }}</h3>
                                        <h6>Stock: {{ $stock }}</h6>
                                        <textarea rows="12" cols="75"
                                            style="resize: none;
                                     white-space: pre-wrap; word-wrap: break-word" disabled>{{ $description }}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button style="background-color: rgb(122, 120, 120)" class="btn mt-3 me-5"
                                            onclick="history.back();">Go Back</i></button>
                                        <button disabled style="background-color: rgb(220, 220, 22)"
                                            class="btn mt-3 me-5">Add to Cart</i></button>
                                        <a id="modal_trigger" href="#modalBuy" class="btn btn-primary mt-3 me-5">Buy Now</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
