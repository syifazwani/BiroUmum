<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Informasi - Biro Umum dan ASD SETDA DKI Jakarta</title>
  <link rel="stylesheet" href="{{ asset('css/styleorganisasi.css') }}">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: url('{{ asset('img/DJI_0135.jpg') }}') no-repeat center center fixed;
      background-size: cover;
    }

    .main-container {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: rgba(255, 255, 255, 0.5);
    }

    header {
      background-color: #3674B5;
      color: white;
      padding: 10px 20px;
    }

    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .logo {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .logo img {
      height: 50px;
      margin-right: 10px;
    }

    .logo-text h1 {
      margin: 0;
      font-size: 1.2rem;
    }

    .nav-buttons a {
      margin: 0 10px;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .nav-buttons a.active {
      border-bottom: 2px solid white;
    }

    .clock {
      margin-left: auto;
    }

    .tabs {
      flex: 1;
      padding: 20px;
    }

    .tab-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
    }

    .tab-buttons button {
      background-color: #578FCA;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .tab-buttons button.active,
    .tab-buttons button:hover {
      background-color: #3674B5;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    .struktur-organisasi img {
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .pdf-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .pdf-card {
      background: #ffffff;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .pdf-card h4 {
      font-size: 1rem;
      margin-bottom: 10px;
    }

    .pdf-card a {
      display: inline-block;
      margin-top: 5px;
      text-decoration: none;
      color: #ffffff;
    }

    .download-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #3674B5;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }

    footer {
      background-color: #3674B5;
      color: white;
      text-align: center;
      padding: 15px 0;
      margin-top: auto;
    }
  </style>
</head>
<body>
  <div class="main-container">
    <header>
      <div class="header-content">
        <div class="logo" onclick="window.location.href='/'">
          <img src="{{ asset('img/logo.png') }}" alt="logo">
          <div class="logo-text">
            <h1>Biro Umum dan ASD</h1>
            <p>SETDA Provinsi DKI Jakarta</p>
          </div>
        </div>
        <div class="nav-buttons" id="nav-menu">
          <a href="/beranda">Beranda</a>
          <a href="/organisasi">Organisasi</a>
          <a href="/ppid">PPID</a>
          <a href="/informasi" class="active">Informasi</a>
          <a href="/foto&video">Foto & Video</a>
        </div>
        <div class="clock" id="clock">00:00:00</div>
      </div>
    </header>

    <section class="tabs">
      <div class="tab-buttons">
        <button onclick="showTab('struktur', event)" class="active">Struktur Organisasi</button>
        <button onclick="showTab('kebijakan', event)">Kebijakan dan Regulasi</button>
        <button onclick="showTab('renstra', event)">Renstra</button>
        <button onclick="showTab('lkip', event)">LKIP</button>
        <button onclick="showTab('laporan', event)">Laporan Keuangan</button>
      </div>

      <!-- Struktur Organisasi -->
      <div id="struktur" class="tab-content active">
        <div class="struktur-organisasi">
          <h2>Struktur Organisasi</h2>
          <img src="{{ asset('storage/struktur/struktur.jpg') }}" alt="Struktur Organisasi">
        </div>
      </div>

      <!-- Kebijakan -->
      <div id="kebijakan" class="tab-content">
        <h3>Kebijakan dan Regulasi</h3>
        @if(Storage::disk('public')->exists('kebijakan'))
          @php $files = Storage::disk('public')->files('kebijakan'); @endphp
          @if(count($files) > 0)
            <div class="pdf-grid">
              @foreach($files as $file)
                <div class="pdf-card">
                  <h4>📄 {{ basename($file) }}</h4>
                  <a href="{{ asset('storage/' . $file) }}" target="_blank">Lihat File</a>
                  <br>
                  <a class="download-btn" href="{{ asset('storage/' . $file) }}" download>Unduh</a>
                </div>
              @endforeach
            </div>
          @else
            <p>Tidak ada file kebijakan yang tersedia.</p>
          @endif
        @else
          <p>Tidak ada folder kebijakan ditemukan.</p>
        @endif
      </div>

      <!-- Renstra -->
      <div id="renstra" class="tab-content">
  <h3>Rencana Strategis (Renstra)</h3>
  @if(Storage::disk('public')->exists('renstra'))
    @php $files = Storage::disk('public')->files('renstra'); @endphp
    @if(count($files) > 0)
      <div class="pdf-grid">
        @foreach($files as $file)
          <div class="pdf-card">
            <h4>📄 {{ basename($file) }}</h4>
            <a href="{{ asset('storage/' . $file) }}" target="_blank">Lihat File</a>
            <br>
            <a class="download-btn" href="{{ asset('storage/' . $file) }}" download>Unduh</a>
          </div>
        @endforeach
      </div>
    @else
      <p>Tidak ada dokumen Renstra yang tersedia.</p>
    @endif
  @else
    <p>Tidak ada folder Renstra ditemukan.</p>
  @endif
</div>


      <!-- LKIP -->
      <div id="lkip" class="tab-content">
        <div class="pdf-card">
          <h3>LKIP 2024</h3>
          <p>Laporan Kinerja Instansi Pemerintah tahun 2024.</p>
          <a href="/dokumen/lkip2024.pdf" class="download-btn" download>Unduh</a>
        </div>
      </div>

      <!-- Laporan -->
      <div id="laporan" class="tab-content">
        <div class="pdf-card">
          <h3>Laporan Keuangan 2024</h3>
          <p>Laporan keuangan tahun anggaran 2024.</p>
          <a href="/dokumen/laporan2024.pdf" class="download-btn" download>Unduh</a>
        </div>
      </div>
    </section>

    <footer>
      <p>&copy; 2025 Biro Umum dan ASD - SETDA Provinsi DKI Jakarta.</p>
    </footer>
  </div>

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

    function showTab(tabId, event) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
      document.querySelectorAll('.tab-buttons button').forEach(btn => btn.classList.remove('active'));
      document.getElementById(tabId).classList.add('active');
      event.target.classList.add('active');
    }
  </script>
</body>
</html>
