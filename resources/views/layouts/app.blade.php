<!doctype html>


<head>

    <title>{{ config('app.name')  }} @yield('subtitle') </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">

   @include('partials.header')
   @include('partials.nav')

    @yield('content')

    @include('partials.footer')
</section>
<x-flash-message/>
</body>
</html>