<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika user belum login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$nama = $_SESSION['nama'] ?? 'Tidak tersedia';
$email = $_SESSION['email'] ?? 'Tidak tersedia';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna - Malang Tangguh</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Plus Jakarta Sans', Arial, sans-serif;
      background-color: #e0f0ff;
    }

    .profile-container {
      max-width: 400px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .profile-header {
      background:#2176ae;
      color: white;
      text-align: center;
      padding: 40px 20px 20px;
    }

    .profile-header img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: white;
      padding: 10px;
      margin-bottom: 10px;
    }

    .profile-header h2 {
      margin: 0;
      font-size: 22px;
    }

    .profile-form {
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .profile-data {
    padding: 10px;
    background-color: #f5f5f5;
    border-radius: 8px;
    font-size: 14px;
    color: #333;
    min-height: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 6px;
      font-weight: 500;
      color: #003b73;
    }

    .form-group input,
    .form-group select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      width: 100%;
      box-sizing: border-box;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 2px;
      margin-top: 10px;
    }

    .button-container button {
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .edit-button {
      background:  #a6c7e8;
      color: white;
    }

    .edit-button:hover {
      background: #00315f;
    }

    .logout-button {
      background: #f44336;
      color: white;
    }

    .logout-button:hover {
      background:#C66852;
    }

    .logout-link {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        color: white;
        background: #f44336;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        transition: background 0.3s;
    }

    .logout-link:hover {
        background: #d32f2f;
    }

    .logout-link i {
        font-size: 16px;
    }

    .fas {
      margin-right: 8px;
    }

    /* Add this inside the existing <style> tag */
.back-link {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2px;
    text-decoration: none;
    color: white;
    background: #003b73;
    padding: 12px;
    border-radius: 8px;
    font-size: 16px;
    transition: background 0.3s;
    margin-top: 10px;
}

.back-link:hover {
    background: #00315f;
}
  </style>
</head>

<body>
  <div class="profile-container">
    <div class="profile-header">
      <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Foto Profil">
      <h2>Profil Pengguna</h2>
    </div>
    <div class="profile-form">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <div class="profile-data"><?php echo htmlspecialchars($nama); ?></div>
      </div>
      <div class="form-group">
        <label>Email</label>
        <div class="profile-data"><?php echo htmlspecialchars($email); ?></div>
      </div>
      <div class="button-container">
        <a href="logout.php" class="logout-link">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <a href="landing-page.php" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Beranda</span>
        </a>
      </div>
    </div>
  </div>
</body>
</html>