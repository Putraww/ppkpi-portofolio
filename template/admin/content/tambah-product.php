<?php
if (isset($_POST['simpan'])) {
    //$_files meruoakan inputan tipe data file
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];

    $ekstensi = array('png', 'jpg', 'jpeg');
    // path info untuk mengampil ekstensi dari file foto
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    //
    //in array syntax perbandingan
    if (!in_array($ext, $ekstensi)) {
        echo "Mohon maaf ekstensi tidak terdaftar";
        die;
    } else {
        //berguna untuk memindahkan file setelah di upload
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $foto);

        $insert = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga, foto) VALUES ('$nama_barang','$harga','$foto')");
        if (!$insert) {
            header("location:?pg=tambah-product&insert-gagal");
        }
        header("location:?pg=product&insert-berhasil");
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $rowEdit = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM barang WHERE id ='$id'"));
}

//
if (isset($_POST['edit'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];

    $ekstensi = array('png', 'jpg', 'jpeg');
    $ext = pathinfo($foto, PATHINFO_EXTENSION);

    $id = $_GET['edit'];

    //jika didalam array ext nilai nya ada dengan ekstensi, maka ekstensi ada move upload
    if (!in_array($ext, $ekstensi)) {
        echo "Mohon maaf ekstensi tidak terdaftar";
        die;
    } else {
        unlink("upload/" . $rowEdit['foto']);
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $foto);

        $update = mysqli_query($koneksi, "UPDATE barang SET nama_barang = '$nama_barang', harga = '$harga', foto = '$foto' WHERE id='$id'");
        header("location:?pg=product&update-berhasil");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Nama Product</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_barang'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Nama Product" name="nama_barang" required>
    </div>
    <div class="mb-3">
        <label for="">Harga</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['harga'] : '' ?>" type="number" class="form-control" placeholder="Masukkan Harga Product" name="harga" required>
    </div>
    <div class="mb-3">
        <label for="">Foto</label>
        <input value="" type="file" class="form-control" name="foto" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Simpan" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
    </div>
</form>