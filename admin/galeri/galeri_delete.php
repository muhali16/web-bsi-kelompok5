<?php
include "../config/_config.php";

$id_galeri = $_GET['id'];

$data_galeri = mysqli_query($con, "SELECT * FROM gallery WHERE id = " . $id_galeri);
$data_galeri = mysqli_fetch_array($data_galeri);

$deleteFile = unlink("../img_galeri/" . $data_galeri['gambar']);

if(!$deleteFile){
    echo "<script>
        alert('Foto gagal dihapus! Code: 404')
        location.href = history.go(-1)
    </script>";
    die;
}

$delete = mysqli_query($con, "DELETE FROM gallery WHERE id = $id_galeri");

if ($delete){ ?>
    <script>
        alert('Foto berhasil dihapus!')
        location.href = '../view/page_galeri.php'
    </script>
<?php } else { ?>
    <script>
        alert('Foto gagal dihapus! Code: 500')
        location.href = '../view/page_galeri.php'
    </script>
<?php } ?>
