<?php
include '../config/_config.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');

$query = "UPDATE user SET nama_user='$nama', username='$username', password='$password' WHERE id_user = '$id_user'";
$result = mysqli_query($con, $query);

if ($result) { ?>
    <script>
        alert('Data berhasil diubah!')
        location.href = '../view/page_user.php'
    </script>
<?php
} else { ?>
    <script>
        alert('Data Gagal diubah!')
        location.href = '../view/page_user.php'
    </script>
<?php } ?>