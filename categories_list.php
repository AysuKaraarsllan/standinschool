<?php include 'header.php';
$category_id = $_GET["category_id"];
$categories = $db->prepare("SELECT * FROM categories
  WHERE category_id=?");

$categories->execute(array($category_id));
$category_retrieve =$categories->fetch(PDO::FETCH_ASSOC);
 ?>


<head>
  <title><?php echo $category_retrieve["category_title"]; ?> <?php echo $setting_retrieve["site_title"]; ?></title>
</head>

  <h2 style="text-align: center;"><?php echo $category_retrieve["category_title"]; ?></h2>
  <div class="row" style="width: 92%; margin: auto;">

    <div class="leftcolumn">
      <div id="column1">
        <?php
          $events= $db-> prepare("SELECT * FROM events
        INNER JOIN categories ON categories.category_id = events.event_category_id
        WHERE event_category_id=? ORDER BY event_id DESC");
          $events-> execute(array($category_id));
          $events_list= $events-> fetchALL(PDO::FETCH_ASSOC);

        foreach ($events_list as $row) {?>
        <!-- Blog Post -->

        <div class="card mb-4 col-md-6 col-xs-6"
         style="text-align: center;
    display: inline-block !important;
    background: #fff;
    width: 47%;
    overflow: hidden;
    border: 1px solid #e3e7ec;
    border-radius: 3px;
    margin-right: 2.2%;
    margin-bottom: 2%;
    box-shadow: 0 1px 1px #e6e6e6;">


            <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" title="<?php echo $row["event_title"]; ?>">
            <img class="card-img-top" src="images/<?php echo $row["event_photo"]; ?>" alt="<?php echo $row["event_title"]; ?>" ></a>
            <div class="card-body">
              <h2 class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["event_title"]; ?>  </a></h2>
              <p class="card-text"><?php echo mb_strimwidth($row["event_content"], 0,230,"...") ?></p>
              <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
             <span><a href="categories_list.php?category_id=<?php echo $row["category_id"];  ?>" title="<?php echo $row ["category_title"];  ?>"> <i class="mdi mdi-pound-box"></i><?php echo  $row["category_title"]; ?></a></span>
             
             <span><?php echo $row["event_date"]; ?></span>
             
            </div>
          </div>

<?php }

  ?>
        

            </div>
        </div>



<?php include 'rightsidebar.php' ?>

      
      <!-- Footer -->

      <?php include 'footer.php' ?>

  
</body>
</html>