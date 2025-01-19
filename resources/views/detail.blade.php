<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentalys.id</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/styles5.css') }}">
</head>

<body>
  <div class="header">
    <a href="dashboard.html">Rentalys.id</a>
    <button class="logout">Logout</button>
  </div>

  <div class="container">
    <div class="box image-box">
      <img src="cos1.jpg" alt="Gojo Satoru Clothing" />
    </div>

    <div class="box description-box">
      <h1>Gojo Satoru Clothing Cosplay Cheap</h1>
      <div class="sizes">
        <h1>Ukuran:</h1>
        <button class="size-button">XXL</button>
        <button class="size-button">XL</button>
        <button class="size-button">L</button>
      </div>
      <p>Ini adalah deskripsi untuk baju cosplay.</p>
      <ul>
        <li>Point Deskripsi 1</li>
        <li>Point Deskripsi 2</li>
        <li>Point Deskripsi 3</li>
      </ul>
    </div>

    <!-- Box untuk Form -->
    <div class="box form-box">
      <h3>Informasi Penerima</h3>
      <label for="name">Nama Penerima</label>
      <input type="text" id="name" placeholder="Masukkan nama lengkap" />

      <label for="address">Alamat Lengkap</label>
      <input type="text" id="address" placeholder="Masukkan alamat lengkap" />

      <label for="phone">No HP</label>
      <input type="text" id="phone" placeholder="Masukkan nomor HP" />

      <div class="total">Total: Rp 200.000</div>

      <button type="submit">Rental</button>
    </div>
  </div>

  <div class="footer">Copyright kelompok x 2025</div>
</body>

</html>