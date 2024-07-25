<?php

include "koneksi/koneksi.php";
$querySetting = mysqli_query($koneksi, "SELECT * FROM resume ORDER BY id DESC");

if (isset($_POST['simpan'])) {
    $resume = $_POST['resume'];
    $edu1 = $_POST['edu1'];
    $edu2 = $_POST['edu2'];
    $edu3 = $_POST['edu3'];
    $edu4 = $_POST['edu4'];
    $edu5 = $_POST['edu5'];
    $edu6 = $_POST['edu6'];
    $edu7 = $_POST['edu7'];
    $edu8 = $_POST['edu8'];
    $skil1 = $_POST['skil1'];
    $skil2 = $_POST['skil2'];
    $skil3 = $_POST['skil3'];
    $skil4 = $_POST['skil4'];
    header('location:?pg=resume&insert-berhasil');

    if (mysqli_num_rows($querySetting) > 0) {
        //updated
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE resume 
        SET resume='$resume'
        ,edu1='$edu1'
        ,edu2='$edu2'
        ,edu3='$edu3'
        ,edu4='$edu4'
        ,edu5='$edu5'
        ,edu6='$edu6'
        ,edu7='$edu7'
        ,edu8='$edu8'
        ,edu8='$edu8'
        ,skil1='$skil1'
        ,skil2='$skil2'
        ,skil3='$skil3'
        ,skil4='$skil4'");
        header("location:?pg=resume&edit-berhasil");
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO resume (resume, edu1, edu2, edu3, edu4, edu5, edu6, edu7, edu8,skil1,skil2,skil3,skil4) 
        VALUES ('$resume','$edu1', '$edu2','$edu3','$edu4','$edu5','$edu6','$edu7','$edu8','$skil1','$skil2','$skil3','$skil4')");
        header("location:?pg=resume&insert-berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);
?>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Resume
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Keterangan : </label>
                        <input value="" type="text" class="form-control" name="resume" placeholder="Update Resume">
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Education
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <p>Educadion 1</p>
                        <label for="">Lulusan :</label>
                        <input value="" type="text" class="form-control" name="edu1" placeholder="Update Lulusan" require>
                    </div>
                    <div class="mb-1">
                        <label for="">Tahun : </label>
                        <input value="" type="text" class="form-control" name="edu2" placeholder="Update Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="">Insitusi : </label>
                        <input value="" type="text" class="form-control" name="edu3" placeholder="Update Insitusi">
                    </div>
                    <div class="mb-3">
                        <label for="">Keterangan : </label>
                        <input value="" type="text" class="form-control" name="edu4" placeholder="Update Keterangan">
                    </div>
                    <p>Educadion 2</p>
                    <div class="mb-1">
                        <label for="">Lulusan :</label>
                        <input value="" type="text" class="form-control" name="edu5" placeholder="Update Lulusan" require>
                    </div>
                    <div class="mb-1">
                        <label for="">Tahun : </label>
                        <input value="" type="text" class="form-control" name="edu6" placeholder="Update Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="">Insitusi : </label>
                        <input value="" type="text" class="form-control" name="edu7" placeholder="Update Insitusi">
                    </div>
                    <div class="mb-3">
                        <label for="">Keterangan : </label>
                        <input value="" type="text" class="form-control" name="edu8" placeholder="Update Keterangan">
                    </div>
                    <div class="mb-1">
                        <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Experience
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <p>Skil 1</p>
                        <label for="">Bagian :</label>
                        <input value="" type="text" class="form-control" name="skil1" placeholder="Update Bagian">
                    </div>
                    <div class="mb-1">
                        <label for="">Tahun :</label>
                        <input value="" type="text" class="form-control" name="skil2" placeholder="Update Tahun">
                    </div>
                    <div class="mb-1">
                        <label for="">Insitusi : </label>
                        <input value="" type="text" class="form-control" name="skil3" placeholder="Update Insitusi">
                    </div>
                    <div class="mb-3">
                        <label for="">Skil : </label>
                        <input value="" type="text" class="form-control" name="skil4" placeholder="Update Skil">
                    </div>
                    <div class="mb-1">
                        <button align="center" type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

    </div>
</form>