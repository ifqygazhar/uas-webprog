<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentalys.id</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('css/styles4.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <script>
    // Fungsi untuk mengarahkan pengguna ke halaman yang dituju
    function redirectTo(route) {
      window.location.href = `/${route}`;
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Rentalys.id</a>
      @auth
      <div class="d-flex align-items-center">
        @if (Auth::user()->is_admin)
        <button class="btn btn-outline-light me-2" id="startButton" onclick="redirectTo('dashboard')">Dashboard</button>
        @endif
        <form action="{{ route('logout') }}" method="post" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-light">Logout</button>
        </form>
      </div>
      @else
      <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
      @endauth
    </div>
  </nav>

  <header class="text-center py-4 bg-warning">
    <h1 class="fw-bold">Temukan baju cosplay</h1>
    <h2 class="fw-bold">Sekarang Juga!</h2>
  </header>

  <div class="container my-4">
    <div class="row mb-4">
      <div class="col">
        <form action="{{ url('/home') }}" method="GET">
          <input type="text" class="form-control" placeholder="Pencarian..." name="search" value="{{ request('search') }}" />
        </form>
      </div>
    </div>

    <div class="row">
      @foreach ($posts as $post)
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          @if ($post->image)
          <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->title }}" />
          @else
          <img src="https://source.unsplash.com/500x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}" />
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">Rp {{ $post->harga }}</p>
            <div class="sizes mb-3">
              @foreach(json_decode($post->sizes) as $size)
              <span class="badge bg-warning text-dark">{{ $size }}</span>
              @endforeach
            </div>
            <a href="/detail/{{ $post->slug }}" class="btn btn-dark">Rental</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <footer class="text-center py-3 bg-dark text-light">
    Copyright kelompok x © 2025
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>