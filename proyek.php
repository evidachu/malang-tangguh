<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Anti Banjir</title>
    <link rel="stylesheet" href="proyek.css">
    <link rel="stylesheet" href="header-footer.css">
</head>
<body>
  <?php include 'header.php'; ?>
    <main>
        <h2 class="title">Proyek Anti Banjir Kota Malang</h2>
        <div class="project-list">
            <div class="card">
                <div class="thumb"></div>
                <div class="info">
                    <h3>Perbaikan Jembatan Soekarno–Hatta</h3>
                    <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi.</p>
                    <div class="card-footer">
                        <button class="status">Sedang Berlangsung</button>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="thumb"></div>
                <div class="info">
                    <h3>Perbaikan Jembatan Soekarno–Hatta</h3>
                    <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi.</p>          
                    <div class="card-footer">
                        <button class="status">Sedang Berlangsung</button>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="thumb"></div>
                <div class="info">
                    <h3>Perbaikan Jembatan Soekarno–Hatta</h3>
                    <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi.</p>         
                    <div class="card-footer">
                        <button class="status">Sedang Berlangsung</button>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="footer-include"></div>

    <div class="modal" id="articleModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <article class="article-container">
                <div class="article-header">
                    <h1>Perbaikan Jembatan Soekarno-Hatta</h1>
                    <p class="location">📍Jl. Soekarno-Hatta, Lowokwaru</p>
                    <div class="meta">
                        <span class="date">Diperbarui: 3 Juni 2025</span>
                        <span class="status">Sedang Berlangsung</span>
                    </div>
                </div>
                
                <div class="article-content">
                    <h2>Deskripsi Proyek</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                    
                    <h2>Timeline Proyek</h2>
                    <ul class="timeline">
                        <li><strong>Januari 2025:</strong> Mulai perencanaan dan survei lokasi</li>
                        <li><strong>Maret 2025:</strong> Dimulainya konstruksi tahap pertama</li>
                        <li><strong>Juni 2025:</strong> Proses konstruksi mencapai 50%</li>
                    </ul>

                    <h2>Dampak dan Manfaat</h2>
                    <p>Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.</p>
                </div>
            </article>
        </div>
    </div>

    <script>
        fetch('header.php')
            .then(res => res.text())
            .then(data => document.getElementById('header-include').innerHTML = data);

        fetch('footer.html')
            .then(res => res.text())
            .then(data => document.getElementById('footer-include').innerHTML = data);

        const modal = document.getElementById('articleModal');
        const closeBtn = document.querySelector('.close');
        const readMoreLinks = document.querySelectorAll('.read-more');

        readMoreLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                modal.style.display = 'block';
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
