

<?php 

try{
$db = new PDO("mysql:host=localhost;dbname=mmsstand_standinschool;charset=utf8", "mmsstand_root", "standinschool");
	  }catch(PDOException $e){
		  echo $e->getMessage();
	  }
	  

switch ($_REQUEST ['action']) {
	case "sendMessage":
	session_start();

$query = $db-> prepare("INSERT INTO messages SET user=? , message=?");
$run= $query->execute([$_SESSION['username'], $_REQUEST['message']]);

if($run){
echo 1;
exit;
}
break;

case 'getMessages':
$query = $db-> prepare("SELECT * FROM messages");
$run= $query->execute();

$rs= $query->fetchAll(PDO::FETCH_OBJ);

$chat= ' ';
session_start();
		$userNameSession=$_SESSION['username'];//ys
foreach ($rs as $message) {

//kişi kendi yazdı ise -> my-user

    if($userNameSession==$message->user){
$chat .='<div style="';    $chat .= 'float:right;background-color:#80ced6;padding:5px 30px 10px 30px; border-radius:5px;border: 2px solid  #618685;';
$chat.='"> 
   
   
 <div >
<strong>'.$message->user.'<br></strong>
 <span> '.$message->message.'<br></span>
<span> '.date(' h:i a',strtotime($message->date)).'</span>
</div>
   </div><br><br><br><br><br><br>';} 

else{
//başkası yazdı ise -> remote-user
	$chat .='<div style="';  $chat .= 'float:left;background-color:#c6bcb6;padding:5px 30px 10px 30px !important; border-radius:5px;border: 2px solid #96897f;';
	 $chat.='">
   
  <div>
<strong>'.$message->user.'<br></strong>
 <span> '.$message->message.'<br><br></span>
<span> '.date(' h:i a',strtotime($message->date)).'</span>
 </div>
   </div><br><br><br><br><br><br>';
}
   
}
echo $chat;
	break;

		
}

?> 