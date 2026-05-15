<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Admin Panel</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }
    
    .animate-float {
      animation: float 2s ease-in-out infinite;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }
    
    .dropdown-show {
      animation: slideIn 0.2s ease-out forwards;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans overflow-x-hidden">
  @if(session('success'))
<div id="toast"
     class="fixed top-5 right-5 bg-emerald-500 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2
            transform translate-x-full opacity-0 transition-all duration-500 z-50">
    {{ session('success') }}
</div>
@endif


<div class="flex h-screen overflow-hidden">
  
  @include('partials.sidebar')

  <main id="mainContent" class="flex-1 overflow-y-auto relative">

    <div class="fixed top-0 left-64 right-0 h-[35vh] min-h-[280px]">
      <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500"></div>

      <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-100 via-gray-100/80 to-transparent"></div>
    </div>

    <div class="relative z-10 p-6">

      
      
      @yield('content')

    </div>

    @include('partials.footer')

  </main>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>