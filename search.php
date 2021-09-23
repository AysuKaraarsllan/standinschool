<?php include 'header.php';

$search =strip_tags($_GET["search"]) ;

 ?>


<head>
  <title><?php echo $search; ?> searchig... <?php echo $setting_retrieve["site_title"]; ?></title>
</head>
  
  <div class="row">

    <div class="leftcolumn">
      <div id="column1" style="text-align: center;">

       <div class="header">Results of searching about <i style="color: red;"><?php echo $search; ?></i>....</div>


        <?php
          $events= $db-> prepare("SELECT * FROM events
        INNER JOIN categories ON categories.category_id = events.event_category_id
        WHERE event_title LIKE ? ORDER BY event_id DESC");
          $events-> execute(array('%' .$search. '%'));
          $events_list= $events-> fetchALL(PDO::FETCH_ASSOC);
          $count_event = $events->rowCount();

          if($count_event){

        foreach ($events_list as $row) {?>
       <!-- Blog Post -->

        <div class="card mb-4">
            <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" title="<?php echo $row["event_title"]; ?>">
            <img class="card-img-top" src="images/<?php echo $row["event_photo"]; ?>" alt="<?php echo $row["event_title"]; ?>" ></a>
            <div class="card-body">
              <h2 class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["event_title"]; ?>  </a></h2>
              <p class="card-text"><?php echo $row["event_content"]; ?></p>
              <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
             <span><a href="categories_list.php?category_id=<?php echo $row["category_id"];  ?>" title="<?php echo $row ["category_title"];  ?>"> <i class="mdi mdi-pound-box"></i><?php echo $row["category_title"]; ?></a></span>

             <span><?php echo $row["event_date"]; ?></span>

             <span><?php echo $row["event_author"]; ?></span>
          
            </div>
          </div>

<?php } } else {
  echo "<br><b>No results found</b><br>";
} ?>
        

            </div>
        </div>


        <?php include 'rightsidebar.php';?>


      </div>
<div style="clear: both;"></div>
     <?php include 'footer.php';?>
    </div>
  </div>
</body>
</html>