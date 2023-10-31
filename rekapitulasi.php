<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Rekapitulasi Aktivitas</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <h3>Rekap Aktivitas</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white;">
                    <th style="width: 10px; text-align: center;">No.</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Jam Masuk</th>
                    <th style="text-align: center;">Jam Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";

                    // baca tabel rekap dan relasikan dengan tabel pengguna berdasarkan nomor kartu rfid untuk tanggal hari ini

                    // baca tanggal saat ini
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    // filter rekap berdasarkan tanggal saat ini
                    $sql = mysqli_query($conn, "Select b.nama, a.tanggal, a.jam_masuk, a.jam_keluar from rekap a, pengguna b where a.no_kartu=b.no_kartu and a.tanggal='$tanggal'");

                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['jam_masuk']; ?></td>
                        <td><?php echo $data['jam_keluar']; ?></td>
                    </tr>
                    <?php } ?>      
            </tbody>
        </table>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>