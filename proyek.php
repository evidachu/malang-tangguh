<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Proyek Anti Banjir</title>
<link rel="stylesheet" href="proyek.css" />
<link rel="stylesheet" href="header-footer.css" />
<style>
  /* Tambahan sederhana untuk modal scroll dan layout */
  .modal-content {
    max-height: 80vh;
    overflow-y: auto;
  }
.thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

</style>
</head>
<body>
<?php include 'header.php'; ?>
<main>
  <h2 class="title">Proyek Anti Banjir Kota Malang</h2>
  <div class="project-list">

    <div class="card">
      <div class="thumb">
     <img src="asset/1. suhat.jpg" alt=""/>
      </div>
      <div class="info">
        <h3>Perbaikan Jembatan Soekarno–Hatta</h3>
        <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
        <p>Proyek ini bertujuan untuk meningkatkan kapasitas saluran drainase di kawasan Jalan Soekarno-Hatta guna mengurangi genangan air saat hujan deras.</p>
        <div class="card-footer">
          <button class="status">Sedang Berlangsung</button>
          <a href="#" class="read-more" data-project="1">Baca Selengkapnya →</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="thumb">
        <img src="asset/2. tunggulwulung.jpeg" alt=""/>
      </div>
      <div class="info">
        <h3>Perbaikan Drainase Jalan Soekarno-Hatta (Suhat)</h3>
        <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
        <p>Proyek ini fokus meningkatkan kapasitas drainase agar genangan air berkurang dan arus lalu lintas lancar.</p>
        <div class="card-footer">
          <button class="status">Sedang Berlangsung</button>
          <a href="#" class="read-more" data-project="2">Baca Selengkapnya →</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="thumb">
        <img src="asset/3. .webp" alt=""/>
      </div>
      <div class="info">
        <h3>Normalisasi Drainase Kawasan Tunggulwulung</h3>
        <p class="location">📍Kawasan Tunggulwulung</p>
        <p>Normalisasi saluran drainase untuk mengatasi genangan air akibat hujan deras di kawasan Tunggulwulung.</p>
        <div class="card-footer">
          <button class="status">Selesai</button>
          <a href="#" class="read-more" data-project="3">Baca Selengkapnya →</a>
        </div>
      </div>
    </div>

  </div>
</main>
<div id="footer-include"></div>

<!-- Modal -->
<div class="modal" id="articleModal" style="display:none;">
  <div class="modal-content">
    <span class="close" style="cursor:pointer; float:right; font-size:24px;">&times;</span>
    <article class="article-container">
      <div class="article-header">
        <h1 id="modalTitle"></h1>
        <p class="location" id="modalLocation"></p>
        <div class="meta">
          <span class="date" id="modalDate"></span>
          <span class="status" id="modalStatus"></span>
        </div>
      </div>
      <div class="article-content" id="modalContent">
        <!-- Content will be injected here -->
      </div>
    </article>
  </div>
</div>

<script>
  // Data proyek
  const projects = {
    1: {
      title: "Perbaikan Jembatan Soekarno-Hatta",
      location: "📍Jl. Soekarno-Hatta, Lowokwaru",
      date: "Diperbarui: 3 Juni 2025",
      status: "Sedang Berlangsung",
      content: `
        <h2>Deskripsi Proyek</h2>
        <p>Proyek ini bertujuan untuk meningkatkan kapasitas saluran drainase di kawasan Jalan Soekarno-Hatta guna mengurangi genangan air saat hujan deras. Pembangunan drainase baru dengan lebar 2,5 meter dan panjang 1.300 meter direncanakan dapat menyelesaikan permasalahan banjir di kawasan tersebut hingga 100%.</p>
        <h2>Timeline Proyek</h2>
        <ul class="timeline">
          <li><strong>Januari 2025:</strong> Mulai perencanaan dan survei lokasi</li>
          <li><strong>Maret 2025:</strong> Dimulainya konstruksi tahap pertama</li>
          <li><strong>Juni 2025:</strong> Proses konstruksi mencapai 50%</li>
        </ul>
        <h2>Dampak dan Manfaat</h2>
        <p>Peningkatan kapasitas drainase di kawasan ini diharapkan dapat mengurangi genangan air, memperlancar arus lalu lintas, dan mengurangi risiko banjir yang sering terjadi di kawasan Soekarno-Hatta.</p>
      `
    },
    2: {
      title: "Perbaikan Drainase Jalan Soekarno-Hatta (Suhat)",
      location: "📍Jl. Soekarno-Hatta, Lowokwaru",
      date: "Diperbarui: 3 Juni 2025",
      status: "Sedang Berlangsung",
      content: `
        <h2>Deskripsi Proyek</h2>
        <p>Proyek ini bertujuan meningkatkan kapasitas saluran drainase di kawasan Jalan Soekarno-Hatta agar genangan air berkurang dan arus lalu lintas lancar.</p>
        <h2>Timeline Proyek</h2>
        <ul class="timeline">
          <li><strong>Januari 2025:</strong> Mulai perencanaan dan survei lokasi</li>
          <li><strong>Maret 2025:</strong> Dimulainya konstruksi tahap pertama</li>
          <li><strong>Juni 2025:</strong> Proses konstruksi mencapai 50%</li>
        </ul>
        <h2>Dampak dan Manfaat</h2>
        <p>Dengan peningkatan kapasitas drainase, diharapkan genangan air dapat diminimalkan sehingga memperlancar arus lalu lintas dan mengurangi risiko banjir di kawasan tersebut.</p>
      `
    },
    3: {
      title: "Normalisasi Drainase Kawasan Tunggulwulung",
      location: "📍Kawasan Tunggulwulung",
      date: "Diperbarui: 17 Maret 2025",
      status: "Selesai",
      content: `
        <h2>Deskripsi Proyek</h2>
        <p>Normalisasi saluran drainase dilakukan untuk memastikan saluran berfungsi optimal dan mampu menampung volume air sehingga genangan air akibat hujan deras dapat dikurangi di kawasan Tunggulwulung.</p>
        <h2>Timeline Proyek</h2>
        <ul class="timeline">
          <li><strong>Maret 2025:</strong> Identifikasi titik genangan dan evaluasi saluran drainase</li>
          <li><strong>Maret 2025:</strong> Pelaksanaan normalisasi saluran drainase</li>
        </ul>
        <h2>Dampak dan Manfaat</h2>
        <p>Normalisasi ini berhasil mengurangi genangan air di kawasan Tunggulwulung, meningkatkan kenyamanan warga, dan memperlancar aktivitas ekonomi di wilayah tersebut.</p>
      `
    }
  };

  const modal = document.getElementById('articleModal');
  const closeBtn = modal.querySelector('.close');
  const modalTitle = document.getElementById('modalTitle');
  const modalLocation = document.getElementById('modalLocation');
  const modalDate = document.getElementById('modalDate');
  const modalStatus = document.getElementById('modalStatus');
  const modalContent = document.getElementById('modalContent');

  // Event buka modal dan isi konten sesuai data proyek
  document.querySelectorAll('.read-more').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const projectId = e.target.getAttribute('data-project');
      const data = projects[projectId];

      if (data) {
        modalTitle.textContent = data.title;
        modalLocation.textContent = data.location;
        modalDate.textContent = data.date;
        modalStatus.textContent = data.status;
        modalContent.innerHTML = data.content;
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
      }
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
