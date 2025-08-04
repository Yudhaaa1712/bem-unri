<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="BEM UNRI 2025 Kabinet Biru Langit - Organisasi mahasiswa yang mengayomi, menginspirasi, dan memberdayakan seluruh mahasiswa Universitas Riau">
        <meta name="keywords" content="BEM UNRI, Badan Eksekutif Mahasiswa, Universitas Riau, Kabinet Biru Langit, Mahasiswa, Organisasi">
        <meta name="author" content="BEM UNRI 2025">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="BEM UNRI 2025 - Kabinet Biru Langit">
        <meta property="og:description" content="Organisasi mahasiswa yang mengayomi, menginspirasi, dan memberdayakan seluruh mahasiswa Universitas Riau">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:image" content="{{ asset('images/bem-unri-logo.png') }}">
        
        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="BEM UNRI 2025 - Kabinet Biru Langit">
        <meta name="twitter:description" content="Organisasi mahasiswa yang mengayomi, menginspirasi, dan memberdayakan seluruh mahasiswa Universitas Riau">
        
        <title>BEM UNRI 2025 - Kabinet Biru Langit</title>
        <link rel="canonical" href="{{ url('/') }}">
      <link rel="icon" type="image/png" href="{{ asset('images/logobem.png') }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <home-page></home-page>
        </div>
    </body>
</html>