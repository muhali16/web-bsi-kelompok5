<?php
include "../config/_config.php";

session_start();
if(!isset($_SESSION['login'])){
    header("Location: " . APP_URL);
}

include "./layouts/_header.php";
?>

<!-- content -->
<div class="container mt-5" style="margin-bottom: 180px;">
    <div class="card im-box">
        <h5 class="card-header">Data Galeri</h5>
        <div class="card-body">
            <h5 class="card-title">Lihat Data Galeri</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                Tambah Gambar
            </button>
            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Keterangan Gambar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $data = mysqli_query($con, "SELECT * FROM gallery INNER JOIN user ON gallery.id_user = user.id_user");
                foreach ($data as $row) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $row['nama_user'] ?></td>
                        <td><img src="<?= APP_URL ?>/admin/img_galeri/<?= $row['gambar'] ?>" alt="<?= $row['gambar']
                            ?>" width="200"></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td>
                            <a class="badge badge-success" href="<?= APP_URL ?>/admin/galeri/galeri_edit.php?id=<?=
                            $row['id'] ?>">Edit</a>
                            <a class="badge badge-danger" href="<?= APP_URL ?>/admin/galeri/galeri_delete.php?id=<?=
                            $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./content -->

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ke Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL . '/admin/galeri/galeri_proses_add.php' ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" accept="image/*" name="gambar" id="gambar" class="form-control" required>
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal" onclick="history.go(-1)">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal add -->

<?php
include "./layouts/_footer.php";
?>
