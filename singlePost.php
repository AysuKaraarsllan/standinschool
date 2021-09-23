<?php include 'header.php';
$event_id = $_GET["event_id"];
$events = $db->prepare("SELECT * FROM events 
  INNER JOIN categories ON categories.category_id = events.event_category_id
  WHERE event_id=?");

$events->execute(array($event_id));
$event_retrieve = $events->fetch(PDO::FETCH_ASSOC);
 ?>

<head>
  
  <title><?php echo $event_retrieve["event_title"]; ?> <?php echo $setting_retrieve["site_title"]; ?></title>
</head>

<div class="header" >
  <h2><?php echo $event_retrieve["event_title"]; ?></h2>
</div>
<div class="row" style="width: 92%;margin: auto;">
  <div class="leftcolumn">
   
<div id="column1">


  <!-- Blog Post -->
          <div class="card mb-4">
            <a href="singlePost.php?event_id= <?php echo $event_retrieve["event_id"]; ?>" title="<?php echo $event_retrieve["event_title"]; ?>">
            <img class="card-img-top" src="images/<?php echo $event_retrieve["event_photo"]; ?>" alt="<?php echo $event_retrieve["event_title"]; ?>" ></a>
            <div class="card-body">
              <h2 class="card-title"> <a href="#"></a> <?php echo $event_retrieve["event_title"]; ?>  </a></h2>
              <p class="card-text"><?php echo $event_retrieve["event_content"]; ?></p>
              
            </div>
            <div class="card-footer text-muted">
             <span><a href="category-list.php?category_id=<?php echo $event_retrieve["category_id"];  ?>" title="<?php echo $event_retrieve ["category_title"];  ?>"> <i class="mdi mdi-pound-box"></i><?php echo $event_retrieve["category_title"]; ?></a></span>

             <span><?php echo $event_retrieve["event_date"]; ?></span>

          
            </div>
          </div>

  
</div>

  </div>



<?php include 'rightsidebar.php' ?>

<!--Footer-->

<?php include 'footer.php' ?>

</body>
</html>
