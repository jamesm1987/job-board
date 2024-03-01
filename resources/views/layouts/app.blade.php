<!doctype html>

<title>{{ config('app.name')  }} @yield('subtitle') </title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
   @include('partials.nav')

    @yield('content')

    @include('partials.footer')
</section>
<x-flash-message/>
</body>