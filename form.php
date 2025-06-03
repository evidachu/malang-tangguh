<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan Kejadian Banjir</title>
  <link rel="stylesheet" href="form.css" />
  <link rel="stylesheet" href="header-footer.css">
</head>
<body>
  <div id="header-include"></div>
  <div class="container">
    <h2>Laporan <strong>Kejadian Banjir</strong></h2>
    <div class="form-box">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-grid">
          <div class="form-group">
            <label for="lokasi">Lokasi Kejadian</label>
            <select id="lokasi" name="lokasi" required>
              <option value="">-- Pilih Lokasi --</option>
              <option value="Klojen">Klojen</option>
              <option value="Lowokwaru">Lowokwaru</option>
              <option value="Sukun">Sukun</option>
              <option value="Kedungkandang">Kedungkandang</option>
              <option value="Blimbing">Blimbing</option>
            </select>
          </div>

          <div class="form-group">
            <label for="jalan">Nama Jalan</label>
            <select id="jalan" name="jalan" required>
              <option value="">-- Pilih Jalan --</option>
            </select>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal & Waktu</label>
            <input type="datetime-local" id="tanggal" name="tanggal" required />
          </div>

          <div class="form-group">
            <label for="tinggi">Tinggi Air (cm) (Opsional)</label>
            <input type="text" id="tinggi" name="tinggi" />
          </div>

          <div class="form-group">
            <label for="foto">Unggah Foto</label>
            <input type="file" id="foto" name="foto" />
          </div>

          <div class="form-group full-width">
            <label for="deskripsi">Deskripsi Kejadian</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
          </div>
        </div>
        <button type="submit" class="submit-btn">Kirim Laporan</button>
      </form>
    </div>
  </div>
  <div id="footer-include"></div>
    <script>
        fetch('header.php')
            .then(res => res.text())
            .then(data => document.getElementById('header-include').innerHTML = data);

        fetch('footer.html')
            .then(res => res.text())
            .then(data => document.getElementById('footer-include').innerHTML = data);
    </script>
    <script src="js/streets.js"></script>
    <script>
        document.getElementById('lokasi').addEventListener('change', function() {
            const kecamatan = this.value;
            const jalanSelect = document.getElementById('jalan');
            jalanSelect.innerHTML = '<option value="">-- Pilih Jalan --</option>';
            
            if (kecamatan && malangStreets[kecamatan]) {
                malangStreets[kecamatan].forEach(jalan => {
                    const option = document.createElement('option');
                    option.value = jalan;
                    option.textContent = jalan;
                    jalanSelect.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>

<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        global $conn;
        
        // Handle file upload
        $foto_path = '';
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
            $upload_dir = 'uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $foto_name = uniqid() . '_' . $_FILES['foto']['name'];
            $foto_path = $upload_dir . $foto_name;
            
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);
        }

        // Prepare and execute SQL query
        $sql = "INSERT INTO laporan_banjir (lokasi, jalan, tanggal, tinggi_air, foto, deskripsi) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Handle optional tinggi value
        $tinggi = !empty($_POST['tinggi']) ? $_POST['tinggi'] : null;
        
        $stmt->bind_param("sssiss", 
            $_POST['lokasi'],
            $_POST['jalan'],
            $_POST['tanggal'],
            $tinggi,
            $foto_path,
            $_POST['deskripsi']
        );
        
        if ($stmt->execute()) {
            header('Location: riwayat.php?status=success');
            exit();
        } else {
            throw new Exception("Error inserting data");
        }
    } catch(Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
