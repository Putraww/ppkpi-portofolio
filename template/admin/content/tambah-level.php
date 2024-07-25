<?php
if (isset($_POST['simpan'])) {
    $nama_level = $_POST['nama_level'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($koneksi, "INSERT INTO level (nama_level, keterangan) VALUES ('$nama_level','$keterangan')");
    header("location:?pg=level&insert-berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $rowEdit = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM level WHERE id ='$id'"));
}

//
if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($koneksi, "UPDATE level SET nama_level = '$nama_level', keterangan = '$keterangan' WHERE id='$id'");
    header("location:?pg=level&update-berhasil");
}
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Level</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Level" name="nama_level">
    </div>
    <div class="mb-3">
        <label for="">Keterangan</label>
        <textarea name="keterangan" id="" class="form-control" placeholder="Masukkan Keterangan"><?php echo isset($_GET['edit']) ? $rowEdit['keterangan'] : '' ?></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Simpan" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
        <a href="?pg=level">Kembali</a>
    </div>
</form>