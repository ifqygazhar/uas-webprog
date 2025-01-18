<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rentalys.id</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
  <div class="container">
    <!-- Header -->
    <header>
      <div class="logo">Rentalys.id</div>
      <div class="menu">
        <!-- Jika user belum login -->
        @guest
        <a href="{{ route('register') }}">
          <button class="btn scale-up">Daftar</button>
        </a>
        <a href="{{ route('login') }}">
          <button class="btn btn-outline scale-up">Login</button>
        </a>
        @endguest

        <!-- Jika user sudah login -->
        @auth
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn btn-outline scale-up">Logout</button>
        </form>
        @endauth
      </div>
    </header>

    <!-- Main Content -->
    <main>
      <div class="content">
        <h1 class="fade-in">RENTAL BAJU COSPLAY</h1>
        <p class="fade-in">Pilih baju, klik, dan bayar, semudah itu!</p>
        @auth
        <button class="btn scale-up" id="startButton">Welcome Back</button>
        @else
        <button class="btn scale-up" id="startButton">Ayo Mulai</button>
        @endauth
      </div>
      <div class="illustration fade-in">
        <img src="{{ asset('img/superhero.png') }}" alt="Ilustrasi">
      </div>
    </main>

    <!-- Footer -->
    <footer>
      Copyright kelompok x © {{ date('Y') }}
    </footer>
  </div>
</body>

</html>