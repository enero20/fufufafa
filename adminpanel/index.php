<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content = "IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>
<style>
    .kotak {
        border: solid;
    }
    .summary-kategori{
        background-color: #0c583a;
        border-radius: 10px;
    }
    .summary-produk{
        background-color: #a9b30d;
        border-radius: 10px;

    }
    .no-decoration{
        text-decoration: none;
    }
    .no-decoration:hover{
        color: #0f25da !important;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i>Home
                </li>
            </ol>
        </nav>
        <h2>hallo <?php echo $_SESSION['username']; ?></h2>
        <div class="container mt-6">
            <div class='row'>
                <div class='col-lg-4 col-md-8 col-12 mb-3'>
                    <div class="summary-kategori p-7">
                        <div class='row'>
                            <div class= 'col-6'>
                                <i class="fa-solid fa-list fa-7x text-black-25"></i>
                            </div>
                            <div class='col-6 text-white'>
                                <h3>Kategori</h3>
                                <p><?php echo $jumlahKategori;?> Kategori</p>
                                <p><a href="kategori.php" class= "text-white no-decoration">Lihat Detail Kategori</a></p>
                            </div>
                        </div>
                </div>
                </div>

                <div class='col-lg-4 col-md-8 col-12 mb-3'>
                    <div class=" summary-produk p-7">
                        <div class='row'>
                            <div class= 'col-6'>
                                <i class="fa-brands fa-shopify fa-7x text-black-25"></i>
                            </div>
                            <div class='col-6 text-white'>
                                <h3>Produk</h3>
                                <p><?php echo $jumlahProduk; ?> Produk Tersedia</p>
                                <p><a href="produk.php" class= "text-white no-decoration">Lihat Detail Produk</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>