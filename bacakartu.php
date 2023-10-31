<?php
    include "koneksi.php";

    // baca tabel status untuk mode aktivitas
    $sql = mysqli_query($conn, "Select * from status");
    $data = mysqli_fetch_array($sql);
    $mode_aktivitas = $data['mode'];

    // uji mode aktivitas
    $mode = "";
    if ($mode_aktivitas==1)
        $mode = "Masuk";
    elseif ($mode_aktivitas==2)
        $mode = "Keluar";

    // baca tabel tmprfid
    $baca_kartu = mysqli_query($conn, "Select * from tmprfid");
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $no_kartu = $data_kartu['no_kartu'];
?>

<div class="container-fluid" style="text-align: center;">
    <?php if ($no_kartu=="") { ?>
        <h3>Aktivitas : <?php echo $mode; ?> </h3>
        <h3>Silahkan Tempelkan Kartu RFID Anda</h3>
        <img src="images/rfid.png" style="width: 200px;">
        <br>
        <img src="images/animasi2.gif">
    <?php } else {
        // cek no kartu rfid tersebut apakah terdaftar di tabel pengguna
        $cari_pengguna = mysqli_query($conn, "Select * from pengguna where no_kartu='$no_kartu'");
        $jumlah_data = mysqli_num_rows($cari_pengguna);

        if ($jumlah_data==0)
            echo "<h1>Maaf! Kartu tidak dikenali</h1>";
        else {
            // ambil nama pengguna
            $data_pengguna = mysqli_fetch_array($cari_pengguna);
            $nama = $data_pengguna['nama'];

            // tanggal dan jam hari ini
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            // cek di tabel rekap, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap aktivitas masuk, tapi kalau sudah ada, maka update data sesuai mode aktivitas
            $cari_rekap = mysqli_query($conn, "Select * from rekap where no_kartu='$no_kartu' and tanggal='$tangga;'");
            // hitung jumlah datanya
            $jumlah_rekap = mysqli_num_rows($cari_rekap);
            if ($jumlah_rekap == 0) {
                echo "<h1>Selamat datang <br> $nama <br> Silahkan Masuk</h1>";
                mysqli_query($conn, "Insert into rekap(no_kartu, tanggal, jam_masuk) values ('$no_kartu', '$tanggal', '$jam')");
            } elseif ($mode_aktivitas == 2) {
                echo "<h1>Selamat jalan <br> $nama <br> Hati-hati di jalan</h1>";
                mysqli_query($conn, "Update rekap set jam_keluar='$jam' where no_kartu='$no_kartu' and tanggal='$tanggal'");
            }
        }

        // kosongkan tabel tmprfid
        mysqli_query($conn, "Delete from tmprfid");

    } ?>
</div>