<?php

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
            <h1>Jadwal Penjemputan di Bank Sampah Unit</h1>
            <p class="subtitle">Lihat jadwal untuk penjemputan sampah di lokasi Anda.</p>
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
                        <label for="pickupDateStart">Mulai Tanggal</label>
                        <input type="date" id="pickupDateStart" class="form-control" readonly />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pickupDateEnd">Sampai Tanggal</label>
                        <input type="date" id="pickupDateEnd" class="form-control" readonly />
                    </div>
                </div>

                <div class="jadwal-mingguan-grid" id="jadwal-mingguan">

                </div>

            </div>
        </div>
        <div class="app-footer">© 2025 RESIK</div>
    </div>

    <script>
        // Set tanggal minggu ini (Senin - Minggu) otomatis saat load
        window.onload = function () {
            const today = new Date();
            const day = today.getDay(); // Minggu = 0, Senin = 1, dst
            const monday = new Date(today);
            monday.setDate(today.getDate() - ((day + 6) % 7)); // Mundur ke Senin
            const sunday = new Date(monday);
            sunday.setDate(monday.getDate() + 6);

            document.getElementById('pickupDateStart').value = monday.toISOString().slice(0, 10);
            document.getElementById('pickupDateEnd').value = sunday.toISOString().slice(0, 10);
            updateJadwal();
        };

        function updateJadwal() {
            const armada = document.getElementById('armadaType').value;
            const jadwal = document.getElementById('jadwal-mingguan');
            jadwal.innerHTML = armada === 'besar' ? jadwalBesar() : jadwalKecil();
        }

        // Contoh data dummy, sesuaikan kelurahan jika perlu
        const kelurahanKecil = [
            ["Gunung Anyar", "Rungkut", "Mojoklanggru", "Medokan Ayu"],
            ["Kalirungkut", "Wonorejo", "Penjaringan", "Rungkut Tengah"],
            ["Kedung Baruk", "Panjen", "Margorejo", "Kebraon"],
            ["Babatan", "Lakarsantri", "Wiyung", "Lidah Wetan"],
            ["Manukan", "Pakis", "Simomulyo", "Dukuh Pakis"],
            ["Ketintang", "Darmo", "Ngagel", "Sawunggaling"],
        ];
        const kelurahanBesar = [
            ["Gunung Anyar", "Rungkut"],
            ["Kalirungkut", "Penjaringan"],
            ["Kedung Baruk", "Kebraon"],
            ["Babatan", "Lidah Wetan"],
            ["Manukan", "Dukuh Pakis"],
            ["Ketintang", "Sawunggaling"],
        ];

        function jadwalKecil() {
            let hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            let jam = ["08.00", "10.00", "13.00", "15.00"];
            let html = "";
            for (let i=0; i<6; i++) {
                html += `<div class="jadwal-hari-card">
                <div class="hari-title">${hari[i]}</div>
                <ul>`;
                for (let j=0; j<4; j++) {
                    html += `<li><i class="fas fa-clock"></i> ${jam[j]}<span class="lokasi">${kelurahanKecil[i][j]}</span></li>`;
                }
                html += `</ul></div>`;
            }
            html += `<div class="jadwal-hari-card libur">
            <div class="hari-title">Minggu</div>
            <div class="libur-text"><i class="fas fa-bed"></i> Libur</div>
            </div>`;
            return html;
        }

        function jadwalBesar() {
            let hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            let jam = ["09.00", "14.00"];
            let html = "";
            for (let i=0; i<6; i++) {
                html += `<div class="jadwal-hari-card">
                <div class="hari-title">${hari[i]}</div>
                <ul>`;
                for (let j=0; j<2; j++) {
                    html += `<li><i class="fas fa-clock"></i> ${jam[j]}<span class="lokasi">${kelurahanBesar[i][j]}</span></li>`;
                }
                html += `</ul></div>`;
            }
            html += `<div class="jadwal-hari-card libur">
            <div class="hari-title">Minggu</div>
            <div class="libur-text"><i class="fas fa-bed"></i> Libur</div>
            </div>`;
            return html;
        }


        // Event listener armada
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('armadaType').addEventListener('change', updateJadwal);
        });
    </script>

</body>

</html>