<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentalys.id</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('css/styles4.css') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">Rentalys.id</a>
      <button
        class="btn btn-outline-light"
        onclick="window.location.href='index.html'">
        Logout
      </button>
    </div>
  </nav>

  <header class="text-center py-4 bg-warning">
    <h1 class="fw-bold">Temukan baju cosplay</h1>
    <h2 class="fw-bold">Sekarang Juga!</h2>
  </header>

  <div class="container my-4">
    <div class="row mb-4">
      <div class="col">
        <input
          type="text"
          class="form-control"
          placeholder="Pencarian..."
          aria-label="Search" />
      </div>
    </div>

    <div class="row">
      <!-- Card Item 1 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          <img
            src="cos1.jpg"
            class="card-img-top"
            alt="Gojo Satoru Clothes" />
          <div class="card-body">
            <h5 class="card-title">Gojo Satoru Clothes</h5>
            <p class="card-text">Rp 200.000</p>
            <div class="sizes mb-3">
              <span class="badge bg-warning text-dark">XXL</span>
              <span class="badge bg-warning text-dark">XL</span>
              <span class="badge bg-warning text-dark">L</span>
            </div>
            <button
              class="btn btn-dark"
              onclick="window.location.href='detail.html'">
              Rental
            </button>
          </div>
        </div>
      </div>

      <!-- Card Item 2 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          <img
            src="cos2.jpg"
            class="card-img-top"
            alt="Tanjiro Kamado Clothes" />
          <div class="card-body">
            <h5 class="card-title">Tanjiro Kamado Clothes</h5>
            <p class="card-text">Rp 180.000</p>
            <div class="sizes mb-3">
              <span class="badge bg-warning text-dark">XL</span>
              <span class="badge bg-warning text-dark">L</span>
            </div>
            <button
              class="btn btn-dark"
              onclick="window.location.href='detail.html'">
              Rental
            </button>
          </div>
        </div>
      </div>

      <!-- Card Item 3 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          <img
            src="cos3.jpg"
            class="card-img-top"
            alt="Nezuko Kamado Clothes" />
          <div class="card-body">
            <h5 class="card-title">Nezuko Kamado Clothes</h5>
            <p class="card-text">Rp 170.000</p>
            <div class="sizes mb-3">
              <span class="badge bg-warning text-dark">M</span>
              <span class="badge bg-warning text-dark">S</span>
            </div>
            <button
              class="btn btn-dark"
              onclick="window.location.href='detail.html'">
              Rental
            </button>
          </div>
        </div>
      </div>

      <!-- Card Item 4 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          <img
            src="cos4.jpg"
            class="card-img-top"
            alt="Itadori Yuji Clothes" />
          <div class="card-body">
            <h5 class="card-title">Itadori Yuji Clothes</h5>
            <p class="card-text">Rp 190.000</p>
            <div class="sizes mb-3">
              <span class="badge bg-warning text-dark">XXL</span>
              <span class="badge bg-warning text-dark">XL</span>
              <span class="badge bg-warning text-dark">M</span>
            </div>
            <button
              class="btn btn-dark"
              onclick="window.location.href='detail.html'">
              Rental
            </button>
          </div>
        </div>
      </div>

      <!-- Card Item 5 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card text-center">
          <img src="cos5.jpg" class="card-img-top" alt="Nami Wanpis" />
          <div class="card-body">
            <h5 class="card-title">Nami Wanpis</h5>
            <p class="card-text">Rp 210.000</p>
            <div class="sizes mb-3">
              <span class="badge bg-warning text-dark">XXL</span>
              <span class="badge bg-warning text-dark">XL</span>
              <span class="badge bg-warning text-dark">L</span>
            </div>
            <button
              class="btn btn-dark"
              onclick="window.location.href='detail.html'">
              Rental
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center py-3 bg-dark text-light">
    Copyright kelompok x © 2025
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>