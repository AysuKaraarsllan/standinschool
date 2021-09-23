<?php
session_start();


 $conn  = new mysqli("localhost","mmsstand_root", "standinschool","mmsstand_standinschool");

if ($conn ->connect_error) {
  die("Connection failed: " . $conn ->connect_error);
}

$kullanici_adi = $_POST['kullanici_adi'];
$sifre = $_POST['sifre'];

$sql = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici_adi' && sifre='$sifre'";

 $result = $conn-> query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result-> fetch_assoc()) {
    $_SESSION['username']=$row['kullanici_adi'];
    $_SESSION['userID']= $row['id'];
    $_SESSION['userPhoto']= $row['user_photo'];
  }
  
   header('location:index1.php');
} else {
  header('location:google.com');
} 



 $conn->close();

?>