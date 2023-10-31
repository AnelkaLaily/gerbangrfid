<?php
    include "koneksi.php";

    // baca ID data yang akan dihapus
    $id = $_GET['id'];

    // hapus data
    $hapus = mysqli_query($conn, "Delete from pengguna where id='$id'");

    // jika berhasil terhapus tampilkan pesan terhapus dan kemudian kembali ke data pengguna
    if ($hapus) {
        echo "
                <script>
                    alert('Terhapus');
                    location.replace('datapengguna.php');
                </script>              
            ";
    } else {
        echo "
                <script>
                    alert('Gagal Terhapus');
                    location.replace('datapengguna.php');
                </script>              
            ";
    }
?>