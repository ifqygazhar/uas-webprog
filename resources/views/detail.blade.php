<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentalys.id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/styles5.css') }}">
  <script>
    function sendToWhatsApp() {
      const name = document.getElementById('name').value;
      const address = document.getElementById('address').value;
      const phone = document.getElementById('phone').value;
      const size = document.getElementById('sizes').value;
      const total = "{{$post->harga}}";


      const message = `Halo, saya ingin rental baju cosplay dengan detail berikut:
Nama: ${name}
Alamat: ${address}
No HP: ${phone}
Ukuran: ${size}
Total: Rp ${total}`;

      const whatsappNumber = "6285156298681";

      // Buat URL WhatsApp
      const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

      // Buka URL WhatsApp
      window.open(whatsappURL, '_blank');
    }
  </script>
</head>

<body>
  <div class="header">
    <a href="/home">Rentalys.id</a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
      @csrf
      <button class="logout" type="submit">Logout</button>
    </form>
  </div>

  <div class="container">
    <!-- Box untuk Gambar -->
    <div class="box image-box">
      <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
    </div>

    <!-- Box untuk Deskripsi -->
    <div class="box description-box">
      <h1>{{ $post->title }}</h1>
      <div class="sizes">
        <h1>Ukuran:</h1>
        @foreach ($post->sizes as $size)
        <button class="size-button">{{ $size }}</button>
        @endforeach
      </div>
      <p>Deskripsi : </p>
      <p>{{ $post->excerpt }}</p>
    </div>

    <!-- Box untuk Form -->
    <div class="box form-box">
      <h3>Informasi Penerima</h3>
      <form id="orderForm">
        <label for="name">Nama Penerima</label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required />

        <label for="address">Alamat Lengkap</label>
        <input type="text" id="address" name="address" placeholder="Masukkan alamat lengkap" required />

        <label for="phone">No HP</label>
        <input type="text" id="phone" name="phone" placeholder="Masukkan nomor HP" required />

        <label for="sizes">Ukuran</label>
        <select id="sizes" name="size" required>
          @foreach ($post->sizes as $size)
          <option value="{{ $size }}">{{ $size }}</option>
          @endforeach
        </select>

        <div class="total">Total: Rp {{ $post->harga }}</div>

        <button type="button" onclick="sendToWhatsApp()">Rental</button>
      </form>

    </div>
  </div>

  <div class="footer">Copyright kelompok x 2025</div>
</body>

</html>