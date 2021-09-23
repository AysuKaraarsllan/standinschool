<?php

try{
$db = new PDO("mysql:host=localhost;dbname=mmsstand_standinschool;charset=utf8", "mmsstand_root", "standinschool");
}
catch (PDOException $error) {
echo "<center><b>DB ye bağlanılamadı!</b></center>";$error->getMessage();
}
?>