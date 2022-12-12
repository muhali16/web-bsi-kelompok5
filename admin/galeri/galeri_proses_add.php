<?php
include  "../config/_config.php";
session_start();

$keterangan = $_POST['keterangan'];

$tmpFile = $_FILES['gambar']['tmp_name'];
$user_id = $_SESSION['id'];
$random = rand();
$gambar = $random . "-" . $_FILES['gambar']['name'];
$target = "../img_galeri/" . $random . "-" . $_FILES['gambar']['name'];

try {
    $move = move_uploaded_file($tmpFile, $target);
    if(!$move) {
        throw new Exception("GAGAL PINDAHKAN GAMBAR");
    }
} catch (Exception $e) {
    echo $e;
    die;
}

try {
    $query = mysqli_query($con, "INSERT INTO `gallery` (`id`, `gambar`, `id_user`, `keterangan`) VALUES (NULL, '$gambar', '$user_id', '$keterangan')");

    if(!$query) {
        throw new Exception("Gagal query!");
    }
} catch (Exception $e) {
    echo $e->getMessage(). "<br>";
    echo $user_id;
    die;
}

if ($query){ ?>
    <script>
        alert('Foto berhasil ditambahkan!')
        location.href = '../view/page_galeri.php'
    </script>
<?php } else { ?>
    <script>
        alert('Foto gagal ditambahkan!')
        location.href = '../view/page_galeri.php'
    </script>
<?php } ?>
