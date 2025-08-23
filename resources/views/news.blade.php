<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Biru Langit News - Portal berita dan informasi terkini dari BEM UNRI Kabinet Biru Langit">
        <meta name="keywords" content="BEM UNRI, Berita, News, Kabinet Biru Langit, Kemendagri, Kemlu, Sosmas">
        <meta name="author" content="BEM UNRI 2025">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Biru Langit News - BEM UNRI 2025">
        <meta property="og:description" content="Portal berita dan informasi terkini dari BEM UNRI Kabinet Biru Langit">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/news') }}">
        
        <title>Biru Langit News - BEM UNRI 2025</title>
        <link rel="canonical" href="{{ url('/news') }}">
        <link rel="icon" type="image/png" href="{{ asset('images/logobem.png') }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <news-page></news-page>
        </div>
    </body>
</html>