

<?php session_start();?>
<?php include 'modal.php';?>
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
	<link href="css/rightsidebar.css" rel="stylesheet" type="text/css">
	<link href="css/profile.css" rel="stylesheet" type="text/css">
	<link href="css/postadd.css" rel="stylesheet" type="text/css">
  <title><?php echo $setting_retrieve["site_title"]; ?></title>
</head>
<div class="container" style="padding: 0px !important;margin-top: 50px;">
		<div class="row profile">
			<div class="col-12 col-md-3 " style="padding-left: 0px;" >







<div class="card card-profile text-center"   style="box-shadow: 0 0 0 1px rgba(0,0,0,.15), 0 2px 3px rgba(0,0,0,.2);
    transition: box-shadow 83ms;">
  <img class="card-img-top" src="https://unsplash.it/340/160?image=354"/>
  <div class="card-block">
    <img class="card-img-profile" src="http://standinschool.xyz/images/<?php echo $_SESSION ["userPhoto"]; ?>"/>
    <h4 class="card-title">
        
      <?php echo $_SESSION ["username"]; ?>
     <small>Ankara Yıldırım Beyazıt University</small>
    </h4>
    <div class="card-links">
      <a class="fa fa-dribbble" href="#"></a>
      <a class="fa fa-twitter" href="#" style=" margin: 0 1.6em;"></a>
      <a class="fa fa-facebook" href="#"></a>
    </div>
  </div>
</div>




<div class="profile-sidebar" style="margin-top: 20px;box-shadow: 0 0 0 1px rgba(0,0,0,.15), 0 2px 3px rgba(0,0,0,.2);
    transition: box-shadow 83ms;">
<ul class="list-group" >

  <?php 
  $categories= $db-> prepare("SELECT * FROM categories");
  $categories->execute();
  $categories_list=$categories->fetchALL(PDO::FETCH_ASSOC);

  foreach ($categories_list as $row) {?>
  	
  	  <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius: 0px;">
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
			<div class="col-12 col-md-7">


				<div class="row share-box" style="height: 170px !important;min-height: 150px;display: block;background-size: contain;background-repeat: no-repeat;">




           <div  style="width:100%;padding-top: 20px;">  
                <h3 align="center">Let's Make Some Voices<br /> 
              <span style="font-size: 17px;font-style: oblique;">Insert and Display Your Post</span>  </h3> 

                 
                
           </div>  

	<button  type="button" class="btn btn-block"  data-toggle="modal" data-target="#modalCart" style="position: absolute;  bottom: 0px;border: 1px solid gray;border-radius: 0px;padding:12px 0px; ">Share Post
				</button>



				</div>


<!-- Button trigger modal-->


<!-- Modal: modalCart -->

<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: auto;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">LET'S SHARE </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" >


 <form method="POST" action="index1.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>



 <label for="course">Courses</label>
    <select id="course" name="course">


  <?php 

  $categories= $db-> prepare("SELECT * FROM categories");
  $categories->execute();
  $categories_list=$categories->fetchALL(PDO::FETCH_ASSOC);

  foreach ($categories_list as $row) {?>
    
      <option value="<?php echo $row ['category_id'];?>"><?php echo $row ["category_title"];?></option>
       <?php } ?>
    </select>


     <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Title..">

  
  	<div>

      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	

  	<div>
  		<input type="submit" name="upload" value="Upload "></input >
  	</div>
  </form>
    
  
      </div>

<!--title and text -->
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        
      </div>

    </div>

  </div>


</div>
<!-- Modal: modalCart -->




	<div class="profile-content" style="margin-top:20px;">
	


		
								

<!-- start to events -->
<div id="column1" style="background-color: #F1F3FA !important;">
	<?php
	$events= $db-> prepare("SELECT *  FROM events e
INNER JOIN categories c ON c.category_id = e.event_category_id
left join kullanicilar k on k.id = e.createdUser
ORDER BY event_id DESC");
	$events-> execute();
	$events_list= $events-> fetchALL(PDO::FETCH_ASSOC);

foreach ($events_list as $row) { 
    // Hangi tabloyu kullanıyorsun? post user mi?

	?>
  <!-- Blog Post -->
          <div class="card mb-4">

<!--event post profile -->
               <div class="row">
                    <div class="col-2 sidebar-thumb" style=" margin-right: 0px;text-align: center;padding-right: 0px; ">
                         <a href="user.php?id=<?php echo $row["id"]; ?>" title="<?php echo $row["kullanici_adi"]; ?>">
            <img class="card-img-profile" src="images/<?php echo $row["user_photo"]; ?>" style="height: 75px; width:75px;"/>

                    </div><!-- .Sidebar-thumb -->
                    <div class="col-9 sidebar-content" >
                         <span class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> 
 
<b><?php echo $row["kullanici_adi"]; ?> </b><br/>
      <?php echo $row["department"];  ?>
                    </div><!-- .Sidebar-thumb -->

</div> 

<!--end of event post profile -->

  <a href="categories_list.php?category_id= <?php echo $row ["category_id"]; ?>">
            <?php 
            $uzanti_dizi = explode(".",$row["event_photo"]);
            $uzanti = end($uzanti_dizi);
            
            ?>
            <?php if ($uzanti != 'jpg' and $uzanti != 'jpeg' and $uzanti != 'png'){ ?> 
          	<a download 
               href="images/<?php echo $row["event_photo"]; ?>" title="<?php echo $row["event_title"]; ?>">
            
            <img class="card-img-top" src="images/download.png" style="width: 70px;position: relative;margin-left:15px;margin-top:10px;" alt="<?php echo $row["event_title"]; ?>" ></a>
            <?php } else {  ?>
            <a
               href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" title="<?php echo $row["event_title"]; ?>">
            
            <img class="card-img-top" src="images/<?php echo $row["event_photo"]; ?>" alt="<?php echo $row["event_title"]; ?>" ></a>

            <?php } ?>


            <div class="card-body">
              <h2 class="card-title"> <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["event_title"]; ?>  </a></h2>
              <p class="card-text"><?php echo mb_strimwidth($row["event_content"], 0,230,"...")  ?></p>
              <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
             <span><a href="categories_list.php?category_id=<?php echo $row["category_id"];  ?>" title="<?php echo $row ["category_title"];  ?>"> <i class="mdi mdi-pound-box"></i><?php echo $row["category_title"]; ?></a></span>

             <span><?php echo $row["event_date"]; ?></span>

            </div>
          </div>
	
<?php }

	?>
	


</div>

<!-- end to events-->

<?php
 $events= $db-> prepare("SELECT event_id,event_photo,event_title,event_content,event_date,event_category_id,like_number,kullanici_adi from events , kullanicilar 
where events.stnumber=kullanicilar.stnumber");

?>


	</div>
			</div>




<div class="col-12 col-md-3" style="padding-right: 0px !important">


    <?php  include 'follow.php' ?>
	<?php  include 'homeAnn.php' ?>


		<footer>
			<div>
				<ul style="padding: 0px;">
					<li class="footer-list">
						<a href="#">About</a>
					</li>
					<li class="footer-list">
						<a href="#">Help Center</a>
					</li>
					<li class="footer-list">
						<a href="#">Hakkımda</a>
					</li>
					<li class="footer-list">
						<a href="#">Advertise</a>
					</li>
					<li class="footer-list">
						<a href="#">Mobil App</a>
					</li>
				</ul>
			</div>
			<div>
				<div  class="row" style="text-align: center;">
					<div class="col-2"><img src="images/<?php echo $setting_retrieve["site_logo"]; ?>" alt="Aybu-SIS" style="width: 35px;display: block;"> </div>
<div class="col-10"><span>Aybu-SIS Corporation © 2020</span></div>
					
				</div>
			</div>
		</footer>
	</div>

		</div>	
	</div>




	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
	</script> 
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
	</script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	</script> 
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
	</script> 
	<script src="//code.jquery.com/jquery-1.11.1.min.js">
	</script> 
	<script src="js/popup.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
	</script> 
	<script src="js/script.js">
	</script>
	<script src="js/choosefile.js">
	</script>





</body>
</html>