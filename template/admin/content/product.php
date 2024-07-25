<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $foto = mysqli_query($koneksi, "SELECT * FROM barang WHERE id = '$id'");
    $rowFoto = mysqli_fetch_assoc($foto);
    unlink("upload/" . $rowFoto['foto']);
    $delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id ='$id'");
    header('location:?pg=product&hapus=berhasil');
}
?>
<div align="right" class="mb-3">
    <a href="?pg=tambah-product" class="btn btn-primary">Tambah Barang</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_barang'] ?></td>
                <td><?php echo $row['harga'] ?></td>
                <td><img class="img-thumbnail" width="100px" src="upload/<?php echo $row['foto'] ?>" alt=""></td>
                <td>
                    <a href="?pg=tambah-product&edit=<?php echo $row['id'] ?>" class=" btn btn-success"><box-icon name='pencil'></box-icon></a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href=" ?pg=product&delete=<?php echo $row['id'] ?>" class="btn btn-danger"><box-icon type='solid' name='trash'></box-icon></a>
                </td>

            </tr>
        <?php endwhile ?>
        </tr>
    </tbody>
</table>