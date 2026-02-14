<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - GreenTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    @include('partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>