<?php
include "koneksi/koneksi.php";
$querySetting = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");

if (isset($_POST['simpan'])) {
    $email_website = $_POST['email_website'];
    $tlp_website = $_POST['tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $facebook_link = $_POST['fb'];
    $instagram_link = $_POST['ig'];
    $twiter_link = $_POST['twiter'];
    $linked_link = $_POST['linkedin'];
    header("location:?pg=setting&insert-berhasil");

    if (mysqli_num_rows($querySetting) > 0) {
        //updated
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE setting 
        SET email_website='$email_website'
        ,tlp_website='$tlp_website'
        ,alamat_website='$alamat_website',
        fb='$facebook_link',
        ig='$instagram_link',
        twiter='$twiter_link',
        linkedin='$linked_link'");
        header("location:?pg=setting");
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, tlp_website, alamat_website, fb, ig, twiter, linkedin) 
        VALUES ('$email_website', '$tlp_website', '$alamat_website', '$facebook_link', '$instagram_link', '$twiter_link', '$linked_link')");
        header("location:?pg=setting&insert-berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Email Website : </label>
        <input value="<?= $rowSetting['email_website'] ?>" type="text" class="form-control" name="email_website" placeholder="Masukkan Email" require>
    </div>
    <div class="mb-3">
        <label for="">Telepon Email : </label>
        <input value="<?= $rowSetting['tlp_website'] ?>" type="text" class="form-control" name="tlp_website" placeholder="Masukkan Telepon Email" require>
    </div>
    <div class="mb-3">
        <label for="">Alamat : </label>
        <textarea name="alamat_website" id="" class="form-control" placeholder="Masukkan Alamat" require><?= $rowSetting['alamat_website'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="">Facebook Link :</label>
        <input value="<?= $rowSetting['fb'] ?>" type="url" class="form-control" name="fb" placeholder="Facebook Link" require>
    </div>
    <div class="mb-3">
        <label for="">Instagram : </label>
        <input value="<?= $rowSetting['ig'] ?>" type="text" class="form-control" name="ig" placeholder="Username Instagram" require>
    </div>
    <div class="mb-3">
        <label for="">Twiter Link :</label>
        <input value="<?= $rowSetting['twiter'] ?>" type="url" class="form-control" name="twiter" placeholder="Masukkan Twiter" require>
    </div>
    <div class="mb-3">
        <label for="">Linkedin : </label>
        <input value="<?= $rowSetting['linkedin'] ?>" type="text" class="form-control" name="linkedin" placeholder="Masukkan Linkedin">
    </div>
    <div class="mb-3">
        <label for="">Logo : </label>
        <input type="file" name="logo">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
    </div>
</form>