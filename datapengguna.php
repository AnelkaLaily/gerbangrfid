<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Data Pengguna</title>
</head>
<body>
    <?php include "menu.php"; ?>
    <!-- isi -->
    <div class="container-fluid">
        <h3>Data Pengguna</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center;">No.</th>
                    <th style="width: 200px; text-align: center;">No. Kartu</th>
                    <th style="width: 400px; text-align: center;">Nama</th>
                    <th style="text-align: center;">No. Telp</th>
                    <th style="width: 150px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // koneksi ke database
                    include "koneksi.php";

                    // baca data pengguna
                    $sql = mysqli_query($conn, "Select * from pengguna");
                    $no = 0;
                    while ($data = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['no_kartu']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['no_telp']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['id']; ?>"> Edit </a>
                            |
                            <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus </a>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>

        <!-- tombol tambah data pengguna -->
        <a href="tambah.php"><button class="btn btn-primary">Tambah Data Pengguna</button></a>

    </div>
   
    <?php include "footer.php"; ?>

</body>
</html>