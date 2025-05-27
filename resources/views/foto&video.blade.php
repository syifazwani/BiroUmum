<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galeri Foto & Video</title>
  <style>
    :root {
      --primary: #03045e;
      --secondary: #023e8a;
      --highlight: #0096c7;
      --background: #f0f8ff;
      --text: #222;
    }

    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: var(--background);
      color: var(--text);
      padding: 20px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .tabs button {
      background: var(--primary);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    .tabs button.active {
      background: var(--highlight);
    }

    .album-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      gap: 20px;
    }

    .album-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: transform 0.2s;
    }

    .album-card:hover {
      transform: scale(1.03);
    }

    .album-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .album-card .title {
      padding: 10px;
      text-align: center;
      font-weight: bold;
    }

    .media-grid {
      display: none;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 15px;
      margin-top: 20px;
    }

    .media-grid.active {
      display: grid;
    }

    .media-grid img, .media-grid video {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
    }

    .back-button {
      display: none;
      margin-bottom: 20px;
      background: var(--highlight);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
    }

    .back-button.show {
      display: inline-block;
    }

  </style>
</head>
<body>

  <h1 style="text-align:center; margin-bottom: 20px;">Galeri Biro Umum dan ASD</h1>

  <div class="tabs">
    <button class="tab-btn active" data-tab="album">Album</button>
    <button class="tab-btn" data-tab="video">Video</button>
  </div>

  <!-- ALBUM VIEW -->
  <div id="album" class="tab-content active">
    <div class="album-grid" id="albumGrid">
      <!-- Album Card -->
      <div class="album-card" onclick="openAlbum('album1')">
        <img src="/img/foto1.jpg" alt="album">
        <div class="title">Kegiatan 2025</div>
      </div>
      <div class="album-card" onclick="openAlbum('album2')">
        <img src="/img/foto4.jpg" alt="album">
        <div class="title">Rapat Koordinasi</div>
      </div>
    </div>

    <button class="back-button" id="backBtn" onclick="closeAlbum()">← Kembali ke Album</button>

    <div id="album1" class="media-grid">
      <img src="/img/foto1.jpg" alt="">
      <img src="/img/foto2.jpg" alt="">
      <img src="/img/foto3.jpg" alt="">
    </div>

    <div id="album2" class="media-grid">
      <img src="/img/foto4.jpg" alt="">
      <img src="/img/foto5.jpg" alt="">
      <img src="/img/foto6.jpg" alt="">
    </div>
  </div>

  <!-- VIDEO VIEW -->
  <div id="video" class="tab-content" style="display:none;">
    <div class="media-grid active">
      <video src="/video/video1.mp4" controls></video>
      <video src="/video/video2.mp4" controls></video>
    </div>
  </div>

  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const backBtn = document.getElementById('backBtn');

    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        tabButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        tabContents.forEach(c => c.style.display = 'none');
        document.getElementById(btn.dataset.tab).style.display = 'block';

        closeAlbum(); // Reset jika sebelumnya sedang di dalam album
      });
    });

    function openAlbum(albumId) {
      document.getElementById('albumGrid').style.display = 'none';
      backBtn.classList.add('show');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.remove('active'));
      document.getElementById(albumId).classList.add('active');
    }

    function closeAlbum() {
      document.getElementById('albumGrid').style.display = 'grid';
      backBtn.classList.remove('show');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.remove('active'));
    }
  </script>

</body>
</html>
