<?php include 'header.php';
   $connect = mysqli_connect("localhost", "mmsstand_root", "standinschool", "mmsstand_standinschool");  
    if(isset($_POST["insert"]))  
    {  
         $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
         $query = "INSERT INTO events(event_photo) VALUES ('$file')";  
         if(mysqli_query($connect, $query))  
         {  
              echo '<script>alert("Image Inserted into Database")</script>';  
         }  
    }  
   
   
   $kullanicilar= $db->prepare("SELECT * FROM kullanicilar");
   $kullanicilar-> execute();
   $username_retrieve = $kullanicilar->fetch (PDO::FETCH_ASSOC);
   
   ?>
<head>
   <link href="css/annSinglePage.css" rel="stylesheet" type="text/css">
   <title></title>
</head>
<div class="col-md-8 offset-md-2 form-horizontal full-height" style="height:800px;background-color:#fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
   <div class="parallax" style="background-image: url('images/ybu1.png');
      /* Set a specific height */
      min-height: 200px; 
      min-width: auto;
      align-items: center;
      /* Create the parallax scrolling effect */
      background-attachment: fixed;
      background-position: inherit;
      background-repeat: no-repeat;
      background-size: contain;"></div>
   <div class="row full-height " style="background-color: #fff;">
      <div>
         <?php 
            $categories= $db-> prepare("SELECT * FROM categories");
            $categories->execute();
            $categories_list=$categories->fetchALL(PDO::FETCH_ASSOC);
            
            foreach ($categories_list as $row) {?>

         <button <?php if ($_GET['kategoriID'] == $row['category_id']) { ?>style='background: beige;'<?php } ?> onclick="changeTheText(<?php echo $row ["category_id"];?>)">
            <?php echo $row ["category_title"];?>
            <!--php kod kategorideki paylaşım sayısını çekmek için-->
            <?php 
               $announcements= $db-> prepare("SELECT * FROM announcements WHERE category=?");
               $announcements->execute(array($row["category_id"]));
               $announcements_list=$announcements->fetchALL(PDO::FETCH_ASSOC);
               $announcement_number = $announcements->rowCount(); ?>
            <?php } ?>
         </button>
         <h3 style=" text-align: center;margin: auto;margin-top: 40px;">Announcemets</h3>
      </div>
      <div class="col-md-12" id="paragraphText">
         <div id="column1" style="background-color: #F1F3FA !important;">
            <?php
               if (isset($_GET['kategoriID'])){
                $sorgu = "SELECT * FROM announcements where category = '".$_GET['kategoriID']."' ORDER BY ann_date DESC";
               } else {
                $sorgu = "SELECT * FROM announcements ORDER BY ann_date DESC";
               }
               $announcements= $db-> prepare($sorgu);
               $announcements->execute();
               $announcements_list=$announcements->fetchALL(PDO::FETCH_ASSOC);
               
               foreach ($announcements_list as $row) {?>
            <!-- Blog Post -->
            <div class="card mb-4" >
               <div class="card-body" style="padding: 0.25rem !important;">
                  <h5 class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["ann_title"]; ?>  </a></h5>
                  <p class="card-text"><?php echo mb_strimwidth($row["ann_content"], 0,230,"...")  ?></p>
               </div>
               <div class="card-footer text-muted" style="padding: .25rem 0.70rem">
                  <span><?php echo $row["ann_date"]; ?></span>
               </div>
            </div>
            <?php }
               ?>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function changeTheText(kategoriID)
   {
    window.location = 'announcements.php?kategoriID='+kategoriID;

   }
   
</script>
</body>
</html>