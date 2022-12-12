<?php
include '../config/_config.php';
$id_kategori = $_GET['id_kategori'];

try {
    $delete = mysqli_query($con, "DELETE FROM kategori WHERE id_kategori = $id_kategori");
    if(!$delete){
        throw new Exception("Error database");
    }
} catch (Exception $e){
    echo $e;
}
if($delete) { ?>
   <script>
        alert('Kategori berhasil dihapus!')
        location.href = "../view/page_kategori.php"
    </script>
<?php
} else { ?>
    <script>
        alert('Kategori Gagal dihapus!')
        location.href = "../view/page_kategori.php"
    </script>
<?php } ?>
