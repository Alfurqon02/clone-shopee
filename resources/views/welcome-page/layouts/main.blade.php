<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>myShoppu</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    {!! htmlScriptTagJsApi() !!}
</head>
@include('welcome-page.layouts.header')

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div id="modal" class="popupContainer" style="display:none;">
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
                    @if (session()->has('error'))
                    <div>
                        <small class="text-danger">{{ session('error') }}</small>
                    </div>
                    @endif
                    @if (session('login_attempts', 0) >= 3)
                        {!! htmlFormSnippet() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <div>
                                <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                            </div>
                        @endif
                    @endif


                    <div class="checkbox mt-4">
                        <input id="remember" type="checkbox" />
                        <label for="remember">Remember me on this computer</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i>
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
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i>
                                Back</a></div>
                        <div class="one_half last"><button type="submit" class="btn btn_red">Register</button></div>
                    </div>
                </form>
            </div>
        </section>
    </div>



    @yield('container')


</body>
<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/popup.js"></script>
<script src="assets/js/custom.js"></script>

</html>
