<?php 


 $dbhost = 'localhost';
 $dbname = 'mmsstand_standinschool';
 $dbuser = 'mmsstand_root';
 $dbpass = 'standinschool';
 
 try {
	 $db = new PDO ("mysql:dbhost=$dbhost;dbname=$dbname","$dbuser", "$dbpass");
	  }catch(PDOException $e){
		  echo $e->getMessage();
	  }
	  



switch ($_REQUEST ['action']) {
	case "sendMessage":

	session_start();
		
$query = $db-> prepare("INSERT INTO messages SET user=? , message=?");
$query->execute([$_SESSION["username"], $_REQUEST["message"]]);

		break;
}

?>