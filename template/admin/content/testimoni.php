<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id = '$id'");
    header("location:?pg=testimoni&hapus-berhasil");
}
?>
<div align="right" class="mb-3">
    <a href="?pg=tambah-testimoni" class="btn btn-primary">Tambah Testimoni</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['jabatan'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td>
                    <a href="?pg=tambah-testimoni&&edit=<?php echo $row['id'] ?>" class="btn btn-success"><box-icon name='pencil'></box-icon></a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href=" ?pg=testimoni&delete=<?php echo $row['id'] ?>" class="btn btn-danger"><box-icon type='solid' name='trash'></box-icon></a>
                </td>

            </tr>
        <?php endwhile ?>
    </tbody>
</table>