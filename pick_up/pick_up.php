<?php
// schedule.php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Penjemputan Sampah | RESIK</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" />
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="card-illustration text-center my-4">
        <img src="../assets/sampah_pickup.png" alt="Tempat Sampah" class="icon-trash mr-3" width="100" />
        <img src="../assets/pickupsampah.png" alt="Truk Sampah" class="icon-truck" width="100" />
    </div>

    <div class="app-window mx-auto" style="max-width:600px;">
        <div class="app-header d-flex align-items-center px-3 py-2 bg-success text-white">
            <i class="fas fa-home mr-3" style="font-size: 24px; cursor: pointer;"
                onclick="window.location.href='../dashboard/dashboard.php'"></i>
            <h4 class="mb-0">RESIK</h4>
        </div>

        <div class="app-body p-4 bg-white">
            <h2>Jadwal Penjemputan Sampah</h2>
            <p class="subtitle text-muted">Atur jadwal untuk penjemputan sampah di lokasi Anda.</p>

            <div class="card-schedule p-3 border rounded">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="armadaType">Jenis Armada</label>
                        <select id="armadaType" class="custom-select">
                            <option value="besar">Armada Besar (Mobil Pick-Up)</option>
                            <option value="kecil">Armada Kecil (Motor Tosa)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pickupDate">Tanggal</label>
                        <input type="date" id="pickupDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pickupTime">Jam</label>
                        <input type="time" id="pickupTime" class="form-control" value="08:00" />
                    </div>
                </div>

                <!-- Pilihan lokasi -->
                <div class="form-group">
                    <label>Pilih Lokasi Penjemputan:</label>
                    <div class="mb-2">
                        <input type="radio" id="modeAlamat" name="lokasiMode" value="alamat" checked>
                        <label for="modeAlamat" class="mr-3">Masukkan Alamat</label>

                        <input type="radio" id="modePeta" name="lokasiMode" value="peta">
                        <label for="modePeta">Pilih di Peta</label>
                    </div>

                    <!-- Alamat manual -->
                    <input type="text" class="form-control mb-2" id="alamatManual"
                        placeholder="Masukkan alamat lengkap..." />

                    <!-- Map Section -->
                    <div id="mapSection" style="display:none;">
                        <div id="map" style="width:100%; height:250px; border-radius:6px;"></div>
                        <div class="address-display mt-2 d-flex align-items-center">
                            <span id="addressText" class="mr-2">Pilih lokasi di peta</span>
                            <button id="changeLocation" class="btn btn-sm btn-outline-secondary">Center</button>
                        </div>
                        <button id="confirmMapLocation" class="btn btn-success btn-sm mt-2">Konfirmasi Lokasi</button>
                    </div>
                </div>

                <!-- Pembayaran -->
                <div class="form-group">
                    <label>Pembayaran</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="cod" value="cod" checked />
                            <label class="form-check-label" for="cod">COD</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="online" value="online" />
                            <label class="form-check-label" for="online">Online Payment</label>
                        </div>
                    </div>
                </div>

                <div class="total-display mb-3">
                    <strong>Total:</strong> <span id="totalCost">Rp25.000</span>
                </div>

                <button id="btnConfirm" class="btn btn-success btn-block">Konfirmasi Penjemputan</button>
            </div>
        </div>

        <div class="app-footer text-center py-2 text-white bg-success">
            © 2025 RESIK
        </div>
    </div>

    <!-- Dependencies -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Mode alamat vs peta
        $('#modeAlamat').on('change', function () {
            $('#alamatManual').prop('disabled', false);
            $('#mapSection').hide();
        });
        $('#modePeta').on('change', function () {
            $('#alamatManual').prop('disabled', true);
            $('#mapSection').show();
            setTimeout(() => map.invalidateSize(), 200);
        });

        // Leaflet map init
        const startCoords = [-7.2575, 112.7521];
        const map = L.map('map').setView(startCoords, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Draggable marker
        let marker = L.marker(startCoords, { draggable: true }).addTo(map);
        function updateAddress(lat, lng) {
            $('#addressText').text(`Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`);
        }
        updateAddress(startCoords[0], startCoords[1]);

        marker.on('moveend', e => {
            let { lat, lng } = e.target.getLatLng();
            updateAddress(lat, lng);
        });
        map.on('click', e => {
            marker.setLatLng(e.latlng);
            updateAddress(e.latlng.lat, e.latlng.lng);
        });
        $('#changeLocation').click(() => {
            map.invalidateSize();
            map.setView(marker.getLatLng(), 13);
        });
        $('#confirmMapLocation').click(() => {
            let { lat, lng } = marker.getLatLng();
            $('#alamatManual').val(`Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`);
        });

        // Update biaya berdasarkan armada
        $('#armadaType').on('change', function () {
            let cost = this.value === 'besar' ? 200000 : 100000;
            $('#totalCost').text(`Rp${cost.toLocaleString('id-ID')}`);
        });

        // Konfirmasi penjemputan
        $('#btnConfirm').on('click', function () {
            let paymentMode = $('input[name="payment"]:checked').val();

            if (paymentMode === 'online') {
                // Generate QR random (contoh string acak)
                let qrValue = `https://example.com/pay/${Math.random().toString(36).substr(2, 8)}`;
                let qrUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrValue)}&size=200x200`;

                Swal.fire({
                    title: 'WAITING FOR PAYMENT',
                    text: 'Scan QR di atas untuk melakukan pembayaran:',
                    imageUrl: qrUrl,
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'QR Code Pembayaran',
                    confirmButtonText: 'Cek Transaksi',
                    showCancelButton: true,
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Terima kasih!', 'Pembayaran Anda sudah diterima.', 'success');
                    }
                });
            } else {
                // COD atau lainnya
                Swal.fire('Berhasil!', 'Layanan berhasil diterima', 'success');
            }
        });
    </script>
</body>

</html>