<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Merchant Kerja Sama | RESIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>

<body>
    <main class="py-5">
        <div class="card-box mx-auto">
            <div class="container px-4 py-4">
                <!-- Judul Halaman -->
                <i class="fas fa-home" style="font-size: 30px; cursor: pointer;color: #2c6e49;"
                    onclick="window.location.href='../dashboard/dashboard.php'"></i>
                <h1 class="page-title text-success mb-3">Merchant Kerja Sama</h1>

                <!-- Saldo Poins (Tukar Poin) -->
                <div class="info-balance mb-4">
                    <i class="fas fa-seedling"></i>
                    <div class="text">Saldo Poin Anda: <strong>1.250 Poins</strong></div>
                </div>

                <!-- Filter Slider Tukar Poin -->
                <div class="d-flex align-items-center mb-4 flex-wrap">
                    <label for="ecoRange" class="slider-label mb-0 mr-2">Harga Eco-Points</label>
                    <input type="range" id="ecoRange" class="custom-range mr-2" min="0" max="5000" step="250"
                        value="0" />
                    <button class="btn btn-success btn-apply">Terapkan</button>
                </div>

                <!-- Baris Judul + Slider Merchant (jika ingin dipisah) -->
                <hr />

                <div class="d-flex align-items-center mb-4 flex-wrap">
                    <h1 class="mr-auto text-success mb-0">Voucher Merchant</h1>
                    <label for="discountRange" class="slider-label mb-0 ml-3 mr-2">Diskon Min (Rp)</label>
                    <input type="range" id="discountRange" class="custom-range mr-2" min="0" max="200000" step="5000"
                        value="0" />
                    <button class="btn btn-success btn-apply">Terapkan</button>
                </div>

                <!-- Voucher Cards -->
                <div class="row">
                    <!-- Voucher 1 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 card-voucher">
                            <div class="card-header bg-danger text-white d-flex align-items-center">
                                <i class="fas fa-plug mr-2"></i>VCHR-RS10
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Graha Elektronik</h5>
                                <p class="mb-1">Diskon 10% hingga Rp50.000</p>
                                <small class="text-muted">Berlaku: 01/06/2024 – 30/06/2024</small>
                                <a href="#" class="btn btn-success btn-block mt-auto">
                                    Dapatkan Voucher
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Voucher 2 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 card-voucher">
                            <div class="card-header bg-primary text-white d-flex align-items-center">
                                <i class="fas fa-store mr-2"></i>VCHR-RS15
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Ravi Store</h5>
                                <p class="mb-1">Diskon 15% hingga Rp75.000</p>
                                <small class="text-muted">Berlaku: 05/06/2024 – 05/07/2024</small>
                                <a href="#" class="btn btn-success btn-block mt-auto">
                                    Dapatkan Voucher
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Voucher 3 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 card-voucher">
                            <div class="card-header bg-warning text-white d-flex align-items-center">
                                <i class="fas fa-shopping-cart mr-2"></i>VCHR-RS05
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Sentosa Swalayan</h5>
                                <p class="mb-1">Diskon 5% hingga Rp25.000</p>
                                <small class="text-muted">Berlaku: 10/06/2024 – 30/06/2024</small>
                                <!-- Tombol baru untuk memicu modal -->
                                <button type="button" class="btn btn-success btn-block mt-auto btn-voucher"
                                    data-code="VCHR-RS05">
                                    Dapatkan Voucher
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Voucher 4 -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 card-voucher">
                            <div class="card-header bg-success text-white d-flex align-items-center">
                                <i class="fas fa-tshirt mr-2"></i>VCHR-RS20
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Baju Lestari</h5>
                                <p class="mb-1">Diskon 20% hingga Rp100.000</p>
                                <small class="text-muted">Berlaku: 01/07/2024 – 31/07/2024</small>
                                <a href="#" class="btn btn-success btn-block mt-auto">
                                    Dapatkan Voucher
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partner Merchant List -->
                <h4 class="mt-5 mb-3">Partner Merchant</h4>

                <div class="partner-card mb-3">
                    <div class="partner-icon text-success">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="partner-details ml-3">
                        <h6 class="mb-1">Toko Kelontong Hijau</h6>
                        <small>
                            Toko Kelontong Hijau, menjual kebutuhan ramah lingkungan
                        </small>
                    </div>
                    <div class="partner-since ml-auto">Sejak 2023</div>
                </div>

                <div class="partner-card mb-3">
                    <div class="partner-icon text-success">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <div class="partner-details ml-3">
                        <h6 class="mb-1">Supermart</h6>
                        <small>Supermart, swalayan besar dengan harga murah</small>
                    </div>
                    <div class="partner-since ml-auto">Sejak 2022</div>
                </div>

                <div class="partner-card mb-3">
                    <div class="partner-icon text-success">
                        <i class="fas fa-chair"></i>
                    </div>
                    <div class="partner-details ml-3">
                        <h6 class="mb-1">Mebel Sentoso</h6>
                        <small>Mebel Sentoso, menjual mebel dan perabot rumah tangga</small>
                    </div>
                    <div class="partner-since ml-auto">Sejak 2021</div>
                </div>

            </div>
        </div>
    </main>

    <!-- Optional JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('myRange');
            const tooltip = document.getElementById('tooltip');

            function updateTooltip() {
                // Ambil nilai slider
                const val = slider.value;
                tooltip.textContent = val;

                // Hitung persentase: (value - min) / (max - min)
                const min = +slider.min;
                const max = +slider.max;
                const pct = (val - min) / (max - min);

                // Lebar slider (padding/margin diabaikan)
                const sliderWidth = slider.offsetWidth;
                // Lebar thumb (harus sama dengan di CSS)
                const thumbWidth = 24;
                // Hitung posisi X (dihitung dari kiri slider)
                const offsetX = pct * (sliderWidth - thumbWidth) + thumbWidth / 2;

                // Atur posisi tooltip
                tooltip.style.left = `${offsetX}px`;
            }

            // Update saat halaman siap
            updateTooltip();

            // Update setiap slider digeser (input event)
            slider.addEventListener('input', updateTooltip);

            // Optional: update saat window di-resize
            window.addEventListener('resize', updateTooltip);
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Pilih semua tombol "Dapatkan Voucher"
            document.querySelectorAll('.btn-voucher').forEach(btn => {
                btn.addEventListener('click', () => {
                    const code = btn.getAttribute('data-code');

                    Swal.fire({
                        title: `Ambil Voucher ${code}?`,
                        text: "Pastikan poin Anda mencukupi sebelum konfirmasi.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, ambil',
                        cancelButtonText: 'Batal',
                        reverseButtons: false
                    }).then(result => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Berhasil!',
                                `Voucher ${code} telah ditambahkan ke akun Anda.`,
                                'success'
                            );
                            // TODO: Tambahkan AJAX atau logic penukaran poin di sini
                        }
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>