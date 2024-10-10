<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-brands fa-shopify"></i>Kategori
                </li>
            </ol>
        </nav>
        <div class="my-5 col-12 col-md-4">
            <h3>Tambah Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control">
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryDatasama = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahDataKatBaru= mysqli_num_rows($queryDatasama);

                    if($jumlahDataKatBaru > 0){
                        ?>
                        <div class="alert alert-primary mt-2" role="alert" >
                            Data sudah ada.
                        </div>
                        <?php
                    }
                    else {
                        $querySimpankat = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");

                        if($querySimpankat){
                            ?>
                            <div class="alert alert-primary mt-2" role="alert">
                                Data Berhasil Dimasukkan.
                            </div>
                            <meta http-equiv='refresh' content="0; url=kategori.php"/> 
                            <?php

                        }
                        else {
                            echo mysqli_error($con);
                        }
                    }
                }
            ?>
        </div>
        <div class= "mt-3">
            <h2>List Kategori</h2>

            <div class= "table-responsive mt-5">
                <table class= "table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahKategori==0){
                        ?>
                            <tr>
                                <td colspan=3 class="text-center">Tidak ada data kategori</td>
                            </tr>
                        <?php
                            }
                            else{
                                $jumlah=1;
                                while($data=mysqli_fetch_array($queryKategori)){
                        ?>
                                    <tr>
                                        <td><?php echo $jumlah;?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td>
                                            <a href="kategori-detail.php?p=<?php echo $data['id'];?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                $jumlah++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>