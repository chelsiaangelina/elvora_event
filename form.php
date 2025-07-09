<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "alvora_event";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah form dikirim pakai POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan filter data
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal = $_POST['tanggal']; // Date tidak perlu escape khusus

    // Gunakan prepared statement (lebih aman)
    $stmt = $conn->prepare("INSERT INTO pemesanan (nama, email, tanggal) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $tanggal);

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi -alvora events</title>
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
      color:rgb(181, 11, 181);
      padding: 30px;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
      background-color:rgb(181, 5, 169);
      padding: 10px 20px;
      border-radius: 6px;
    }

    .alert-box a:hover {
      background-color:rgb(183, 10, 154);
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
