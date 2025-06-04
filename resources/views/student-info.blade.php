<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Student Info - Informasi prestasi mahasiswa dan program beasiswa BEM UNRI Kabinet Biru Langit">
        <meta name="keywords" content="BEM UNRI, Prestasi Mahasiswa, Beasiswa, Student Info, Kabinet Biru Langit">
        <meta name="author" content="BEM UNRI 2025">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Student Info - BEM UNRI 2025">
        <meta property="og:description" content="Informasi prestasi mahasiswa dan program beasiswa BEM UNRI Kabinet Biru Langit">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/student-info') }}">
        
        <title>Student Info - BEM UNRI 2025</title>
        <link rel="canonical" href="{{ url('/student-info') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <student-info-page></student-info-page>
        </div>
    </body>
</html>