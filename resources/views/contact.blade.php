<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Contact BEM UNRI Kabinet Biru Langit - Get in touch with us for more information">
        <meta name="keywords" content="BEM UNRI, Contact, Kontak, Kabinet Biru Langit, Humas, Organization Relations">
        <meta name="author" content="BEM UNRI 2025">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Contact - BEM UNRI 2025">
        <meta property="og:description" content="Get in touch with BEM UNRI Kabinet Biru Langit for more information">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/contact') }}">
        
        <title>Contact - BEM UNRI 2025</title>
        <link rel="canonical" href="{{ url('/contact') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <contact-page></contact-page>
        </div>
    </body>
</html>