<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Informasi Biro Umum dan ASD DKI Jakarta</title>
  <style>
    :root {
      --primary: #03045e;
      --secondary: #023e8a;
      --accent: #0077b6;
      --highlight: #0096c7;
      --highlight-2: #00b4d8;
      --light-blue: #48cae4;
      --light-accent: #90e0ef;
      --lightest-blue: #ade8f4;
      --very-light-blue: #caf0f8;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      color: #1b1b1b;
      line-height: 1.6;
      transition: background-color 0.4s, color 0.4s;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    body.dark-mode {
      background-color: #2d2d2d;
      color: #e0e0e0;
    }

    header {
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      color: white;
      padding: 15px 30px;
      border-bottom: 5px solid var(--highlight);
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .header-content {
      max-width: 1200px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: transform 0.3s;
    }
    .logo:hover { transform: scale(1.05); }
    .logo img { height: 50px; }
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
      gap: 12px;
      align-items: center;
      position: relative;
    }
    .nav-buttons a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 8px 14px;
      border-radius: 6px;
      transition: background 0.3s, color 0.3s, transform 0.2s;
    }
    .nav-buttons a:hover {
      background: var(--highlight);
      color: #002050;
      transform: scale(1.05);
    }

    .dropdown {
      position: absolute;
      top: 100%;
      left: 0;
      background: var(--primary);
      display: none;
      flex-direction: column;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      z-index: 1000;
      min-width: 200px;
    }
    .dropdown a {
      padding: 10px 20px;
      white-space: nowrap;
      color: white;
      font-weight: normal;
    }
    .dropdown a:hover {
      background: var(--highlight);
      color: #002050;
    }

    .nav-item {
      position: relative;
    }
    .nav-item:hover .dropdown {
      display: flex;
    }

    .dropdown {
      position: absolute;
      top: 100%;
      left: 0;
      background: var(--primary);
      display: none;
      flex-direction: column;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      z-index: 1000;
      min-width: 200px;
    }
    .dropdown a {
      padding: 10px 20px;
      white-space: nowrap;
      color: white;
      font-weight: normal;
    }
    .dropdown a:hover {
      background: var(--highlight);
      color: #002050;
    }

    .nav-item {
      position: relative;
    }
    .nav-item:hover .dropdown {
      display: flex;
    }

    .clock {
      font-size: 14px;
      color: white;
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
        background: var(--primary);
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      }
      .nav-buttons.active {
        display: flex;
      }
      .hamburger {
        display: flex;
      }
      .nav-item:hover .dropdown {
        position: static;
      }
    }

    main {
      padding: 30px 20px;
      max-width: 800px;
      margin: auto;
    }
    .kontak-container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .kontak-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: var(--accent);
    }
    .kontak-info {
      margin-bottom: 20px;
    }
    .kontak-info p {
      margin-bottom: 10px;
      font-size: 16px;
    }
    .kontak-form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    .kontak-form input,
    .kontak-form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    .kontak-form button {
      margin-top: 20px;
      padding: 10px 20px;
      background: var(--accent);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }
    .kontak-form button:hover {
      background: var(--highlight);
    }

    footer {
      background: var(--primary);
      color: white;
      text-align: center;
      padding: 20px 10px;
      margin-top: auto;
    }
    footer p {
      margin: 5px 0;
    }
  </style>
</head>

<body>

  <header>
    <div class="header-content">
      <div class="logo" onclick="window.location.href='/'">
        <img src="{{ asset('img/Biro Umum Logo.png') }}" alt="logo">
        <div class="logo-text">
          <h1>Biro Umum dan ASD</h1>
          <p>SETDA Provinsi DKI Jakarta</p>
        </div>
      </div>
  
      <aside class="sidebar">
      <h2>Biro Umum</h2>
      <nav>
        <a href="#"><i data-lucide="layout-dashboard"></i>Home</a>
        <a href="/organisasiadmin"><i data-lucide="newspaper"></i>Organisasi</a>
        <a href="#"><i data-lucide="megaphone"></i>PPID</a>
        <a href="#"><i data-lucide="calendar-days"></i>Informasi</a>
        <a href="#"><i data-lucide="image"></i>Foto & Video</a>
        <a href="#"><i data-lucide="log-out"></i>Logout</a>
      </nav>
    </aside>

  
      <div class="hamburger" id="hamburger">
        <div></div><div></div><div></div>
      </div>
  
      <div class="clock" id="clock">00:00:00</div>
    </div>
  </header>

<main>
  <section class="kontak-container">
    <h2>Hubungi Kami</h2>
    <div class="kontak-info">
      <p><strong>Alamat:</strong> Jl. Medan Merdeka Selatan No.8-9, Jakarta Pusat, DKI Jakarta</p>
      <p><strong>Telepon:</strong> (021) 12345678</p>
      <p><strong>Email:</strong> biro.umum@jakarta.go.id</p>
    </div>

    <form class="kontak-form">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan email Anda">

      <label for="pesan">Pesan</label>
      <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>

      <button type="submit">Kirim Pesan</button>
    </form>
  </section>
</main>

<footer>
  <p>&copy; 2025 Biro Umum dan ASD - SETDA Provinsi DKI Jakarta.</p>
</footer>

<script>
function updateClock() {
  const now = new Date();
  const h = String(now.getHours()).padStart(2, '0');
  const m = String(now.getMinutes()).padStart(2, '0');
  const s = String(now.getSeconds()).padStart(2, '0');
  document.getElementById("clock").textContent = `${h}:${m}:${s}`;
}
setInterval(updateClock, 1000);
updateClock();

document.getElementById("hamburger").addEventListener("click", () => {
  document.getElementById("nav-menu").classList.toggle("active");
});
</script>

</body>
</html>
