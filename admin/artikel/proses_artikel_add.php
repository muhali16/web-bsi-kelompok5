<?php
include '../config/_config.php';

$judul = $_POST['judul'];
$artikel = $_POST['artikel'];
$tanggal = $_POST['tanggal'];
$gambar = $_POST['gambar'];
$kategori = $_POST['kategori'];

//upload dan simpan artikel
$random = rand();
$namafile = uniqid() . "-" . rtrim($_FILES['gambar']['name'], " ");
$tmp_name = $_FILES['gambar']['tmp_name'];
$target = "../img_artikel/" . $namafile;
try {
    $upload = move_uploaded_file($tmp_name, $target);
    if(!$upload) {
        throw new Exception("GAGAL MENAMBAHKAN GAMBAR");
    }
} catch (Exception $e) {
    echo $e;
    die;
}


$query = "INSERT INTO artikel(judul, artikel, tanggal, gambar, id_kategori) VALUES(
    '" . $judul . "',
    '" . $artikel . "',
    '" . $tanggal . "',
    '" . $namafile . "',
    '" . $kategori . "'
    )";

try {
    $result = mysqli_query($con, $query);

    if(!$result){
        throw new Exception("Gagal menambahkan ke database");
    }
} catch (Exception $e){
    echo "$e";
}

if ($result) { ?>
    <script>
        alert('Data berhasil ditambahkan!')
        location.href = "../view/page_artikel.php"
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal ditambahkan!')
        location.href = history.go(-1)
    </script>
<?php } ?>