<?php 
include "../config/_config.php";
session_start();
if(!isset($_SESSION['login'])){
	header("Location: " . APP_URL);
}
?>
<?php include './layouts/_header.php'; ?>
<!-- content -->
<div class="container mt-5" style="margin-bottom: 100px;">
    <div class="card im-box">
        <h5 class="card-header">Data Artikel</h5>
        <div class="card-body">
            <h5 class="card-title">Lihat Data Artikel</h5>
            <a href="<?= APP_URL ?>/admin/artikel/artikel_add.php">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                    Tambah Data Artikel
                </button>
            </a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi Artikel</th>
                        <th scope="col">Tanggal Terbit</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $data = mysqli_query($con, "SELECT * FROM artikel inner join kategori on artikel.id_kategori=kategori.id_kategori");
                    foreach ($data as $row) :  ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $row['judul'] ?></td>
                            <td><?= substr($row['artikel'], 0, 200) . '...' ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><img src="<?= "../img_artikel/" . $row['gambar'] ?>" width="70" height="70" alt="<?= $row['gambar'] ?>"></td>
                            <td><?= $row['kategori'] ?></td>
                            <td>
                                <a class="badge badge-success" href="<?= APP_URL ?>/admin/artikel/artikel_edit.php?id_artikel=<?= $row['id_artikel'] ?>">Edit</a>
                                <a class="badge badge-danger" href="<?= APP_URL ?>/admin/artikel/artikel_delete.php?id_artikel=<?= $row['id_artikel'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ./content -->


<?php include './layouts/_footer.php'; ?>