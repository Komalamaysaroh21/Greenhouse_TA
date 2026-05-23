<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Greenhouse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

   <section class="bg-white lg:grid lg:h-screen lg:place-content-center">
  <div class="mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-4 lg:px-8 lg:py-32">
    <div class="max-w-prose text-left">
      <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">
        Monitoring System
        <strong class="text-green-600"> Smart </strong>
        Greenhouse.
      </h1>

      <p class="mt-4 text-base text-pretty text-gray-700 sm:text-lg/relaxed">
        Pantau suhu, kelembaban, dan kondisi lingkungan tanaman dengan mudah 
        melalui dashboard pintar berbasis IoT.
      </p>

      <div class="mt-4 flex gap-4 sm:mt-6">
        <a href="/dashboard" class="inline-block rounded border border-green-600 bg-green-600 px-5 py-3 font-medium text-white shadow-sm transition-colors hover:bg-green-700 hover:border-green-700">
          Mulai Sekarang
        </a>

        <a onclick="comingSoon()" class="inline-block rounded border border-green-200 px-5 py-3 font-medium text-green-700 shadow-sm transition-colors hover:bg-green-50 hover:text-green-800" href="#">
          Pelajari Lebih Lanjut
        </a>
      </div>
    </div>

    <img src="{{ asset('images/baner.png') }}" alt="Greenhouse">
  </div>
</section>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>