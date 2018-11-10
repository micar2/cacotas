<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Glint</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- script
    ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>


    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="svg/favicon.ico" type="image/x-icon">
    <link rel="icon" href="svg/favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="{{route('welcome')}}">
            <img src="images/logo.png" alt="Homepage">
        </a>
    </div>

    @include('layouts.main')

</header> <!-- end s-header -->


<!-- home
================================================== -->
{{--<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>--}}

    {{--<div class="overlay"></div>--}}
    {{--<div class="shadow-overlay"></div>--}}

    {{--<div class="home-content">--}}

        {{--<div class="row home-content__main">--}}

            {{--<h3>Welcome to Glint</h3>--}}

            {{--<h1>--}}
                {{--We are a creative group <br>--}}
                {{--of people who design <br>--}}
                {{--influential brands and <br>--}}
                {{--digital experiences.--}}
            {{--</h1>--}}

            {{--<div class="home-content__buttons">--}}
                {{--<a href="#contact" class="smoothscroll btn btn--stroke">--}}
                    {{--Start a Project--}}
                {{--</a>--}}
                {{--<a href="#about" class="smoothscroll btn btn--stroke">--}}
                    {{--More About Us--}}
                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}

        {{--<div class="home-content__scroll">--}}
            {{--<a href="#about" class="scroll-link smoothscroll">--}}
                {{--<span>Scroll Down</span>--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="home-content__line"></div>--}}

    {{--</div> <!-- end home-content -->--}}


    {{--<ul class="home-social">--}}
        {{--<li>--}}
            {{--<a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#0"><i class="fa fa-behance" aria-hidden="true"></i><span>Behance</span></a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#0"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>--}}
        {{--</li>--}}
    {{--</ul>--}}
    {{--<!-- end home-social -->--}}

{{--</section> <!-- end s-home -->--}}


<!-- about
================================================== -->
<section id='about' class="s-about">


@yield('content')


</section> <!-- end s-about -->





<!-- footer
================================================== -->
<footer>

    <div class="row footer-main">

        <div class="col-six tab-full left footer-desc">

            <div class="footer-logo"></div>
            Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Nulla porttitor accumsan tincidunt. Quaerat voluptas autem necessitatibus vitae aut.

        </div>

        <div class="col-six tab-full right footer-subscribe">

            <h4>Get Notified</h4>
            <p>Quia quo qui sed odit. Quaerat voluptas autem necessitatibus vitae aut non alias sed quia. Ut itaque enim optio ut excepturi deserunt iusto porro.</p>

            <div class="subscribe-form">
                <form id="mc-form" class="group" novalidate="true">
                    <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                    <input type="submit" name="subscribe" value="Subscribe">
                    <label for="mc-email" class="subscribe-message"></label>
                </form>
            </div>

        </div>

    </div> <!-- end footer-main -->

    <div class="row footer-bottom">

        <div class="col-twelve">
            <div class="copyright">
                <span>© Copyright Glint 2017</span>
                <span>Site Template by <a href="https://www.colorlib.com/">Colorlib</a></span>
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
            </div>
        </div>

    </div> <!-- end footer-bottom -->

</footer> <!-- end footer -->


<!-- photoswipe background
================================================== -->
<div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                "Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
            "Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>

    </div>

</div> <!-- end photoSwipe background -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale-pulse-out">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<!-- Java Script
================================================== -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
