<?php
include "../config/_config.php";

include "../view/layouts/_header.php";
?>

<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header">Udah Foto Galeri</h5>
        <div class="card-body">
            <h5 class="card-title">Form Edit Foto</h5>
            <?php
            $id_galeri = $_GET['id'];
            $data = mysqli_query($con, "SELECT * FROM gallery WHERE id = '$id_galeri'");

            $row = mysqli_fetch_array($data); ?>
            <form action="galeri_proses_edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_galeri" class="form-control" value="<?= $row['id'] ?>">
                    <div class="form-group">
                        <label for="gambar">Gambar <br>
                        <img src="<?= APP_URL ?>/admin/img_galeri/<?= $row['gambar'] ?>" width="300"
                             alt="<?=
                        $row['gambar'] ?>">
                        </label>
                        <input type="file" accept="image/*" name="gambar" class="form-control" id="gambar">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea rows="15" cols="100" name="keterangan" class="w-100" class="form-control"
                                  id="keterangan"><?= $row['keterangan'] ?></textarea>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ./content -->
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>


<?php include "../view/layouts/_footer.php" ?>
