<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rentalys.id - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
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

  <!-- Register Form -->
  <div id="register" class="form-container container mt-5">
    <h3 class="text-center">Register</h3>

    <!-- Alert for all errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input
          type="text"
          id="username"
          name="username"
          class="form-control @error('username') is-invalid @enderror"
          placeholder="Masukkan username"
          value="{{ old('username') }}"
          required>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          class="form-control @error('email') is-invalid @enderror"
          placeholder="Masukkan email"
          value="{{ old('email') }}"
          required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          class="form-control @error('password') is-invalid @enderror"
          placeholder="Masukkan password"
          required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          class="form-control"
          placeholder="Confirm your password"
          required>
      </div>
      <button type="submit" class="btn btn-warning w-100">Register</button>
      <p class="text-center mt-3">
        Punya akun? <a href="{{ route('login') }}">Login</a>
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