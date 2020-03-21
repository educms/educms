<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="copyright" content="EDUCMS" />
    <!-- <meta name="description" content="Edu Cms is a education facilities for branding" /> -->
    <meta name="keywords" content="education,cms,content,management,system,student,teacher,university,school,study,branding,news" />
    <meta name="robots" content="index,follow" />
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ $theme_files.$config->config_favicon }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ $theme_asset }}css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ $theme_asset }}css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ $theme_asset }}fontawesome-free/css/all.min.css">
    <!-- Jquery -->
    <script src="{{ $theme_asset }}js/jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="{{ $theme_asset }}js/bootstrap.min.js"></script>
    <script src="{{ $theme_asset }}js/bootstrap.bundle.min.js"></script>
    <script src="{{ $theme_asset }}js/style.js"></script>
    <title>{{ $config->config_title_web }} | @yield('titles')</title>
  </head>
  <body>
    <!-- <div class="content">
        <div class="container">
            COBA COBA SAJA
        </div>
    </div> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ $theme_files.$config->config_logo }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            @include('theme::orapakat.partials.menu_')
            </div>
        </div>
    </nav>
    <!-- <div class="container"> -->
    @yield('content')    
    <!-- </div> -->
    <!--footer-->
    @include('theme::orapakat.partials.footer_')
  </body>
</html>