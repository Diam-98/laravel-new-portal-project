<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('front/img/favicon.ico') }}" rel="icon" />

    <!-- Liens du head -->
    @include('front.partials.styles')
    <!-- Fin des lien du head -->
</head>

<body>
<!-- Debut Topbar -->
@include('front.partials.topbar')
<!-- Topbar fin -->

<!-- Navbar debut -->
@include('front.partials.header')
<!-- Navbar fin -->

<br />
<!-- Breaking News Start -->
@yield('breaking_news')
<!-- Breaking News End -->

<!-- Main News Slider Debut -->
@yield('news_slider')
<!-- News Slider fin -->

<!-- Featured News Slider debut -->
@yield('featured_news')
<!-- Featured News Slider fin -->

<!-- News With Sidebar debut -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield('main_section')
            </div>

            <!-- debut sidebar -->
            @include('front.partials.sidebar')
            <!-- fin sidebar -->

        </div>
    </div>
</div>
<!-- News With Sidebar fin -->

<!-- Footer debut -->
@include('front.partials.footer')
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-info btn-square back-to-top"
><i class="fa fa-arrow-up"></i
    ></a>

<!-- JavaScript Libraries -->
@include('front.partials.scripts')
</body>
</html>
