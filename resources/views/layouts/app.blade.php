<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Manajemen Karyawan Freelance</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-800"
      style="background-image: url('/images/background.png'); background-size: cover; background-repeat: no-repeat; background-position: center; min-height: 100vh;">
  <div class="min-h-screen flex flex-col">
    
    <!-- HEADER -->
    <header class="bg-blue-900 shadow">
      <div class="px-8 py-8">
        <h1 class="text-5xl font-bold text-white text-center">Aplikasi Manajemen Karyawan Freelance PT Zaky Azda</h1>
      </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow flex justify-center items-start py-10">
      <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 w-[90%]">
        @yield('content')
      </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-blue-900 text-white text-center py-4 shadow-inner">
      &copy; {{ date('Y') }} PT. Zaky Azda
    </footer>
  
  </div>
</body>
</html>
