


<?php
 $db = mysqli_connect("localhost", "mmsstand_root", "standinschool", "mmsstand_standinschool");
$sql = "SELECT * FROM  events";
$result= mysqli_query($db,$sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div' class='card-body'>";
      echo "<h4 class='card-title'>".$row['event_title']."</h4>";
      echo "<img src='images/".$row['event_photo']."' >";
      echo "<p>".$row['event_content']."</p>";
           echo "<div class='card-footer text-muted'>";
           echo "</div>";
      echo "</div>";
    }
  ?>