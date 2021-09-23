<?php

session_start();
header('location:index.php');

$con = mysqli_connect("localhost","mmsstand_root", "mmsstand_standinschool");
mysqli_select_db($con,"standinschool");



$kullanici_adi = $_POST['kullanici_adi'];
$mail = $_POST['mail'];
$sifre = $_POST['sifre'];
$id = $_POST['id'];



$s= "SELECT * FROM kullanicilar WHERE id ='$id'";

$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);


if ($num==1) {
    echo "Username already taken";
}else {
    $reg= "INSERT INTO kullanicilar (kullanici_adi, mail, sifre) VALUES 
    ('$kullanici_adi','$mail', '$sifre',)";
    mysqli_query($con,$reg);
    echo "success";
}


?>
