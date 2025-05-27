<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Biro Umum dan ASD SETDA DKI Jakarta</title>
  <style>
    :root {
      --primary: #03045e;
      --highlight: #0096c7;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    html, body {
      height: 100%;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: white;
      display: flex;
      flex-direction: column;
    }

    /* Background Video */
    .bg-video {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -2;
    }

    /* Header */
    header {
      background: rgba(23, 66, 160, 0.7);
      padding: 10px 25px;
      position: sticky;
      top: 0;
      z-index: 10;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }

    .logo img {
      height: 50px;
    }

    .logo-text h1 {
      font-size: 18px;
      text-transform: uppercase;
    }

    .logo-text p {
      font-size: 12px;
      color: #dcdcdc;
    }

    .nav-buttons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .nav-buttons a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 8px 14px;
      border-radius: 6px;
      transition: background 0.3s;
    }

    .nav-buttons a:hover {
      background: var(--highlight);
      color: #002050;
    }

    .clock {
      font-size: 14px;
      font-weight: bold;
      margin-left: 10px;
    }

    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
    }

    .hamburger div {
      width: 25px;
      height: 3px;
      background: white;
      border-radius: 2px;
    }

    @media (max-width: 768px) {
      .nav-buttons {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px;
        background: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 10px;
      }

      .nav-buttons.active {
        display: flex;
      }

      .hamburger {
        display: flex;
      }
    }

    main {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 20px;
      text-align: center;
    }

    /* Main Content */
    .main-content {
      width: 80%; /* Lebar box lebih lebar */
      max-width: 900px; /* Membatasi lebar maksimum box */
      margin: auto;
      background: rgba(0, 0, 0, 0.5);
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
      position: relative; /* Mengatur posisi relatif agar tidak tertutup footer */
      margin-top: 260px; /* Memberikan jarak dari atas */
      margin-bottom: -60px; /* Memberikan jarak yang cukup dengan footer */
    }

    .main-content h1 {
      font-size: 1.8em; /* Ukuran teks sedikit lebih besar */
      margin-bottom: 10px;
    }

    .main-content p {
      font-size: 1.1em; /* Ukuran teks lebih besar */
      margin-bottom: 15px;
    }

    .learn-more-btn {
      background-color: var(--highlight);
      padding: 12px 24px;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 18px;
      transition: background-color 0.3s;
    }

    .learn-more-btn:hover {
      background-color: #0077b6;
    }

    footer {
      background: rgba(23, 66, 160, 0.7);
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Background Video -->
  <video class="bg-video" autoplay loop muted playsinline>
    <source src="{{ asset('vid/balai.mp4') }}" type="video/mp4" />
    Browser Anda tidak mendukung tag video.
  </video>

  <!-- Header -->
  <header>
    <div class="logo" onclick="window.location.href='/'">
      <img src="{{ asset('img/logo.png') }}" alt="logo">
      <div class="logo-text">
        <h1>Biro Umum dan ASD</h1>
        <p>SETDA Provinsi DKI Jakarta</p>
      </div>
    </div>

    <div class="nav-buttons" id="nav-menu">
      <a href="/">Beranda</a>
      <a href="organisasi">Organisasi</a>
      <a href="ppid">PPID</a>
      <a href="informasi">Informasi</a>
      <a href="foto&video">Foto & Video</a>
    </div>

    <div class="hamburger" id="hamburger">
      <div></div><div></div><div></div>
    </div>

    <div class="clock" id="clock">00:00:00</div>
  </header>

  <!-- Main -->
  <main>
    <div class="main-content">
      <h1>Selamat datang di Biro Umum & ASD SETDA DKI Jakarta</h1>
      <p>Kami menyediakan berbagai layanan yang mendukung administrasi dan kebijakan pemerintah di DKI Jakarta.</p>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Biro Umum dan ASD - SETDA Provinsi DKI Jakarta.</p>
  </footer>

  <!-- JS -->
  <script>
    // Jam
    function updateClock() {
      const now = new Date();
      const h = String(now.getHours()).padStart(2, '0');
      const m = String(now.getMinutes()).padStart(2, '0');
      const s = String(now.getSeconds()).padStart(2, '0');
      document.getElementById("clock").textContent = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    // Hamburger menu
    document.getElementById("hamburger").addEventListener("click", () => {
      document.getElementById("nav-menu").classList.toggle("active");
    });
  </script>
</body>
</html>
