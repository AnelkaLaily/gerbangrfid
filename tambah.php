<!-- proses penyimpanan -->
<?php
    include "koneksi.php";

    // jika tombol simpan diklik
    if (isset($_POST['btnSimpan'])) {
        // baca isi inputan form
        $no_kartu = $_POST['no_kartu'];
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];

        // simpan ke tabel pengguna
        $simpan = mysqli_query($conn, "Insert into pengguna(no_kartu, nama, no_telp) values ('$no_kartu', '$nama', '$no_telp')");

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
    <title>Tambah Data Pengguna</title>

    <!-- pembacaan no kartu otomatis -->
    <script type="text/javascript">
        $(document).ready(function () {
            setInterval(function() {
                $("#norfid").load('nokartu.php')
            }, 0);
        })
    </script>
</head>
<body>
    <?php include "menu.php"; ?>
    <!-- isi --->
    <div class="container-fluid">
        <h3>Tambah Data Pengguna</h3>
        <!-- form input -->
        <form method="post">
            <div id="norfid"></div>
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Pengguna" class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon Pengguna" class="form-control" style="width: 200px">
            </div>
            <button class="btn btn-primary" name="btnSimpan" id="btn">Simpan</button>
        </form>
    </div>

    <?php include "footer.php" ?>
</body>
</html>