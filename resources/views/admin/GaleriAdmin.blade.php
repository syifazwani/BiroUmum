<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Galeri - Biro Umum dan ASD</title>
  <style>
    :root {
      --primary: #3674B5;
      --accent: #90e0ef;
      --text-dark: #1b1b1b;
      --background: #f7f9fc;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: var(--background);
      color: var(--text-dark);
    }

    header {
      background: var(--primary);
      color: white;
      padding: 16px 24px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }

    main {
      padding: 20px;
      max-width: 1100px;
      margin: auto;
    }

    .tabs {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .tab {
      padding: 10px 20px;
      background: white;
      border: 2px solid var(--primary);
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.2s;
    }

    .tab.active {
      background: var(--primary);
      color: white;
    }

    .album-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 16px;
    }

    .album-item {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: transform 0.2s;
      text-align: center;
    }

    .album-item:hover {
      transform: scale(1.03);
    }

    .album-item img {
      width: 100%;
      height: 130px;
      object-fit: cover;
    }

    .album-item p {
      padding: 10px;
      font-weight: bold;
    }

    .media-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }

    .media-grid img,
    .media-grid video {
      width: 100%;
      height: 140px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }

    .media-grid img:hover,
    .media-grid video:hover {
      transform: scale(1.02);
    }

    .back-btn {
      margin-top: 10px;
      display: inline-block;
      color: var(--primary);
      font-weight: bold;
      cursor: pointer;
    }

    .hidden {
      display: none;
    }

    h2 {
      margin-top: 0;
    }

    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    form input, form select {
      width: 100%;
      padding: 8px;
      margin: 10px 0 16px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    form button {
      background: var(--primary);
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }

    form button:hover {
      background: #2a5a8a;
    }
  </style>
</head>
<body>

<header>📷 Admin Galeri - Biro Umum & ASD</header>

<main>
  <!-- Tabs -->
  <div class="tabs">
    <div class="tab active" onclick="showTab('galeri')">📁 Album</div>
    <div class="tab" onclick="showTab('isi')">🖼️ Isi Album</div>
  </div>

  <!-- Album List -->
  <section id="galeri">
    <h2>Daftar Album</h2>

    <!-- Form Tambah Album -->
    <form id="formAlbum">
      <h3>➕ Tambah Album</h3>
      <input type="text" id="albumName" placeholder="Nama Album" required />
      <input type="file" id="albumCover" accept="image/*" required />
      <button type="submit">Simpan Album</button>
    </form>

    <div class="album-grid" id="albumList">
      <!-- Album akan muncul di sini -->
    </div>
  </section>

  <!-- Isi Album -->
  <section id="isi" class="hidden">
    <div class="back-btn" onclick="showTab('galeri')">← Kembali ke Album</div>
    <h2 id="albumTitle">Nama Album</h2>

    <!-- Form Tambah Foto/Video -->
    <form id="formMedia">
      <h3>➕ Tambah Foto/Video</h3>
      <select id="mediaType">
        <option value="image">Foto</option>
        <option value="video">Video</option>
      </select>
      <input type="file" id="mediaFile" accept="image/*,video/*" required />
      <button type="submit">Unggah</button>
    </form>

    <div class="media-grid" id="mediaContainer">
      <!-- Isi album -->
    </div>
  </section>
</main>

<script>
  const albumList = document.getElementById('albumList');
  const albumTitle = document.getElementById('albumTitle');
  const mediaContainer = document.getElementById('mediaContainer');

  let albums = [];
  let currentAlbumIndex = null;

  function showTab(tab) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('section').forEach(s => s.classList.add('hidden'));

    document.getElementById(tab).classList.remove('hidden');
    const tabIndex = tab === 'galeri' ? 0 : 1;
    document.querySelectorAll('.tab')[tabIndex].classList.add('active');
  }

  function openAlbum(index) {
    currentAlbumIndex = index;
    showTab('isi');
    albumTitle.textContent = albums[index].name;
    renderMedia();
  }

  function renderAlbums() {
    albumList.innerHTML = albums.map((album, index) => `
      <div class="album-item" onclick="openAlbum(${index})">
        <img src="${album.cover}" />
        <p>${album.name}</p>
      </div>
    `).join('');
  }

  function renderMedia() {
    if (currentAlbumIndex === null) return;
    const mediaItems = albums[currentAlbumIndex].media;
    mediaContainer.innerHTML = mediaItems.map(item => {
      if (item.type === 'image') {
        return `<img src="${item.src}" alt="Foto">`;
      } else {
        return `<video controls><source src="${item.src}" type="video/mp4"></video>`;
      }
    }).join('');
  }

  document.getElementById('formAlbum').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('albumName').value;
    const cover = URL.createObjectURL(document.getElementById('albumCover').files[0]);

    albums.push({ name, cover, media: [] });
    renderAlbums();
    this.reset();
  });

  document.getElementById('formMedia').addEventListener('submit', function(e) {
    e.preventDefault();
    if (currentAlbumIndex === null) return;

    const type = document.getElementById('mediaType').value;
    const file = document.getElementById('mediaFile').files[0];
    const src = URL.createObjectURL(file);

    albums[currentAlbumIndex].media.push({ type, src });
    renderMedia();
    this.reset();
  });

  // Contoh album awal (opsional)
  albums.push({
    name: "Kegiatan 2025",
    cover: "https://via.placeholder.com/300x200?text=Kegiatan+2025",
    media: []
  });
  renderAlbums();
</script>

</body>
</html>
