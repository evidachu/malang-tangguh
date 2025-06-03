<?php
session_start();
require_once 'config/database.php';

// Fetch data from database
try {
    global $conn;
    $result = $conn->query("SELECT * FROM laporan_banjir ORDER BY tanggal DESC");
    $laporan = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $laporan[] = $row;
        }
    }
} catch(Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Riwayat Laporan Banjir</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="riwayat.css" rel="stylesheet" />
  <link href="header-footer.css" rel="stylesheet" />
</head>
<body>
  <?php include 'header.php'; ?>
  <main class="laporan-container">
    <h2 class="judul-laporan">Riwayat Laporan Banjir</h2>
    <div class="filter-section">
      <input type="text" id="search-input" class="filter-dropdown" placeholder="Cari..." />
      <select id="kecamatan-select" class="filter-dropdown">
        <option selected disabled>Pilih Kecamatan</option>
        <option>Blimbing</option>
        <option>Kedungkandang</option>
        <option>Klojen</option>
        <option>Lowokwaru</option>
        <option>Sukun</option>
      </select>
      <input type="date" id="date-filter" class="filter-dropdown" />
    </div>
    <div class="table-wrapper">
      <table class="laporan-tabel">
        <thead>
          <tr>
            <th>No.</th>
            <th>Kecamatan</th>
            <th>Jalan</th>
            <th>Tanggal & Waktu</th>
            <th>Tinggi Air (cm)</th>
            <th>Foto</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($laporan as $index => $row): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($row['lokasi']) ?></td>
              <td><?= htmlspecialchars($row['jalan']) ?></td>
              <td><?= date('d/m/Y H:i', strtotime($row['tanggal'])) ?></td>
              <td><?= $row['tinggi_air'] ? htmlspecialchars($row['tinggi_air']) : '-' ?></td>
              <td>
                <?php if (!empty($row['foto'])): ?>
                  <button class="view-image-btn" data-image="<?= htmlspecialchars($row['foto']) ?>">
                    Lihat Foto
                  </button>
                <?php else: ?>
                  <span>-</span>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($row['deskripsi']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
  <div id="footer-include"></div>
  <div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    fetch('header.php')
      .then(res => res.text())
      .then(data => document.getElementById('header-include').innerHTML = data);

    fetch('footer.html')
      .then(res => res.text())
      .then(data => document.getElementById('footer-include').innerHTML = data);

    $(document).ready(function() {
      // Initialize DataTables with custom date filtering
      $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        const selectedDate = $('#date-filter').val();
        if (!selectedDate) return true; // If no date selected, show all rows
        
        const rowDate = new Date(data[3].split(' ')[0].split('/').reverse().join('-'));
        const filterDate = new Date(selectedDate);
        
        return rowDate.toDateString() === filterDate.toDateString();
      });

      const table = $('.laporan-tabel').DataTable({
        searching: true,
        ordering: false,
        paging: true,
        pageLength: 10,
        dom: 't<"bottom"p>',
        language: {
          paginate: {
            next: 'Selanjutnya',
            previous: 'Sebelumnya'
          }
        }
      });

      // Initialize Select2 with sorted options
      $('#kecamatan-select').select2({
        placeholder: "Pilih Kecamatan",
        allowClear: true
      }).val(null).trigger('change');

      // Custom search function
      $('#search-input').on('keyup', function() {
        table.search(this.value).draw();
      });

      // Filter by kecamatan
      $('#kecamatan-select').on('change', function() {
        const selectedKecamatan = $(this).val() || '';
        table.column(1).search(selectedKecamatan).draw();
      });

      // Add date filter handler
      $('#date-filter').on('change', function() {
        table.draw();
      });
    });

    // Image modal functionality
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.modal .close');

    document.querySelectorAll('.view-image-btn').forEach(button => {
      button.addEventListener('click', () => {
        modal.style.display = 'block';
        modalImg.src = button.getAttribute('data-image');
        document.body.style.overflow = 'hidden';
      });
    });

    closeBtn.addEventListener('click', () => {
      modal.style.display = 'none';
      document.body.style.overflow = 'auto';
    });

    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
      }
    });
  </script>
</body>
</html>