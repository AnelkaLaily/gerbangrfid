<?php
    include "koneksi.php";
    // baca isi tabel tmprfid
    $sql = mysqli_query($conn, "Select * from tmprfid");
    $data = mysqli_fetch_array($sql);
    // baca nokartu
    $no_kartu = $data['no_kartu'];
?>

<div class="form-group">
    <label>No. Kartu</label>
    <input type="text" name="no_kartu" id="no_kartu" placeholder="Tempelkan Kartu RFID Anda" class="form-control" style="width: 200px" value="<?php echo $no_kartu; ?>">
</div>