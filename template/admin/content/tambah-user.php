<?php
if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $id_level = $_POST['id_level'];


    $insert = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, id_level, email, password) VALUES ('$nama_lengkap','$id_level','$email','$password')");
    if (!$insert) {
        header("location:?pg=tambah-user&pesan=tambah-gagal");
    } else {
        header("location:?pg=user&pesan=tambah-berhasil");
    }
}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $id_level = $_POST['id_level'];

    $id = $_GET['edit'];

    $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap='$nama_lengkap',id_level='$id_level', email='$email', password='$password' WHERE id='$id'");
    header("location:?pg=user&update=berhasi");
}


?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama Lengkap</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Nama Lengkap Anda" name="nama_lengkap">
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" type="email" class="form-control" placeholder="Masukkan Email Anda" name="email">
    </div>
    <div class="mb-3">
        <label for="">Password</label>
        <input value="" type="password" class="form-control" placeholder="Masukkan Password Anda" name="password">
    </div>
    <div class="mb-3">
        <?php
        $queryOpt = mysqli_query($koneksi, "SELECT * FROM level");
        //var_dump($row)
        ?>
        <select class="form-control" name="id_level" id="id_level">
            <option value="">-- Pilih Level --</option>
            <?php while ($row = mysqli_fetch_assoc($queryOpt)) : ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama_level'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Simpan" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
    </div>
</form>