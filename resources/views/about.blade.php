<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tentang BEM UNRI 2025 Kabinet Biru Langit - Struktur Organisasi dan Departemen">
        <meta name="keywords" content="BEM UNRI, About, Struktur Organisasi, Departemen, Kabinet Biru Langit">
        <meta name="author" content="BEM UNRI 2025">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="About - BEM UNRI 2025 Kabinet Biru Langit">
        <meta property="og:description" content="Struktur organisasi dan departemen BEM UNRI Kabinet Biru Langit 2025">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/about') }}">
        <meta property="og:image" content="{{ asset('images/bem-unri-logo.png') }}">
        
        <title>About - BEM UNRI 2025 Kabinet Biru Langit</title>
        <link rel="canonical" href="{{ url('/about') }}">
        <link rel="icon" type="image/png" href="{{ asset('images/logobem.png') }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <about-page></about-page>
        </div>
    </body>
</html>