<?php
  
  
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
      $target = "images/".basename($_FILES['image']['name']);
// Create database connection

      $db = mysqli_connect("localhost", "mmsstand_root", "standinschool", "mmsstand_standinschool");

  	// Get image name
  	$image=  $_FILES['image']['name'];
  	// Get text
  	$title=  $_POST['title'];
   
    $text =  $_POST['text'];
    
  
    $course=  $_POST['course'];
   

  	// image file directory
  

  	$sql = "INSERT INTO events(event_photo, event_title,event_content,event_category_id,createdUser) VALUES  ('$image', '$title' , '$text ','$course','".$_SESSION['userID']."')";

    // execute query
    mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }

?>