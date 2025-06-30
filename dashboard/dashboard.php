<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Environment - Bank Sampah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

</head>

<body>
    <div class="content">
        <!-- Profile Card di dalam hero-section (atau di wrapper .content) -->
        <div class="profile-card" id="profileCard" style="cursor:pointer;">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="../assets/profile.png" alt="Avatar">
                </div>
                <div class="profile-greeting">Hi, John</div>
                <button class="profile-toggle" id="profileToggle">▾</button>
            </div>
            <div class="profile-menu" id="profileMenu">
                <ul>
                    <li onclick="window.location.href='../tukar_sampah/tukar_sampah.php'"><strong>Balance:</strong> Rp
                        250.000</li>
                    <li><strong>Eco-Points:</strong> 1.250 pt</li>
                    <li class="divider"></li>
                    <li><a href="#settings">Settings</a></li>
                    <!-- Anda bisa tambahkan links lain: Profile, Logout, dsb. -->
                </ul>
            </div>
        </div>



        <div class="hero-section">
            <h2>Selamat Datang di RESIK</h2>
            <p>Ubah sampah Anda menjadi poin dan hadiahkan untuk masa depan yang lebih hijau!</p>
            <a href="#features" class="cta-button">Mulai Sekarang</a>
        </div>

        <div class="features-section" id="features">
            <h3>Layanan Kami</h3>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="feature-card" style="cursor:pointer;"
                        onclick="window.location.href='../tukar_sampah/tukar_sampah.php'">
                        <img src="../assets/tukarsampah.png" alt="Penukaran Sampah">
                        <h4>Penukaran Sampah</h4>
                        <p>Jual sampah Anda dan dapatkan poin untuk ditukarkan dengan hadiah menarik.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="../assets/pickupsampah.png" alt="Pick-Up Sampah"
                            onclick="window.location.href='../pick_up/pick_up.php'">
                        <h4>Pick-Up Sampah</h4>
                        <p>Pesan layanan penjemputan sampah di rumah Anda. Praktis dan mudah!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card" style="cursor:pointer;"
                        onclick="window.location.href='../pricelist/pricelist.php'">
                        <img src="../assets/listsampah.png" alt="Pricelist Sampah">
                        <h4>Klasifikasi Sampah</h4>
                        <p>Cek harga terbaru untuk setiap jenis sampah yang bisa ditukarkan.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card" style="cursor:pointer;"
                        onclick="window.location.href='../jadwal_penjemputan/jadwal.php'">
                        <img src="../assets/schedulesampah.png" alt="Jadwal Penjemputan">
                        <h4>Jadwal Penjemputan</h4>
                        <p>Jadwal layanan penjemputan sampah dengan pilihan waktu yang fleksibel.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="scale-section">
            <div class="row justify-content-center">
                <h3>Our Scale</h3>
                <div class="col-md-3">
                    <div class="scale-card" id="operationalAreaCard">
                        <img src="../assets/lokasi.png" alt="Operational Area">
                        <h4>Area Operasional</h4>
                        <p>Operasi di beberapa area dengan tujuan memperluas layanan ke seluruh Indonesia.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="scale-card">
                        <img src="../assets/mitra.png" alt="Driver Partners">
                        <h4>Driver Partners</h4>
                        <p>Ratusan pengemudi siap melayani penjemputan sampah Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="scale-card" style="cursor: pointer;" onclick="window.location.href='../tukar_poin/tukar_poin.php'">
                        <img src="../assets/kerjasama.png" alt="Merchants">
                        <h4>Tukar Poin</h4>
                        <p>Bergabung dengan berbagai merchant untuk meningkatkan pemberdayaan sampah di masyarakat.</p>
                    </div>
                </div>
            </div>

            <div id="map-container" style="display:none; margin-top: 20px;">
                <div id="map"></div>
            </div>
        </div>

    </div>

    <div class="footer">
        <p>© 2025 Smart Environment - Bank Sampah | <a href="mailto:admin@banksampah.com">Kontak Kami</a></p>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Optional Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('operationalAreaCard').addEventListener('click', function () {
            // Menampilkan peta setelah card Area Operasional ditekan
            document.getElementById('map-container').style.display = 'block';

            // Inisialisasi peta menggunakan Leaflet
            const map = L.map('map').setView([-7.2575, 112.7521], 13); // Starting point for the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            }).addTo(map);

            // Menambahkan marker pertama di koordinat (-7.343769496624397, 112.814162798698)
            const marker1 = L.marker([-7.343769496624397, 112.814162798698]).addTo(map)
                .bindPopup(`
            <div>
                <h5>Bank Sampah Bintang Mangrove</h5>
                <img src="../assets/banksampah/banksampahmangrove.jpg" alt="New Location Image" style="width:200px; height:auto;">
                <p><strong>Jenis Bank Sampah:</strong> Bank Sampah Unit</p>
                <p><strong>Jam Operasional:</strong> 08:00 - 16:00</p>
            </div>
        `);

            // Menambahkan marker kedua di koordinat (-7.324468442822889, 112.77253448427832)
            const marker2 = L.marker([-7.324468442822889, 112.77253448427832]).addTo(map)
                .bindPopup(`
            <div>
                <h5>Bank Sampah Mangrove Cemerlang</h5>
                <img src="../assets/banksampah/banksampahmangrove.jpg" alt="New Location Image" style="width:200px; height:auto;">
                <p><strong>Jenis Bank Sampah:</strong> Bank Sampah Mandiri</p>
                <p><strong>Jam Operasional:</strong> 09:00 - 17:00</p>
            </div>
        `);

            // Menambahkan marker ketiga di koordinat (-7.28106104457232, 112.77065009537928)
            const marker3 = L.marker([-7.28106104457232, 112.77065009537928]).addTo(map)
                .bindPopup(`
            <div>
                <h5>Bank Sampah Manyar Mandiri</h5>
                <img src="../assets/banksampah/banksampahmanyarmandiri.jpg" alt="New Location Image" style="width:200px; height:auto;">
                <p><strong>Jenis Bank Sampah:</strong> Bank Sampah Unit</p>
                <p><strong>Jam Operasional:</strong> 08:00 - 16:00</p>
            </div>
        `);

            // Menambahkan marker keempat di koordinat (-7.3355577590535, 112.80477137229359) untuk Bank Sampah Kencana
            const marker4 = L.marker([-7.3355577590535, 112.80477137229359]).addTo(map)
                .bindPopup(`
            <div>
                <h5>Bank Sampah Kencana</h5>
                <img src="../assets/banksampah/banksampahkencana.jpeg" alt="New Location Image" style="width:200px; height:auto;">
                <p><strong>Jenis Bank Sampah:</strong> Bank Sampah Unit</p>
                <p><strong>Jam Operasional:</strong> 08:00 - 16:00</p>
            </div>
        `);

            const marker5 = L.marker([-7.2769951810759945, 112.76268340413517]).addTo(map)
                .bindPopup(`
            <div>
                <h5>Bank Sampah Induk Manyar</h5>
                <img src="../assets/banksampah/banksampahindukmanyar.jpeg" alt="New Location Image" style="width:200px; height:auto;">
                <p><strong>Jenis Bank Sampah:</strong> Bank Sampah Induk</p>
                <p><strong>Jam Operasional:</strong> 08:00 - 16:00</p>
            </div>
        `);

            // Menyesuaikan ukuran peta setelah muncul
            map.invalidateSize();
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.getElementById('profileCard');
            const toggle = document.getElementById('profileCard');
            const arrow = document.getElementById('profileToggle');

            toggle.addEventListener('click', () => {
                card.classList.toggle('open');
                // Animasi panah berputar
                arrow.style.transform = card.classList.contains('open')
                    ? 'rotate(180deg)' // menunjuk ke atas saat dibuka
                    : 'rotate(0deg)';  // menunjuk ke bawah saat tertutup
            });

            // Optional: klik di luar card menutup dropdown
            document.addEventListener('click', (e) => {
                if (!card.contains(e.target)) {
                    card.classList.remove('open');
                    arrow.style.transform = 'rotate(0deg)';
                }
            });
        });

    </script>


</body>

</html>