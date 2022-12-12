<?php 

include "../admin/config/_config.php";
session_start();
//$username = mysqli_query($con, "SELECT * FROM user WHERE username = 'admin'");
//$username = mysqli_fetch_assoc($username);
//var_dump($username);

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    try {
        $username = mysqli_query($con, "SELECT * FROM user WHERE username = '$email'");
        $username = mysqli_fetch_assoc($username);

        if(!$username){
            throw new Exception("Failed query!");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    if($username){
        if($username['password'] == $pass){
            $_SESSION['login'] = 1;
            $_SESSION['id'] = $username['id_user'];
            $_SESSION['username'] = $username['username'];
            $_SESSION['nama_user'] = $username['nama_user'];
            header("Location: " . APP_URL . "/admin/view");
            exit();
        } else {
            echo '<script>
            alert("Password yang anda masukan salah!");
            document.location.href = " ' . APP_URL . '/login' . '";
            </script>';
            exit();
        }
    } else {
        echo '<script>
		alert("Username yang anda masukan tidak terdaftar!");
		document.location.href = " ' . APP_URL . '/login' . '";
		</script>';
        exit();
    }
}