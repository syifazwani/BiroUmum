<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Organisasi Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    :root {
      --primary: #3674B5;
      --secondary: #578FCA;
      --light: #F7FAFC;
      --dark: #1F2937;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      background-color: var(--light);
      color: var(--dark);
      min-height: 100vh;
    }

    .sidebar {
      width: 240px;
      background-color: var(--primary);
      color: white;
      padding: 30px 20px;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      font-size: 1.5rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      padding: 10px 15px;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      margin-bottom: 10px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: var(--secondary);
    }

    .main {
      margin-left: 240px;
      padding: 40px;
      width: calc(100% - 240px);
    }

    .header {
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 2rem;
      color: var(--primary);
    }

    .tabs {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .tab-button {
      padding: 10px 20px;
      border: none;
      background-color: #e5effc;
      color: var(--primary);
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }

    .tab-button.active {
      background-color: var(--primary);
      color: white;
    }

    .tab-content {
      display: none;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      animation: fadeIn 0.3s ease;
    }

    .tab-content.active {
      display: block;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .footer {
      margin-top: 40px;
      text-align: center;
      color: #888;
      font-size: 0.9em;
    }

    @media(max-width: 768px) {
      .sidebar {
        display: none;
      }

      .main {
        margin-left: 0;
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>Admin Panel</h2>
    <a href="/dashboard">Dashboard</a>
    <a href="/OrganisasiAdmin" style="background-color: var(--secondary);">Organisasi</a>
    <a href="/berita">PPID</a>
    <a href="/agenda">Informasi</a>
    <a href="/galeri">Galeri</a>
  </aside>

  <!-- Main Content -->
  <main class="main">
    <div class="header">
      <h1>Halaman Organisasi</h1>
      <p>Kelola data organisasi dalam satu halaman dengan tab dinamis.</p>
    </div>

    <!-- Tabs -->
    <div class="tabs">
      <button class="tab-button active" onclick="showTab(0)">Struktur Organisasi</button>
      <button class="tab-button" onclick="showTab(1)">Kebijakan</button>
      <button class="tab-button" onclick="showTab(2)">Renstra</button>
      <button class="tab-button" onclick="showTab(3)">LKIP</button>
      <button class="tab-button" onclick="showTab(4)">Laporan Keuangan</button>
    </div>

    <!-- Tab Content -->
    <div id="tab-0" class="tab-content active">
      <h2>Struktur Organisasi</h2>
      <p>Upload dan kelola gambar struktur organisasi di sini.</p>
      <!-- Tambahkan form upload & tampilan data struktur di sini -->
      <form action="{{ route('struktur.upload') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="strukturFoto">Upload Struktur Organisasi:</label><br><br>
  <input type="file" id="strukturFoto" name="strukturFoto" accept="image/*">
  <br><br>
  <button type="submit">Upload</button>
</form>

<!-- Tampilkan Gambar Jika Ada -->
@if (Storage::disk('public')->exists('struktur/struktur.jpg'))
    <div style="margin-top: 20px;">
        <h4>Gambar Struktur Saat Ini:</h4>
        <img src="{{ asset('storage/struktur/struktur.jpg') }}" alt="Struktur" style="max-width: 100%; border-radius: 10px;">
        <form action="{{ route('struktur.hapus') }}" method="POST" style="margin-top: 10px;">
            @csrf
            <button type="submit" onclick="return confirm('Yakin ingin menghapus gambar struktur?')">Hapus Gambar</button>
        </form>
    </div>
@endif

<!-- Notifikasi -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
    </div>

    <div id="tab-1" class="tab-content">
      <h2>Kebijakan</h2>
      <p>Dokumen dan peraturan internal terkait kebijakan organisasi.</p>
      <!-- Tambahkan daftar dokumen atau upload kebijakan -->
      <!-- Form Upload PDF Kebijakan -->
<form action="{{ route('kebijakan.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fileKebijakan">Upload File Kebijakan (PDF):</label><br><br>
    <input type="file" name="fileKebijakan" id="fileKebijakan" accept="application/pdf">
    <br><br>
    <button type="submit">Upload</button>
</form>

<!-- Daftar File PDF yang Sudah Diupload -->
@if(Storage::disk('public')->exists('kebijakan'))
    <div style="margin-top: 20px;">
        <h4>Daftar File Kebijakan:</h4>
        <ul>
            @foreach(Storage::disk('public')->files('kebijakan') as $file)
                <li style="margin-bottom: 10px;">
                    <a href="{{ asset('storage/' . $file) }}" target="_blank">
                        {{ basename($file) }}
                    </a>

                    <!-- Form Hapus -->
                    <form action="{{ route('kebijakan.delete', basename($file)) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus file ini?')">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif


    </div>

   <div id="tab-2" class="tab-content">
    <h2>Renstra</h2>
    <p>Dokumen Rencana Strategis organisasi.</p>

    <!-- Form Upload PDF Renstra -->
    <form action="{{ route('renstra.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="fileRenstra">Upload File Renstra (PDF):</label><br><br>
        <input type="file" name="fileRenstra" id="fileRenstra" accept="application/pdf">
        <br><br>
        <button type="submit">Upload</button>
    </form>

    <!-- Daftar File PDF yang Sudah Diupload -->
    @if(Storage::disk('public')->exists('renstra'))
        <div style="margin-top: 20px;">
            <h4>Daftar File Renstra:</h4>
            <ul>
                @foreach(Storage::disk('public')->files('renstra') as $file)
                    <li style="margin-bottom: 10px;">
                        <a href="{{ asset('storage/' . $file) }}" target="_blank">
                            {{ basename($file) }}
                        </a>

                        <!-- Form Hapus -->
                        <form action="{{ route('renstra.delete', basename($file)) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus file ini?')">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Notifikasi -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</div>



    <div id="tab-3" class="tab-content">
      <h2>LKIP</h2>
      <p>Laporan Kinerja Instansi Pemerintah (LKIP).</p>
      <!-- Upload / tabel dokumen strategis -->
    </div>

    <div id="tab-4" class="tab-content">
      <h2>Laporan Keuangan</h2>
      <p>Kelola laporan anggaran dan realisasi keuangan tahunan.</p>
      <!-- Upload laporan keuangan -->
    </div>

    <div class="footer">
      © 2025 Biro Umum & ASD DKI Jakarta
    </div>
  </main>

  <script>
    function showTab(index) {
      const tabs = document.querySelectorAll('.tab-content');
      const buttons = document.querySelectorAll('.tab-button');
      tabs.forEach((tab, i) => {
        tab.classList.toggle('active', i === index);
        buttons[i].classList.toggle('active', i === index);
      });
    }
    lucide.createIcons();

  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function(){
      const preview = document.getElementById('previewImage');
      preview.src = reader.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }

  document.getElementById("uploadForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const fileInput = document.getElementById("strukturFoto");
    const file = fileInput.files[0];
    if (!file) return alert("Pilih gambar terlebih dahulu.");

    // Simulasi upload (ganti dengan fetch/axios ke server backend Laravel atau PHP)
    alert("Gambar berhasil diunggah! (simulasi)");

    // Di real backend, kirim pakai FormData:
    /*
    const formData = new FormData();
    formData.append('strukturFoto', file);

    fetch('/upload-struktur', {
      method: 'POST',
      body: formData
    }).then(res => res.json())
      .then(data => {
        alert("Berhasil diupload!");
        // Tampilkan gambar dari server jika perlu
      });
    */
  });

  </script>

</body>
</html>
