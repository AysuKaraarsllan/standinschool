


<head>
	<link href="css/postadd.css" rel="stylesheet" type="text/css">
	
</head>
<div class='row'  style='margin-top:20px;background-color: #fff;padding:10px; '>
 <div class='col-md-12' style='padding:0px;'>
 	<br/>
 	<h6 style="text-align: center;"> ANNOUNCEMENTS</h6><br/>
<?php
 $db = mysqli_connect("localhost", "mmsstand_root", "standinschool", "mmsstand_standinschool");
$sql = "SELECT * FROM  announcements ORDER BY ann_date DESC LIMIT 4 ";
$result= mysqli_query($db,$sql);
    while ($row = mysqli_fetch_array($result)) {

      echo "<div id='ann_bg'";
      echo "<ul>";
      echo "<li style='list-style-type: square !important;'>".$row['ann_title']."</li>";
      echo "</ul>";
      echo "</div>";
        }   
  ?>
 
 </div>
             </div>