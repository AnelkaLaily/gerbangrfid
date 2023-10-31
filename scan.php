<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>

    <title>Scan Kartu</title>

    <!-- scanning membaca kartu rfid -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cek_kartu").load('bacakartu.php')
            }, 1000);
        })
    </script>
</head>
<body>
    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <div id="cek_kartu">

        </div>
    </div>

    <br>
    <?php include "footer.php"; ?>
</body>
</html>