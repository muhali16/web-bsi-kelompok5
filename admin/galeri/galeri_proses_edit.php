<?php
include "../config/_config.php";

$id = $_POST['id_galeri'];
$keterangan = $_POST['keterangan'];

$random = rand();

$data = mysqli_query($con, "SELECT gambar FROM gallery WHERE id = '$id'");
$data = mysqli_fetch_array($data);
$gambar = $_FILES['gambar']['name'] != "" ? $random . "-" . $_FILES['gambar']['name'] : $data['gambar'];

if($_FILES['gambar'] != ""){
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $target = "../img_galeri/" . $gambar;
    $removeFile = unlink($data['gambar']);
    $move = move_uploaded_file($tmp_name, $target);
}

$update = mysqli_query($con, "UPDATE gallery SET gambar = '$gambar', keterangan = '$keterangan' WHERE id = '$id'");

if ($update){ ?>
    <script>
        alert("Berhasil update foto galeri");
        location.href = '../view/page_galeri.php';
    </script>
<?php } else { ?>
    <script>
        alert("Gagal update foto galeri");
        location.href = '../view/page_galeri.php';
    </script>
<?php } ?>