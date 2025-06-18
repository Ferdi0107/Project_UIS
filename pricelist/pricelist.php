<?php
$category = isset($_GET['category']) ? $_GET['category'] : ''; // Mengambil kategori yang dipilih dari parameter URL
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasifikasi Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <!-- Card Illustration and Icon -->
    <div class="card-illustration">
        <img src="../assets/sampah_pickup.png" alt="Tempat Sampah" class="icon-trash" />
        <img src="../assets/pickupsampah.png" alt="Truk Sampah" class="icon-truck" />
    </div>

    <div class="app-window">
        <div class="app-header">
            <i class="fas fa-home" style="font-size: 30px; cursor: pointer;"
                onclick="window.location.href='../dashboard/dashboard.php'"></i>
            <h1>RESIK</h1>
        </div>

        <div class="app-body">
            <h1>Daftar Kategori Sampah</h1>
            <p class="subtitle">Pilih kategori sampah untuk melihat harga.</p>
            <div class="card-schedule">
                <!-- Filter Dropdown -->
                <form method="GET" action="pricelist.php">
                    <div class="dropdown d-flex align-items-center" style="width: 500px;">
                        <select name="category" id="category" class="form-control" style="height: 40px; width: 100%;">
                            <option value="">All Categories</option>
                            <option value="kertas" <?php if ($category == 'kertas') echo 'selected'; ?>>Kertas</option>
                            <option value="plastik1" <?php if ($category == 'plastik1') echo 'selected'; ?>>Plastik 1</option>
                            <option value="plastik2" <?php if ($category == 'plastik2') echo 'selected'; ?>>Plastik 2</option>
                            <option value="kaca" <?php if ($category == 'kaca') echo 'selected'; ?>>Kaca</option>
                        </select>
                        <button type="submit" class="btn btn-primary ml-2" style="height: 40px;">Filter</button>
                    </div>
                </form>
            </div>

            <div class="main-container">
                <div class="category">
                    <?php
                    if ($category == 'kertas' || $category == '') {
                        echo '
                    <div class="card-container">
                        <h2>Kategori Kertas</h2>
                        <p></p>
                        <p></p>
                        <div class="card">
                            <img src="..\assets\kardusBagus.png" alt="Kardus Bagus">
                            <h4>Kardus Bagus</h4>
                            <p>Harga: Rp 1.300 / Kg</p>
                        </div>
                        <div class="card">
                            <img src="..\assets\kardusUsang.png" alt="Kardus Jelek">
                            <h4>Kardus Jelek</h4>
                            <p>Harga: Rp 1.200 / Kg</p>
                        </div>
                        <div class="card">
                            <img src="..\assets\koran.png" alt="Koran">
                            <h4>Koran</h4>
                            <p>Harga: Rp 3.500 / Kg</p>
                        </div>
                        <div class="card">
                            <img src="..\assets\hvs.png" alt="HVS">
                            <h4>HVS</h4>
                            <p>Harga: Rp 2.000 / Kg</p>
                        </div>
                        <div class="card">
                            <img src="..\assets\majalah.png" alt="Majalah">
                            <h4>Majalah</h4>
                            <p>Harga: Rp 700 / Kg</p>
                        </div>
                    </div>';
                    }

                    if ($category == 'plastik1' || $category == '') {
                        echo '
                    <div class="card-container">
                        <h2>Kategori Plastik 1</h2>
                        <p></p>
                        <p></p>
                        <!-- Card PET Bening Bersih -->
                        <div class="card">
                            <img src="..\assets\petBeningBersih.png" alt="PET Bening Bersih">
                            <h4>PET Bening Bersih</h4>
                            <p>Harga: Rp 4.200 / Kg</p>
                        </div>
                        <!-- Card PET Biru Muda Bersih -->
                        <div class="card">
                            <img src="..\assets\petBiruMuda.png" alt="PET Biru Muda Bersih">
                            <h4>PET Biru Muda Bersih</h4>
                            <p>Harga: Rp 3.200 / Kg</p>
                        </div>
                        <!-- Card PET Warna Bersih -->
                        <div class="card">
                            <img src="..\assets\petWarnaBersih.png" alt="PET Warna Bersih">
                            <h4>PET Warna Bersih</h4>
                            <p>Harga: Rp 1.200 / Kg</p>
                        </div>
                        <!-- Card PET Kotor -->
                        <div class="card">
                            <img src="..\assets\petKotor.png" alt="PET Kotor">
                            <h4>PET Kotor</h4>
                            <p>Harga: Rp 500 / Kg</p>
                        </div>
                        <!-- Card PET Jelek/Minyak -->
                        <div class="card">
                            <img src="..\assets\petMinyak.png" alt="PET Jelek/Minyak">
                            <h4>PET Jelek/Minyak</h4>
                            <p>Harga: Rp 100 / Kg</p>
                        </div>
                        <!-- Card PET Galon Le Minerale -->
                        <div class="card">
                            <img src="..\assets\petGalon.png" alt="PET Galon Le Minerale">
                            <h4>PET Galon Le Minerale</h4>
                            <p>Harga: Rp 1.500 / Kg</p>
                        </div>
                    </div>';
                    }

                    if ($category == 'plastik2' || $category == '') {
                        echo '
                    <div class="card-container">
                        <h2>Kategori Plastik 2</h2>
                        <p></p>
                        <p></p>
                        <!-- Card Tutup Botol AMDK -->
                        <div class="card">
                            <img src="..\assets\tutupBotolAMDK.png" alt="Tutup Botol AMDK">
                            <h4>Tutup Botol AMDK</h4>
                            <p>Harga: Rp 2.500 / Kg</p>
                        </div>
                        <!-- Card Tutup Galon -->
                        <div class="card">
                            <img src="..\assets\tutupGalon.png" alt="Tutup Galon">
                            <h4>Tutup Galon</h4>
                            <p>Harga: Rp 3.500 / Kg</p>
                        </div>
                        <!-- Card Tutup Campur -->
                        <div class="card">
                            <img src="..\assets\tutupCampur.png" alt="Tutup Campur">
                            <h4>Tutup Campur</h4>
                            <p>Harga: Rp 1.000 / Kg</p>
                        </div>
                    </div>';
                    }

                    if ($category == 'kaca' || $category == '') {
                        echo '
                    <div class="card-container">
                        <h2>Kategori Kaca</h2>
                        <p></p>
                        <p></p>
                        <!-- Card Botol Bensin Besar -->
                        <div class="card">
                            <img src="..\assets\botolBensin.png" alt="Botol Bensin Besar">
                            <h4>Botol Bensin Besar</h4>
                            <p>Harga: Rp 800 / Biji</p>
                        </div>
                        <!-- Card Botol Bir Bintang Besar -->
                        <div class="card">
                            <img src="..\assets\botolBir.png" alt="Botol Bir Bintang Besar">
                            <h4>Botol Bir Bintang Besar</h4>
                            <p>Harga: Rp 500 / Biji</p>
                        </div>
                        <!-- Card Botol Kecap/Saos Besar -->
                        <div class="card">
                            <img src="..\assets\botolKecapSaos.png" alt="Botol Kecap/Saos Besar">
                            <h4>Botol Kecap/Saos Besar</h4>
                            <p>Harga: Rp 300 / Biji</p>
                        </div>
                        <!-- Card Botol/Beling Bening -->
                        <div class="card">
                            <img src="..\assets\botolBensin.png" alt="Botol/Beling Bening">
                            <h4>Botol/Beling Bening</h4>
                            <p>Harga: Rp 100 / Kg</p>
                        </div>
                    </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="app-footer">© 2025 RESIK</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>