<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome Admin - Biro Umum dan ASD DKI</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #A1E3F9, #D1F8EF);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }

    .welcome-container {
      background-color: white;
      padding: 40px;
      border-radius: 16px;
      max-width: 600px;
      width: 90%;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      animation: fadeInUp 0.8s ease-in-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .welcome-container h1 {
      font-size: 2.2em;
      color: #3674B5;
      margin-bottom: 10px;
    }

    .welcome-container p {
      font-size: 1.1em;
      margin-bottom: 25px;
    }

    .admin-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }

    .admin-actions a {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #578FCA;
      color: white;
      text-decoration: none;
      padding: 15px 20px;
      border-radius: 10px;
      width: 130px;
      transition: background 0.3s ease;
    }

    .admin-actions a:hover {
      background-color: #3674B5;
    }

    .admin-actions i {
      margin-bottom: 8px;
    }

    .footer-note {
      margin-top: 30px;
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <h1>Selamat Datang, Admin!</h1>
    <p>Anda telah berhasil masuk ke sistem manajemen Biro Umum dan ASD Provinsi DKI Jakarta.</p>

    <div class="admin-actions">
      <a href="/admin/organisasiadmin"><i data-lucide="users"></i>Organisasi</a>
      <a href="#"><i data-lucide="newspaper"></i>PPID</a>
      <a href="#"><i data-lucide="calendar-check"></i>Informasi</a>
      <a href="/admin/GaleriAdmin"><i data-lucide="image"></i>Galeri</a>
    </div>

    <div class="footer-note">
      © 2025 Biro Umum & ASD DKI Jakarta
    </div>
  </div>
  <script>
    lucide.createIcons();
  </script>
</body>
</html>
