<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <div class="logo d-flex">
                        <a href="/">
                            <img width="75" height="75" src="{{ asset('assets/images/myshoppu-logo.png') }}"
                                alt="My Shoppu">
                        </a>
                    </div>

                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        @if (request()->is('shop*'))
                            @auth
                                <li>
                                    <div class="gradient-button"><a href="{{ route('my.home') }}"><i class="fa fa-align-justify"></i>
                                            Dashboard</a></div>
                                </li>
                            @endauth
                            @guest
                                <li>
                                    <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                                class="fa fa-sign-in-alt"></i> Sign In Now</a></div>
                                </li>
                            @endguest
                        @else
                            <li><a href="#top" class="active">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#category">Category</a></li>
                            <li><a href="#item">Item</a></li>
                            <li><a href="#newsletter">Newsletter</a></li>
                            @auth
                                <li>
                                    <div class="gradient-button"><a href="{{ route('my.home') }}"><i class="fa fa-align-justify"></i>
                                            Dashboard</a></div>
                                </li>
                            @endauth
                            @guest
                                <li>
                                    <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                                class="fa fa-sign-in-alt"></i> Sign In Now</a></div>
                                </li>
                            @endguest
                        @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
