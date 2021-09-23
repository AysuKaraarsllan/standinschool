<?php
session_start();

$db = new PDO("mysql:host=localhost;dbname=mmsstand_standinschool;charset=utf8", "mmsstand_root", "standinschool");

$kullanici_id = $_POST['kullanici_id'];
$resim_kullanici_id = $_POST['resim_kullanici_id'];

if (!$kullanici_id|| !$resim_kullanici_id) {
    die("boş alan bırakmayınız!");
}

$user = $db->query("SELECT * FROM kullanicilar, profile_photo WHERE id = '$kullanici_id' AND user_id = '$resim_kullanici_id'")->fetch();



if ($user) {
    $_SESSION['user'] = $user;
    


}else {
    
    
}
?>
