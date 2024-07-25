<?php
//jika button tidak kosong/sudah diisi maka akan mengambil nilai dari table testimoni
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = ($_POST['deskripsi']);

    //masukkan ke dalam table testimoni (field yang akan dimasukkan)
    //value (inputtan masing masing kolom)
    $insert = mysqli_query($koneksi, "INSERT INTO testimoni (nama, jabatan, deskripsi) VALUES ('$nama','$jabatan','$deskripsi')");

    //jika tidak berhasil/eror akan balik lokasi ke navbar tambah testimoni
    if (!$insert) {
        header("location:?pg=tambah-testimoni&pesan=tambah-gagal");
    }
    //jika berhasil akan di direk ke halaman testimoni
    else {
        header("location:?pg=testimoni&pesan=tambah-berhasil"); //eror disini
    }
}

//jika parameter edit ada maka
if (isset($_GET['edit'])) {
    //parameter edit akan menghasilkan nilai id
    $id = $_GET['edit'];

    $edit = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id ='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

//jika button edit ditekan
if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = ($_POST['deskripsi']);

    $update = mysqli_query($koneksi, "UPDATE testimoni SET nama='$nama' , jabatan='$jabatan' , deskripsi='$deskripsi' WHERE id='$id'");
    header("location:?pg=testimoni&update-berhasil");
}
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="">Jabatan</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['jabatan'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Jabatan" name="jabatan">
    </div>
    <div class="mb-3">
        <label for="">Deskripsi</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['deskripsi'] : '' ?>" type="text" class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Simpan" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
        <a href="?pg=testimoni">Kembali</a>
    </div>

</form>