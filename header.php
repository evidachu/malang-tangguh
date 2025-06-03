<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['user_id']);
$userName = $loggedIn ? $_SESSION['nama'] : '';
?>

<!-- Tambahkan link CSS di sini -->
<link rel="stylesheet" href="header-footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<header class="header">
        <div class="header-left">
            <a href="landing-page.php">
                <img src="asset/logo malang tangguh.png" alt="Malang Tangguh Logo" class="logo">
            </a>
            <nav class="header-nav">
                <div class="dropdown">
                    <button class="dropbtn">Menu <i class="fas fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <a href="form.php">Form Laporan</a>
                        <a href="riwayat.php">Laporan Banjir Terkini</a>
                        <a href="proyek.php">Proyek</a>
                        <a href="panduan.php">Panduan Banjir</a>
                        <a href="peta.php">Daerah Rawan</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="header-right">
            <a href="landing-page.php#about-section" class="nav-link">Tentang Kami</a>
            <a href="landing-page.php#emergency-contacts" class="nav-link">Telepon Darurat</a>
            <div class="profile-dropdown" id="profileDropdown">
                <?php if (!$loggedIn): ?>
                    <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
                <?php else: ?>
                    <div class="profile-section">
                        <a href="profil.php" class="profile-info">
                            <div class="profile-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="profile-details">
                                <span class="profile-name"><?php echo htmlspecialchars($userName); ?></span>
                                <span class="profile-role">User</span>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
</header>
