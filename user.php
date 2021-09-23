<?php session_start();?>

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


//Skills Insert


 //End of Skills insert
 ?>


    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="profilePage.css">
    <link href="css/profile.css" rel="stylesheet" type="text/css">
    <link href="css/postadd.css" rel="stylesheet" type="text/css">
   
    <title></title>
</head>


        <div class="container">
            <div class="row profile">


                <div class="col-md-3" style="width: 10rem;margin-top: 1.5rem!important;">
                    

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
      <a class="fa fa-twitter" href="#" ></a>
      <a class="fa fa-facebook" href="#"></a>
    </div>
  </div>
</div>

<!-- Modal: modalCart -->

<!--------------------------------------------------------------------------------------------------------------------->



                         <div class="card mb-4" style="padding: 10px;">

                        <img src="img/slider-1.jpeg" class="card-img-top img-thumbnail" alt="">
                        <div class="card-body" style="padding: 10px;">
                        <div class="card-footer text-muted">
                            <div class="row">
                                 <div class="col-md-8" style="padding: 0px 0px 0px 10px;">
                          ABOUT ME 
                          </div>
                          <div class="col-md-4" style="padding: 0px;">

                <button  type="button" class="btn "  data-toggle="modal" data-target="#editAbout"><i class='fa fa-edit' style='font-size:18px;position: relative;top:-6px;' ></i>
                </button>
            </div>
        </div>

                        </div>


                      <?php

if ($_REQUEST['id']) {//202

    $userId = $_GET['id'];
    //echo  "aaa=".$userId;
  }

 $aboutme= $db-> prepare("SELECT *  FROM aboutme a
    
WHERE a.aboutUser=$userId
ORDER BY id DESC");
  $aboutme-> execute();
  $aboutme_list= $aboutme-> fetchALL(PDO::FETCH_ASSOC);
        foreach ($aboutme_list as $row) {?>

                           <p class="card-text">
                           
   
    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius: 0px;">
   <?php echo $row["about"];?>
<?php }

  ?>
       </p>

           </div>
                        
             </div>




<!-- Modal: modalCart -->




<div class="modal fade" id="editAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



        <?php 

 if(isset($_POST["editabout"]))  
 {  
$about=$_POST['about'];
echo $about;

$sql="INSERT INTO aboutme(about,aboutUser) VALUES ('$about', '".$_SESSION['userID']."')";
     
$result=mysqli_query($connect,$sql);  
   if($result)
      {  
            echo "Text Inserted into Database <meta http-equiv='refresh' content='1'";  
        }  else{
        echo 'not inserted';
      }

      mysqli_free_result($result);
      mysqli_close($connect);
   }  
        ?>

 <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
  
       

      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="about" 
        placeholder="Say something about this image..."></textarea>

     <input type="submit" name="editabout" value="Edit"></input>
  </form>
    
  
      </div>

<!--title and text -->
     
    </div>

  </div>


</div>
<!-- Modal: modalCart -->
<!------------------------------------------------------------------------------- -->
                         <div class="card mb-4" style="padding: 10px;">

                        <img src="img/slider-1.jpeg" class="card-img-top img-thumbnail" alt="">
                        <div class="card-body" style="padding: 10px;">
                        <div class="card-footer text-muted">
                            <div class="row">
                                 <div class="col-md-8" style="padding: 0px 0px 0px 10px;">
                          SKILLS
                          </div>
                          <div class="col-md-4" style="padding: 0px;">

                <button  type="button" class="btn "  data-toggle="modal" data-target="#editSkills"><i class='fa fa-edit' style='font-size:18px;position: relative;top:-6px;' ></i>
                </button>
            </div>
        </div>

                        </div>
<?php

if ($_REQUEST['id']) {//202

    $userId = $_GET['id'];
    //echo  "aaa=".$userId;
  }

 $events= $db-> prepare("SELECT *  FROM skills s
    
WHERE s.userName=$userId
ORDER BY id DESC");
  $events-> execute();
  $events_list= $events-> fetchALL(PDO::FETCH_ASSOC);
        foreach ($events_list as $row) {?>



                            <p class="card-text">
                           
   
    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius: 0px;">
   <?php echo $row["name"];?>
<?php }

  ?>
       </p>

<?php 

  ?>
  
             

           </div>
                        
             </div>





<!-- Modal: modalCart -->

<div class="modal fade" id="editSkills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <?php 

 if(isset($_POST["edit"]))  
 {  
$name=$_POST['name'];
echo $name;
/*$query = $connect->prepare("INSERT INTO skills (name) VALUES(?)");
$query->bindParam(1, $name, PDO::PARAM_STR);

if ($query->execute()) {
echo "başaraılı";
}else{
echo "hata";
}*/

$sql="INSERT INTO skills(name,userName ) VALUES ('$name','".$_SESSION['userID']."')";
     
$result=mysqli_query($connect,$sql);  
   if($result)
      {  
          echo "Text Inserted into Database <meta http-equiv='refresh' content='1'";  
        }  else{
        echo 'not inserted';
      }

      mysqli_free_result($result);
      mysqli_close($connect);
   }  
        ?>

 <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000"></input>
        <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="name" 
        placeholder="Say something about this image...">
    </textarea>
     <input type="submit" name="edit" value="Edit"></input>
     </form>

      </div>

<!--title and text -->
     
    </div>

  </div>


</div>

               </div>
<!--------------------------------------------------------------------------------------------------------------------->

                <div class="col-md-6 col-xs-12">
           <?php

if ($_REQUEST['id']) {//202

    $userId = $_GET['id'];
    //echo  "aaa=".$userId;
  }

  $events= $db-> prepare("SELECT *  FROM events e
    INNER JOIN categories c ON c.category_id = e.event_category_id
WHERE e.createdUser=$userId
ORDER BY event_id DESC");
  $events-> execute();
  $events_list= $events-> fetchALL(PDO::FETCH_ASSOC);
        foreach ($events_list as $row) {?>


                    <div class="card mb-4">
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

                             <p class="card-text"><?php echo mb_strimwidth($row["event_content"], 0,230,"...")  ?>
                             </p>

                          <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>" class="btn btn-primary">Read More →</a>
                        </div>
                        <div class="card-footer text-muted">
                           <span><a href="categories_list.php?category_id=<?php echo $row["category_id"];  ?>" title="<?php echo $row ["category_title"];  ?>"> <i class="mdi mdi-pound-box"></i><?php echo $row["category_title"]; ?></a></span>
                          <?php echo $row["event_date"]; ?>
                           
                        </div>
                    </div>
    
<?php }

  ?>
  
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        
                         <a class="navbar-brand" href="https://aybu.edu.tr/">
     <img src="images/<?php echo $setting_retrieve["site_logo"]; ?>" alt="Aybu-SIS" style="width: 90px;display: block;align-items: center;margin-left: 25px;padding:10px;border:1px solid #00c9ff;  ">
     </a>
                    </div>
                    <div class="card mb-4">
                      
                        
                                


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

                   

                         <div class="card mb-4" style="padding: 10px;">

                        <img src="img/slider-1.jpeg" class="card-img-top img-thumbnail" alt="">
                        <div class="card-body" style="padding: 10px;">
                        <div class="card-footer text-muted">
                            <div class="row">
                                 <div class="col-md-8" style="padding: 0px 0px 0px 10px;">
                                  CERTIFICATE AND COURSES
                          </div>
                          <div class="col-md-4" style="padding: 0px;">

                <button  type="button" class="btn "  data-toggle="modal" data-target="#editCertificate"><i class='fa fa-edit' style='font-size:18px;position: relative;top:-6px;' ></i>
                </button>
            </div>
        </div>

                        </div>

                      <?php

if ($_REQUEST['id']) {//202

    $userId = $_GET['id'];
    //echo  "aaa=".$userId;
  }

 $certificate= $db-> prepare("SELECT *  FROM certificate c
    
WHERE c.certfUser=$userId
ORDER BY id DESC");
  $certificate-> execute();
  $certificate_list= $certificate-> fetchALL(PDO::FETCH_ASSOC);
        foreach ($certificate_list as $row) {?>

                           <p class="card-text">
                           
   
    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-radius: 0px;">
   <?php echo $row["certificate"];?>
<?php }

  ?>
       </p>

           </div>
                        
             </div>





<!-- Modal: modalCart -->

<div class="modal fade" id="editCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <?php 

 if(isset($_POST["editCertificate"]))  
 {  
$certificate=$_POST['certificate'];
echo $certificate;

$sql="INSERT INTO certificate(certificate,certfUser) VALUES ('$certificate', '".$_SESSION['userID']."')";
     
$result=mysqli_query($connect,$sql);  
   if($result)
      {  
            echo "Text Inserted into Database <meta http-equiv='refresh' content='1'";  
        }  else{
        echo 'not inserted';
      }

      mysqli_free_result($result);
      mysqli_close($connect);
   }  
        ?>


 <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000"></input>
        <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="certificate" 
        placeholder="Say something about this image...">
    </textarea>
     <input type="submit" name="editCertificate" value="Edit"></input>
     </form>

      </div>

<!--title and text -->
     
    </div>

  </div>


</div>
                </div>


            </div>
        </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body></html>