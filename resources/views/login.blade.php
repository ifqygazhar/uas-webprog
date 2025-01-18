<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rentalys.id - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles3.css') }}">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{ url('/') }}">Rentalys.id</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Login Form -->
  <div id="login" class="form-container container mt-5">
    <h3 class="text-center">Login</h3>
    <!-- Success Message -->
    @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Error Message -->
    @if (session('loginError'))
    <div class="alert alert-danger text-center">{{ session('loginError') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label for="login-email" class="form-label">Email</label>
        <input type="email" id="login-email" name="email" class="form-control" placeholder="Masukkan email" required>
      </div>
      <div class="mb-3">
        <label for="login-password" class="form-label">Password</label>
        <input type="password" id="login-password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn btn-dark w-100">Login</button>
      <p class="text-center mt-3">
        Belum punya akun? <a href="{{ route('register') }}">Register</a>
      </p>
    </form>
  </div>

  <!-- Footer -->
  <footer class="footer bg-dark text-white text-center py-3 mt-5">
    Copyright kelompok x © 2025
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>