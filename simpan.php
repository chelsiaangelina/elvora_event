<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "ver";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi - Beloria Moments</title>
  <style>
    body {
      background-color: #f8e8f0;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .alert-box {
      background-color: #ffe6f0;
      color:rgb(179, 0, 125);
      padding: 30px;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(179, 17, 130, 0.1);
      max-width: 400px;
    }

    .alert-box h2 {
      margin-top: 0;
    }

    .alert-box a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: white;
      background-color: #b30059;
      padding: 10px 20px;
      border-radius: 6px;
    }

    .alert-box a:hover {
      background-color: #8a0043;
    }
  </style>
</head>
<body>

  <div class="alert-box">
    <?php if (isset($success) && $success): ?>
      <h2>✅ Terima kasih, <?= $nama ?>!</h2>
      <p>Pemesanan kamu telah <strong>berhasil disimpan</strong> ke database Beloria Moments.</p>
    <?php else: ?>
      <h2>❌ Oops!</h2>
      <p>Maaf, terjadi kesalahan saat menyimpan data.</p>
    <?php endif; ?>
    <a href="form.php">⬅️ Kembali ke Form</a>
  </div>

</body>
</html>