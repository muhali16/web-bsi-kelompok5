<?php include "../config/_config.php";
include '../view/layouts/_header.php';
error_reporting(0);
?>
<!-- content -->
<div class="container mt-5">
    <div class="card im-box">
        <h5 class="card-header"> Tambah Artikel</h5>
        <div class="card-body">
            <h5 class="card-title">Form Tambah Artikel</h5>
            <form action="proses_artikel_add.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul">
                    </div>
                    <div class="form-group">
                        <label for="">Isi Artikel</label>
                        <textarea rows="15" cols="100" name="artikel" class="w-100" class="form-control" id="artikel"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label><br>
                        <input name="gambar" type="file" id="gambar"
                        accept="image/*" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" class="form-control">
                            <?php
                            $tampil = mysqli_query($con, "SELECT * FROM kategori ORDER BY kategori");
                            if ($row['kategori'] == 0) {
                                echo "<option value=0 selected>- Pilih Kategori -</option>";
                            }

                            while ($edit = mysqli_fetch_array($tampil)) {
                                if ($row['id_kategori'] == $edit['id_kategori']) {
                                    echo "<option value=$edit[id_kategori] selected>$edit[kategori]</option>";
                                } else {
                                    echo "<option value=$edit[id_kategori]>$edit[kategori]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary ">Tambah</button>
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
<?php include '../view/layouts/_footer.php'; ?>