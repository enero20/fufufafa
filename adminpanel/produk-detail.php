<?php
    require "session.php";
    require "../koneksi.php";

    $id=$_GET['p'];

    $query=mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data= mysqli_fetch_array($query);
    $queryKategori= mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    form div{
        margin-bottom: 10px;
    }
</style>



<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-3">
        <h2>Detail Produk</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama Produk</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori'];?></option>
                        <?php
                            while($dataKategori=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?php echo $dataKategori['id'];?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php       
                            }
                        ?>
                    </select>
                </div>
                
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" value="<?php echo $data['harga']; ?>"name="harga" required>
                </div>
                <div>
                    <label for="currentFoto">Foto Produk</label>
                    <img src="../image/<?php echo $data['foto'] ?>" alt="">

                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
    
            </form>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>