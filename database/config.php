<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$con = mysqli_connect('localhost','root','','db_wisataa');

if (!$con)
{
    die('connect Erorr: ' . mysqli_connect_errno());
}

?>