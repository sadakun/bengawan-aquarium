<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('titles')
	<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Overpass+Mono:wght@300;400;600;700&display=swap" rel="stylesheet"> 
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/templatemo-xtra-blog.css" rel="stylesheet">
    @yield('styles')
    <!-- summernote plugin css -->
    <x-summernote-jquery-and-bootstrap></x-summernote-jquery-and-bootstrap>
</head>
<body>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">Sadaku Blog</h1>
            </div>
            <!-- sidebar -->
            <x-blog.sidebar></x-blog.sidebar>
            <x-blog.social-media></x-blog.social-media>
            
            <p class="tm-mb-80 pr-5 text-white">
                Sadaku Blog is a portfolio purpose using template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <x-blog.search></x-blog.search>
            @yield('content')        
            <x-blog.footer></x-blog.footer>
        </main>
    </div>
    @yield('modals')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/templatemo-script.js"></script>
    <!-- <script src="/vendor/jquery/jquery.min.js"></script> -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <x-summernote-css-and-js></x-summernote-css-and-js>
    @yield('scripts')
</body>
</html>