<?php

$db = new PDO("mysql:host=localhost;dbname=mmsstand_standinschool;charset=utf8", "mmsstand_root", "standinschool");


$kullanici_adi = $_POST['kullanici_adi'];
$mail = $_POST['mail'];
$sifre = $_POST['sifre'];

if (!$kullanici_adi || !$mail || !$sifre) {
    die("lütfen boş alan bırakmayınız.");
}

$ekle = $db->prepare("INSERT INTO kullanicilar SET kullanici_adi = ?, mail = ?, sifre = ?");
$ekle->execute([$kullanici_adi, $mail, $sifre]);

if ($ekle) {
    header('location:index.php');
}else {
    echo "Bir hata oluştu.";
}

