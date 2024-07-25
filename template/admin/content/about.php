<?php
ob_start();
include "koneksi/koneksi.php";
$querySetting = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id DESC");

if (isset($_POST['simpan'])) {
    $about = $_POST['about'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $ig = $_POST['ig'];
    header('location:about.php&insert-berhasil');

    if (mysqli_num_rows($querySetting) > 0) {
        //updated
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE about 
        SET about='$about'
        ,nama='$nama'
        ,telp='$telp'
        ,email='$email'
        ,ig='$ig'
        ,skil1='$skil1'");
        header("location:about.php&edit-berhasil");
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO about (about, nama, telp, email, ig) 
        VALUES ('$about','$nama', '$telp','$email','$ig')");
        header("location:about.php&insert-berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);
?>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">About

                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <p>Educadion 1</p>
                        <label for="">Lulusan :</label>
                        <input value="<?= $rowSetting['about'] ?>" type="text" class="form-control" name="about" placeholder="Masukkan About" require>
                    </div>
                    <div class="mb-3">
                        <label for="">Instagram :</label>
                        <input value="<?= $rowSetting['ig'] ?>" type="text" class="form-control" name="ig" placeholder="Masukkan Instagram" require>
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

    </div>
</form>