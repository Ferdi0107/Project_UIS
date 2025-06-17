<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Environment - Bank Sampah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content">
        <!-- Hero Section -->
        <div class="hero-section">
            <h1>Selamat Datang di RESIK</h1>
            <p>Ubah sampah Anda menjadi poin dan hadiahkan untuk masa depan yang lebih hijau!</p>
            <a href="#features" class="cta-button">Mulai Sekarang</a>
        </div>

        <!-- Features Section -->
        <div class="features-section" id="features">
            <h3>Layanan Kami</h3>
            <div class="row justify-content-center">
                <!-- Feature 1: Penukaran Sampah -->
                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="../assets/tukarsampah.png" alt="Penukaran Sampah">
                        <h4>Penukaran Sampah</h4>
                        <p>Jual sampah Anda dan dapatkan poin untuk ditukarkan dengan hadiah menarik.</p>
                    </div>
                </div>
                <!-- Feature 2: Pick-Up Sampah -->
                <div class="col-md-3">
                    <div class="feature-card" style="cursor:pointer;" onclick="window.location.href='../pick_up/pick_up.php'">
                        <img src="../assets/pickupsampah.png" alt="Pick-Up Sampah">
                        <h4>Pick-Up Sampah</h4>
                        <p>Pesan layanan penjemputan sampah di rumah Anda. Praktis dan mudah!</p>
                    </div>
                </div>
                <!-- Feature 3: Pricelist Sampah -->
                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="../assets/listsampah.png" alt="Pricelist Sampah">
                        <h4>Pencatatan Sampah</h4>
                        <p>Cek harga terbaru untuk setiap jenis sampah yang bisa ditukarkan.</p>
                    </div>
                </div>
                <!-- Feature 4: Jadwal Penjemputan -->
                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="../assets/schedulesampah.png" alt="Jadwal Penjemputan">
                        <h4>Jadwal Penjemputan</h4>
                        <p>Jadwal layanan penjemputan sampah dengan pilihan waktu yang fleksibel.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scale Section -->
        <div class="scale-section">
            <div class="row justify-content-center">
                <h3>Our Scale</h3>
                <!-- Scale 1: Operational Area -->
                <div class="col-md-3">
                    <div class="scale-card">
                        <img src="../assets/lokasi.png"
                            alt="Operational Area">
                        <h4>Area Operasional</h4>
                        <p>Operasi di beberapa area dengan tujuan memperluas layanan ke seluruh Indonesia.</p>
                    </div>
                </div>
                <!-- Scale 2: Driver Partners -->
                <div class="col-md-3">
                    <div class="scale-card">
                        <img src="../assets/mitra.png"
                            alt="Driver Partners">
                        <h4>Driver Partners</h4>
                        <p>Ratusan pengemudi siap melayani penjemputan sampah Anda.</p>
                    </div>
                </div>
                <!-- Scale 3: Merchants -->
                <div class="col-md-3">
                    <div class="scale-card">
                        <img src="../assets/kerjasama.png" alt="Merchants">
                        <h4>Merchant Kerja Sama</h4>
                        <p>Bergabung dengan berbagai merchant untuk meningkatkan pemberdayaan sampah di masyarakat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="footer">
        <p>© 2025 Smart Environment - Bank Sampah | <a href="mailto:admin@banksampah.com">Kontak Kami</a></p>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>