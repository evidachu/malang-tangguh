<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['user_id']);
$userEmail = $loggedIn ? $_SESSION['email'] : '';
$userName = $loggedIn ? $_SESSION['nama'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="landing-page.css">
    <link rel="stylesheet" href="header-footer.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="hero" align="middle">
            <div class="hero-bg"></div>
            <div class="hero-content">
                <h1>Malang Tangguh <span class="weather-icon">&#9729;</span></h1>
                <p>Selamat datang di website pelaporan banjir Kota Malang.</p>
                <div class="features">
                    <a href="form.php" class="feature-card fc1">
                        <img src="asset/Submit.png" alt="Form Laporan">
                        <span>Form Laporan</span>
                    </a>
                    <a href="riwayat.php" class="feature-card fc2">
                        <img src="asset/Clipboard.png" alt="Laporan Banjir Terkini">
                        <span>Laporan Banjir Terkini</span>
                    </a>
                    <a href="proyek.php" class="feature-card fc3">
                        <img src="asset/Engineers.png" alt="Proyek">
                        <span>Proyek</span>
                    </a>
                    <a href="panduan.php" class="feature-card fc4">
                        <img src="asset/Information.png" alt="Panduan Banjir">
                        <span>Panduan Banjir</span>
                    </a>
                    <a href="peta.php" class="feature-card fc5">
                        <img src="asset/Location.png" alt="Daerah Rawan">
                        <span>Daerah Rawan</span>
                    </a>
                </div>
                <div class="scroll-down">
                    <span>Kenali fitur kami</span>
                    <a href="#cards-section">
                    <img src="asset/arrowscrolllandingpage.png" class="arrow">
                    </a>
                </div>
            </div>
        </section>

        <section class="cards-section" id="cards-section">
            <div class="card-row">
                <div class="info-card blue">
                    <img src="asset/form.jpg " alt="Form Laporan Banjir"
                    style="width: 283px; height: 250px;" />
                    <div>
                        <h2>Form Laporan Banjir</h2>
                        <p>Fitur Laporan Kejadian Banjir memungkinkan masyarakat untuk memberikan informasi terkait kejadian banjir di sekitar mereka secara langsung. Pengguna dapat memilih lokasi kejadian berdasarkan wilayah dan nama jalan yang terdampak, serta mengisi waktu dan tanggal terjadinya banjir. Tersedia juga kolom opsional untuk mencantumkan tinggi air dalam satuan sentimeter. Selain itu, pengguna dapat mengunggah foto sebagai bukti visual dan menambahkan deskripsi kejadian untuk memberikan informasi tambahan. Fitur ini dirancang agar laporan yang masuk dapat segera dianalisis dan ditindaklanjuti oleh pihak terkait secara cepat dan akurat.</p>
                    </div>
                </div>
            </div>
            <div class="card-row">
                <div class="info-card green">
                    <img src="asset/proyek.jpg" alt="Proyek Anti Banjir"
                    style="width: 283px; height: 250px;" />
                   
                    <div>
                        <h2>Proyek Anti Banjir</h2>
                        <p>Fitur Proyek Anti Banjir Kota Malang menampilkan informasi terkini mengenai berbagai inisiatif pemerintah dalam upaya mengurangi risiko banjir di wilayah Kota Malang. Setiap proyek disertai dengan lokasi spesifik, status pengerjaan, dan ringkasan informasi yang memberikan gambaran jelas kepada masyarakat mengenai langkah-langkah yang sedang dijalankan. Melalui fitur ini, warga dapat memantau perkembangan proyek secara transparan serta memahami dampak dan manfaatnya bagi lingkungan sekitar. Tautan “Baca Selengkapnya” memungkinkan akses ke informasi lebih lengkap tentang progres, tujuan, dan pihak yang bertanggung jawab dalam pelaksanaannya.</p>
                    </div>
                </div>
                <div class="info-card orange">
                    <img src="asset/panduan.jpg" alt="Panduan Banjir"
                    style="width: 283px; height: 250px;" />
                    <div>
                        <h2>Panduan Banjir</h2>
                        <p>Fitur Panduan Menghadapi Banjir memberikan langkah-langkah praktis untuk meningkatkan kesiapsiagaan dan keselamatan masyarakat sebelum dan saat banjir terjadi. Panduan ini mencakup pemeriksaan dan pembersihan saluran air sebelum musim hujan, persiapan karung pasir untuk mencegah masuknya air ke dalam rumah, serta pengamanan barang-barang penting dan dokumen dengan memindahkannya ke tempat yang lebih tinggi. Pengguna juga diarahkan untuk menyiapkan rute evakuasi dan berkoordinasi dengan keluarga maupun tetangga. Fitur ini juga menjelaskan daftar barang penting, peringatan tentang tindakan yang harus dihindari saat banjir, serta tips tambahan agar tetap aman</p>
                    </div>
                </div>
            </div>
            <div class="card-row">
                <div class="info-card yellow">
                    <img src="asset/area.jpg" alt="Area Rawan Banjir"
                    style="width: 283px; height: 250px;" />
                    <div>
                        <h2>Area Rawan Banjir</h2>
                        <p>Fitur Area Rawan Banjir menampilkan peta interaktif yang menandai lokasi-lokasi di Kota Malang yang berisiko tinggi mengalami banjir. Pengguna dapat melihat titik-titik rawan banjir lengkap dengan keterangan penyebabnya, seperti meluapnya sungai di sekitar Jl. Lorem Ipsum. Peta ini memanfaatkan data dari OpenStreetMap sehingga informasi lokasi dapat diakses secara akurat dan mudah dipahami. Dengan fitur ini, masyarakat dan pihak terkait dapat lebih waspada dan melakukan langkah antisipasi di daerah-daerah tersebut.</p>
                    </div>
                </div>
                <div class="info-card tosca">
                    <img src="asset/laporan.jpg" alt="Laporan Banjir Terkini"
                    style="width: 283px; height: 250px;" />
                    <div>
                        <h2>Laporan Banjir Terkini</h2>
                        <p>Fitur Riwayat Laporan Banjir menampilkan daftar laporan banjir yang telah dikirim oleh masyarakat atau pihak terkait. Pengguna dapat mencari laporan berdasarkan kata kunci dan menyaring data berdasarkan kecamatan yang dipilih. Setiap entri laporan mencakup informasi penting seperti tanggal dan waktu kejadian, lokasi kecamatan dan nama jalan, tinggi air (jika tersedia), deskripsi singkat kejadian, serta tautan untuk melihat foto bukti. Fitur ini bertujuan untuk memberikan transparansi, dokumentasi historis, serta mendukung analisis wilayah rawan banjir berdasarkan data waktu nyata yang terkumpul.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-section" id="about-section">
            <div class="curve"></div>
            <div class="container">
                <button class="button">Tentang Kami</button>
                <p class="content">
                    Malang Tangguh adalah platform yang dikembangkan untuk membantu masyarakat Kota Malang dalam menghadapi dan mengantisipasi risiko banjir. Dengan berbagai fitur interaktif, kami berupaya meningkatkan kesiapsiagaan, transparansi informasi, dan kolaborasi antara warga dan pemerintah demi terciptanya kota yang lebih aman dan tangguh, sejalan dengan fokus pada pembangunan berkelanjutan sesuai dengan tujuan SDG 11: Sustainable Cities and Communities. Platform ini dikembangkan oleh Kelompok 2 Angkatan 2023, mahasiswa Program Studi Pendidikan Teknologi Informasi, Fakultas Ilmu Komputer, Universitas Brawijaya, yang berkomitmen untuk menghadirkan solusi teknologi inovatif demi kesejahteraan masyarakat.
                </p>
                <div class="emergency-contacts" id="emergency-contacts">
                    <h2>Telepon Darurat</h2>
                    <div class="contact-grid">
                        <div class="contact-card">
                            <img src="https://cdn-icons-png.flaticon.com/512/890/890547.png" alt="Phone">
                            <div class="contact-info">
                                <h3>BPBD Kota Malang</h3>
                                <p>Hotline</p>
                            </div>
                            <a href="tel:08113770502" class="contact-link">0811-3770-502</a>
                        </div>
                        <div class="contact-card">
                            <img src="https://cdn-icons-png.flaticon.com/512/3670/3670051.png" alt="WhatsApp">
                            <div class="contact-info">
                                <h3>PMI Kota Malang</h3>
                                <p>WhatsApp</p>
                            </div>
                            <a href="https://wa.me/087784111180" class="contact-link">0877-8411-1180</a>
                        </div>
                        <div class="contact-card">
                            <img src="https://cdn-icons-png.flaticon.com/512/3670/3670051.png" alt="WhatsApp">
                            <div class="contact-info">
                                <h3>Humas Kantor Kota Malang</h3>
                                <p>WhatsApp</p>
                            </div>
                            <a href="https://wa.me/081132235050" class="contact-link">0811-3223-5050</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div id="footer-include"></div>

    <script>
        fetch('header.php')
            .then(res => res.text())
            .then(data => document.getElementById('header-include').innerHTML = data);

        fetch('footer.html')
            .then(res => res.text())
            .then(data => document.getElementById('footer-include').innerHTML = data);
    </script>
</body>
</html>