<?php
require_once 'config/database.php';
// Letakkan query database di sini
$sql = "SELECT lokasi, jalan, deskripsi, tanggal FROM laporan_banjir ORDER BY tanggal DESC";
$result = $conn->query($sql);

$floodReports = array();
while($row = $result->fetch_assoc()) {
    $floodReports[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Rawan Banjir</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="peta.css">
    <link rel="stylesheet" href="header-footer.css">
    <style>
        #map { 
            height: 500px; 
            width: 100%; 
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 0px; 
            margin-bottom: 20px;
            z-index: 1; 
            position: relative;
            display: block;
        }
        #weather-info { 
            background: #e0f7fa; 
            padding: 10px; 
            border-radius: 5px; 
            margin: 10px; 
            color: #00796b; 
        }
    

        /* Pastikan container peta juga memiliki tinggi */
        .container {
            margin-top: 20px;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            min-height: 600px;
            
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Area Rawan Banjir</h1>
        <div id="map"></div>
        <div class="flood-info">
            <div class="flood-card">
                <h3>Jl. Lorem Ipsum</h3>
                <p>banjir disebabkan sungai meluap</p>
            </div>
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

    <script>
    // Inisialisasi peta harus diletakkan setelah elemen div#map dan setelah Leaflet.js dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([-7.9666, 112.6326], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    });
</script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-7.9666, 112.6326], 13);

        // Buat pane terlebih dahulu
        map.createPane('polygons');
        map.getPane('polygons').style.zIndex = 200;

        map.createPane('markers');
        map.getPane('markers').style.zIndex = 400;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Outline Kota Malang
        fetch('kota-malang.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    pane: 'polygons',
                    style: {
                        color: '#2196F3',
                        weight: 2,
                        opacity: 0.6,
                        fillOpacity: 0.1,
                        fillColor: '#e3f2fd'
                    }
                }).addTo(map);
            })
            .catch(error => {
                console.error('Error loading GeoJSON:', error);
            });

        // Data lokasi banjir dengan informasi lebih detail
        var floodLocations = <?php echo json_encode($floodReports); ?>;

        // Fungsi untuk mendapatkan koordinat dari nama jalan menggunakan Nominatim
        async function getCoordinates(street, city) {
            const query = encodeURIComponent(`${street}, ${city}, Malang, Indonesia`);
            const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json&limit=1`);
            const data = await response.json();
            
            if (data.length > 0) {
                return {
                    lat: parseFloat(data[0].lat),
                    lng: parseFloat(data[0].lon)
                };
            }
            return null;
        }

        // Tampilkan titik-titik banjir
        async function displayFloodPoints() {
            for (const location of floodLocations) {
                const coords = await getCoordinates(location.jalan, location.lokasi);
                if (coords) {
                    const marker = L.circle([coords.lat, coords.lng], {
                        color: '#d32f2f',
                        fillColor: '#ef5350',
                        fillOpacity: 0.6,
                        weight: 2,
                        radius: 300,
                        interactive: true,
                        pane: 'markers'
                    }).addTo(map);

                    // Event listeners
                    marker.on('mouseover', function() {
                        this.setStyle({
                            fillOpacity: 0.8,
                            weight: 3
                        });
                    });

                    marker.on('mouseout', function() {
                        this.setStyle({
                            fillOpacity: 0.6,
                            weight: 2
                        });
                    });

                    // Popup content
                    const popupContent = `
                        <div class="popup-content">
                            <strong>${location.jalan}</strong><br>
                            <span>${location.lokasi}</span><br>
                            <span>Tanggal: ${new Date(location.tanggal).toLocaleDateString('id-ID')}</span><br>
                            ${location.deskripsi}
                        </div>
                    `;

                    marker.bindPopup(popupContent, {
                        offset: L.point(0, -10),
                        closeButton: true,
                        autoPan: true
                    });

                    // Click event
                    marker.on('click', function(e) {
                        L.DomEvent.stopPropagation(e);
                        updateFloodCard(location.jalan, location.deskripsi);
                        this.openPopup();
                    });
                }
            }
        }

        // Panggil fungsi untuk menampilkan titik-titik banjir
        displayFloodPoints();

        // Tambahkan CSS untuk styling popup
        const style = document.createElement('style');
        style.textContent = `
            .popup-content {
                padding: 5px;
            }
            .severity-tinggi {
                color: #d32f2f;
                font-weight: bold;
            }
            .severity-sedang {
                color: #f57c00;
                font-weight: bold;
            }
        `;
        document.head.appendChild(style);

        function updateFloodCard(title, desc) {
            const floodCard = document.querySelector('.flood-card');
            if (floodCard) {
                floodCard.querySelector('h3').textContent = title;
                floodCard.querySelector('p').textContent = desc;
            }
        }
    </script>
</body>
</html>