<?php 
include "../config/_config.php";

$id_user = $_GET['id_user'];

$delete = mysqli_query($con, "DELETE FROM user WHERE id_user = $id_user");

if($delete) {
?>
<script>
    alert('User berhasil dihapus!')
    location.href = "../view/page_user.php"
</script>
<?php } else {?>
<script>
    alert('User gagal dihapus!')
    location.href = "../view/page_user.php"
</script>
<?php } ?>