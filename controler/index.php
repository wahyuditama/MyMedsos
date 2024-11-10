<?php
session_start();
// empty() : kosong
if (empty($_SESSION['ID'])) {
    header("location:../login.php?access=failed");
    // cara baca, jika session NAMA kosong maka menuju login.php
}
include '../koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <!-- Start Header/Navigation -->
        <?php
        include '../inc/header.php';
        ?>
        <!-- End Header/Navigation -->

        <div class="content">
            <?php
            if (isset($_GET['pg'])) {
                if (file_exists('../content/' . $_GET['pg'] . '.php')) {

                    include '../content/' . $_GET['pg'] . '.php';
                }
            } else {
                include '../content/dashboard.php';
            }
            ?>
        </div>


    </div>

    <!-- Start Footer -->
    <?php
    include '../inc/footer.php';
    ?>
    <!-- End Footer -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/moment.js"></script>
    <script src="../lib/app.js"></script>

    <script>
        $("#id_peminjaman").change(function() {
            let kode_buku = $(this).find('option:selected').text(); //this bisa diganti menggunakan selector atau id_peminjaman
            let tbody = $('tbody'),
                newRow = "";
            $.ajax({
                url: "../ajax/getPeminjam.php?kode_buku=" + kode_buku,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    $('#no_pinjam').val(res.data.kode_buku);
                    $('#tgl_pinjam').val(res.data.tgl_pinjam);
                    $('#nama_anggota').val(res.data.nama_anggota);
                    $('#tgl_kembali').val(res.data.tgl_kembali);

                    let tanggal_kembali = new moment(res.data.tgl_kembali);

                    let currentDate = new Date().toJSON().slice(0, 10);
                    console.log(currentDate);

                    let tanggal_di_kembalikan = new moment('2024-10-21');
                    let selisih = tanggal_di_kembalikan.diff(tanggal_kembali, "days");

                    if (selisih < 0) {
                        selisih = 0;
                    }

                    let biaya_denda = 1000000;
                    let totalDenda = selisih * biaya_denda;
                    $('#denda').val(totalDenda);

                    $.each(res.detail_peminjaman, function(key, val) {
                        newRow += "<tr>";
                        newRow += "<td>" + val.nama_buku + "</td>";
                        newRow += "</tr>"; // += untuk menambahkan isi variabel
                    });

                    tbody.html(newRow);
                }
            });
        });
    </script>
</body>

</html>