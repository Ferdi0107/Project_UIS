<?php
// schedule.php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Penjemputan Sampah</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" />
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Custom CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
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
            <h1>Jadwal Penjemputan Sampah</h1>
            <p class="subtitle">Atur jadwal untuk penjemputan sampah di lokasi Anda.</p>
            <div class="card-schedule">
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
                        <label for="modeAlamat">Masukkan Alamat</label>
                        <input type="radio" id="modePeta" name="lokasiMode" value="peta">
                        <label for="modePeta">Pilih di Peta</label>
                    </div>
                    <!-- Input alamat manual -->
                    <input type="text" class="form-control mb-2" id="alamatManual"
                        placeholder="Masukkan alamat lengkap...">
                    <!-- Peta hanya muncul jika mode 'peta' -->
                    <div id="mapSection" style="display:none; margin-top:10px;">
                        <div id="map" style="width:100%;height:250px;border-radius:6px;"></div>
                        <div class="address-display mt-2">
                            <span id="addressText">Pilih lokasi di peta</span>
                            <button id="changeLocation" type="button">Center</button>
                        </div>
                        <button id="confirmMapLocation" type="button" class="btn btn-success btn-sm mt-2">Konfirmasi
                            Lokasi</button>
                    </div>
                </div>

                <!-- Pembayaran -->
                <div class="form-group payment-options">
                    <label>Pembayaran</label><br />
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="cod" value="cod" checked />
                        <label class="form-check-label" for="cod">COD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="online" value="online" />
                        <label class="form-check-label" for="online">Online Payment</label>
                    </div>
                </div>
                <div class="total-display">
                    Total: <span id="totalCost">Rp150.000</span>
                </div>
                <button class="btn-confirm">Konfirmasi Penjemputan</button>
            </div>
        </div>
        <div class="app-footer">© 2025 RESIK</div>
    </div>

    <!-- JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // --- MODE ALAMAT / PETA ---
        document.getElementById('modeAlamat').addEventListener('change', function () {
            document.getElementById('alamatManual').disabled = false;
            document.getElementById('mapSection').style.display = 'none';
        });
        document.getElementById('modePeta').addEventListener('change', function () {
            document.getElementById('alamatManual').disabled = true;
            document.getElementById('mapSection').style.display = 'block';
            setTimeout(() => { map.invalidateSize(); }, 100);
        });

        // --- LEAFLET MAP INIT ---
        const surabaya = [-7.2575, 112.7521];
        const map = L.map('map').setView(surabaya, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        }).addTo(map);

        let marker = L.marker(surabaya, { draggable: true }).addTo(map);

        function updateAddress(lat, lng) {
            document.getElementById('addressText').textContent =
                `Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`;
        }
        updateAddress(surabaya[0], surabaya[1]);

        marker.on('moveend', function (e) {
            const { lat, lng } = e.target.getLatLng();
            updateAddress(lat, lng);
        });
        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateAddress(e.latlng.lat, e.latlng.lng);
        });
        document.getElementById('changeLocation').addEventListener('click', function () {
            map.invalidateSize();
            map.setView(marker.getLatLng(), 13);
        });

        // Tombol Konfirmasi Lokasi di Peta
        document.getElementById('confirmMapLocation').addEventListener('click', function () {
            const { lat, lng } = marker.getLatLng();
            document.getElementById('alamatManual').value = `Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`;
            // Opsional: Bisa otomatis switch ke mode alamat manual jika mau (hilangkan komentar di bawah)
            // document.getElementById('modeAlamat').checked = true;
            // document.getElementById('alamatManual').disabled = false;
            // document.getElementById('mapSection').style.display = 'none';
        });

        // Update biaya otomatis
        document.getElementById('armadaType').addEventListener('change', function () {
            let cost = this.value === 'besar' ? 200000 : 100000;
            document.getElementById('totalCost').textContent = `Rp${cost.toLocaleString('id-ID')}`;
        });
    </script>
</body>

</html>