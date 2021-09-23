
 
<head>
  
 <link href="css/rightsidebar.css" rel="stylesheet" type="text/css">
</head>
 <div class="rightcolumn">
  <!-- Popular Post -->

<div class="card">
            <h3>Popular Post</h3>



<?php
	$events= $db-> prepare("SELECT * FROM events ORDER BY like_number DESC LIMIT 3 ");
	$events-> execute();
	$events_list= $events-> fetchALL(PDO::FETCH_ASSOC);

foreach ($events_list as $row) {?>
	<div class="row">
            <div class="col-md-6 media" style="margin-top:10px;" >


              <a href="singlePost.php?event_id=<?php echo $row["event_id"]?>" title="<?php echo $row["event_title"]; ?>"> 
             <img class="mr-3" src="images/<?php echo $row["event_photo"]; ?>" alt="aybu" style="width: 100%; height:auto;" /></a>
            </div>

            <div class="col-md-6 media-body sidebar-post-title" style="padding-top: 10px;" >
                <h6 class="mt-0"> <a href="singlePost.php?event_id=<?php echo $row["event_id"]?>" title="<?php echo $row["event_title"]; ?>"><?php echo $row["event_title"]; ?></a></h6>
                <span style="font-size: 14px;">
                	<?php echo date('dS F Y ', strtotime( $row["event_date"])) ; ?>
               </span>
              </div>
</div>
          


            <?php  } ?>
          </div>





<!-- Latest Post -->


<div class="row" style="margin-top: 20px;">
     
      <div class="col-md-12">
          <div class="sidebar widget">
              <h3>Recent Post</h3>

<?php
  $events= $db-> prepare("SELECT * FROM events ORDER BY event_date DESC LIMIT 3 ");
  $events-> execute();
  $events_list= $events-> fetchALL(PDO::FETCH_ASSOC);

foreach ($events_list as $row) {?>

              <ul>
                <li>
                    <div class="sidebar-thumb">
                         <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" title="<?php echo $row["event_title"]; ?>">
            <img class="card-img-top" src="images/<?php echo $row["event_photo"]; ?>" alt="<?php echo $row["event_title"]; ?>" ></a>
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-content">
                         <h6 class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["event_title"]; ?>  </a></h6>
                    </div><!-- .Sidebar-thumb -->
                    <div class="sidebar-meta">
                      <span style="font-size: 14px;">
                  <?php echo date('dS F Y ', strtotime( $row["event_date"])) ; ?>
               </span>
              
                    </div><!-- .Sidebar-meta ends here -->
                </li><!-- .Li ends here -->
              </ul><!-- .Ul ends here -->

 <?php  } ?>

          </div><!-- .Widget ends here -->

      </div><!-- .Col ends here -->
    
  </div><!-- .Row ends here -->







<!--categories-->
          <div class="card" style="padding: 0px;">
      
<div class="profile-sidebar" >
<ul class="list-group">

  <?php 
  $categories= $db-> prepare("SELECT * FROM categories");
  $categories->execute();
  $categories_list=$categories->fetchALL(PDO::FETCH_ASSOC);

  foreach ($categories_list as $row) {?>
  	
  	  <li class="list-group-item d-flex justify-content-between align-items-center">
  	  	<a href="categories_list.php?category_id= <?php echo $row ["category_id"]; ?>">
   <?php echo $row ["category_title"];?>
<!--php kod kategorideki paylaşım sayısını çekmek için-->
    <?php 
  $events= $db-> prepare("SELECT * FROM events WHERE event_category_id=?");
  $events->execute(array($row["category_id"]));
  $events_list=$events->fetchALL(PDO::FETCH_ASSOC);
  $event_number = $events->rowCount(); ?>



    <span class="badge badge-primary badge-pill"><?php echo $event_number; ?> </span>
</a>
  </li>

 <?php } ?>

</ul>
</div>


</div>

</div>
</div>


