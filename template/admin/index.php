<?php
ob_start();
// session_start();
// if (!isset($_SESSION['nama_lengkap'])) {
//     header("location:login.php?access=failed");
// }
// include 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="asset/adm/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="asset/adm/dist/css/adminlte.min.css">
    <script src="asset/adm/plugins/jquery/jquery.min.js"></script>
    <script src="asset/adm/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/adm/dist/js/adminlte.min.js"></script>
    <!-- <script src="asset/adm/dist/js/demo.js"></script> -->

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'inc/navbar.php' ?>
        <!-- /Navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'inc/sidebar.php' ?>
        <!-- /Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_GET['pg'])) {
                    //maka akan mengambil sebuah konten/body dengan parameter pg berjenis php
                    //jika file dengan bereksistensi parameter pg maka akan 
                    //nama file harus sama dengan parameternya
                    if (file_exists('content/' . $_GET['pg'] . '.php')) {
                        include 'content/' . $_GET['pg'] . '.php';
                    }
                } else {
                    include 'content/home.php';
                }
                ?>
            </section>
        </div>


        <!-- Footer -->
        <?php include 'inc/footer.php' ?>
        <!-- /Footer -->

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

</body>

</html>