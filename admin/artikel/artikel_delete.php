<?php
include '../config/_config.php';

$id_artikel = $_GET['id_artikel'];

$data_artikel = mysqli_query($con, "SELECT * FROM artikel WHERE id_artikel = " . $id_artikel);
$data_artikel = mysqli_fetch_array($data_artikel);

$deleteFile = unlink("../img_artikel/" . $data_artikel['gambar']);

if(!$deleteFile){
    echo "<script>
        alert('Data gagal dihapus! Code: 404')
        location.href = history.go(-1)
    </script>";
    die;
}

$delete = mysqli_query($con, "DELETE FROM artikel WHERE id_artikel = $id_artikel");

if ($delete) { ?>
    <script>
        alert('Data berhasil dihapus!')
        location.href = "../view/page_artikel.php"
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal dihapus!')
        location.href = "../view/page_artikel.php"
    </script>
<?php } ?>