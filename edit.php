<!-- proses penyimpanan -->
<?php
    include "koneksi.php";

    // baca ID yang akan di edit
    $id = $_GET['id'];

    // baca data pengguna berdasarkan id
    $cari = mysqli_query($conn, "Select * from pengguna where id='$id'");
    $hasil = mysqli_fetch_array($cari);

    // jika tombol simpan diklik
    if (isset($_POST['btnSimpan'])) {
        // baca isi inputan form
        $no_kartu = $_POST['no_kartu'];
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];

        // simpan ke tabel pengguna
        $simpan = mysqli_query($conn, "update pengguna set no_kartu='$no_kartu', nama='$nama', no_telp='$no_telp' where id='$id'");

        // jika berhasil tersimpan, tampilkan pesan tersimpan dan kembali ke data karyawan
        if ($simpan) {
            echo "
                <script>
                    alert('Tersimpan');
                    location.replace('datapengguna.php');
                </script>              
            ";
        } else {
            echo "
                <script>
                    alert('Gagal Tersimpan');
                    location.replace('datapengguna.php');
                </script>              
            ";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Edit Data Pengguna</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <!-- isi --->
    <div class="container-fluid">
        <h3>Edit Data Pengguna</h3>
        <!-- form input -->
        <form method="post">
            <div class="form-group">
                <label>No. Kartu</label>
                <input type="text" name="no_kartu" id="no_kartu" placeholder="Nomor Kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['no_kartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Pengguna" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon Pengguna" class="form-control" style="width: 200px" value="<?php echo $hasil['no_telp']; ?>">
            </div>
            <button class="btn btn-primary" name="btnSimpan" id="btn">Simpan</button>
        </form>
    </div>

    <?php include "footer.php" ?>
</body>
</html>