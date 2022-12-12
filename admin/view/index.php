<?php 
include "../config/_config.php";
session_start();
if(!isset($_SESSION['login'])){
	header("Location: " . APP_URL);
}
?>
<?php include './layouts/_header.php'; ?>
<!-- content -->
<div class="container mt-5" style="margin-bottom: 240px;">
    <?php include 'page_home.php'; ?>
</div>
<!-- ./content -->
<?php include './layouts/_footer.php'; ?>