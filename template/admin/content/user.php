<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
$query = mysqli_query($koneksi, "SELECT user.*, level.nama_level FROM user
LEFT JOIN level ON user.id_level = level.id ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
    header("location:?pg=user&hapus-berhasil");
}
?>
<div align="right" class="mb-3">
    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Pengguna</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_lengkap'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['nama_level'] ?></td>
                <td>
                    <a href="?pg=tambah-user&&edit=<?php echo $row['id'] ?>" class="btn btn-success"><box-icon name='pencil'></box-icon></a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href=" ?pg=user&delete=<?php echo $row['id'] ?>" class="btn btn-danger"><box-icon type='solid' name='trash'></box-icon></a>
                </td>

            </tr>
        <?php endwhile ?>
    </tbody>
</table>