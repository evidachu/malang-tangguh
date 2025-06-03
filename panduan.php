<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panduan Menghadapi Banjir</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
  <!-- Add Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="panduan.css">
  <link rel="stylesheet" href="header-footer.css">
</head>
<body>
  <?php include 'header.php'; ?>
  <main class="container">
    <section class="main-content">
      <div class="title-box">
        <h1>Panduan Menghadapi<br>Banjir</h1>
      </div>
      <div class="cards">
        <div class="card">
          <span class="card-number">1</span>
          <i class="fas fa-water card-icon"></i>
          <h3>Cek saluran air sebelum hujan</h3>
          <p>Selalu <strong>cek dan bersihkan</strong> saluran air sebelum musim hujan tiba untuk memastikan <strong>aliran air lancar</strong> dan mengurangi risiko genangan.</p>
        </div>
        <div class="card">
          <span class="card-number">2</span>
          <i class="fas fa-sandbag card-icon"></i>
          <h3>Siapkan karung pasir</h3>
          <p><strong>Siapkan karung pasir</strong> di lokasi yang mudah dijangkau untuk mencegah air masuk ke dalam rumah saat banjir datang.</p>
        </div>
        <div class="card">
          <span class="card-number">3</span>
          <i class="fas fa-box-archive card-icon"></i>
          <h3>Amankan Barang</h3>
          <p>Pindahkan <strong>barang-barang penting</strong> dan elektronik ke tempat yang lebih tinggi. Simpan <strong>dokumen penting</strong> dalam wadah tahan air.</p>
        </div>
        <div class="card">
          <span class="card-number">4</span>
          <i class="fas fa-route card-icon"></i>
          <h3>Siapkan Evakuasi</h3>
          <p>Tentukan <strong>rute evakuasi terdekat</strong> dari rumah Anda. <strong>Koordinasikan dengan keluarga</strong> dan tetangga untuk jalur evakuasi.</p>
        </div>
      </div>
    </section>

    <aside class="sidebar">
      <div class="side-box">
        <div>
          <h3><i class="fas fa-suitcase-rolling"></i> Apa yang Harus Dibawa Saat Mengungsi?</h3>
          <ul>
            <li>Identitas diri (KTP, KK)</li>
            <li>Uang tunai & kartu penting</li>
            <li>Obat pribadi</li>
            <li>Makanan ringan tahan lama</li>
            <li>Charger & powerbank</li>
            <li>Pakaian ganti</li>
          </ul>
          <h3><i class="fas fa-exclamation-triangle"></i> Jangan Lakukan Ini Saat Banjir!</h3>
          <ul>
            <li>Menyentuh kabel listrik yang basah</li>
            <li>Mengendarai di area deras</li>
            <li>Membuang sampah sembarangan ke saluran air</li>
            <li>Membiarkan hewan peliharaan tanpa perlindungan</li>
          </ul>
          <h3><i class="fas fa-lightbulb"></i> Tips Tambahan Agar Tetap Aman Saat Banjir!</h3>
          <ul>
            <li>Jangan menyentuh peralatan listrik saat banjir</li>
            <li>Hindari berjalan di genangan air jika tidak mengetahui kedalamannya</li>
            <li>Pantau informasi cuaca dan peringatan dari pihak berwenang</li>
          </ul>
        </div>
      </div>
    </aside>
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
