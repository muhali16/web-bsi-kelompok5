<?php
define("APP_URL",   "http://" . $_SERVER['SERVER_NAME'] . "/dev/bangkit_indonesia");
$con = mysqli_connect('localhost', 'admin', 'akimusta', 'bangkit_indonesia');
if (!$con) {
    echo 'Gagal terhubung ke database';
    die;
}
