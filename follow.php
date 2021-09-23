<!-- Latest Post -->


<div class="row">
     
      <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;">
          <div class="sidebar widget" style="padding: 5px;background-color: #fff;">
              <h5 style="text-align: center;">Last Users</h5></br>

<?php
  $kullanicilar= $db-> prepare("SELECT * FROM kullanicilar ORDER BY id DESC LIMIT 3 ");
  $kullanicilar-> execute();
  $kullanicilar_list= $kullanicilar-> fetchALL(PDO::FETCH_ASSOC);

foreach ($kullanicilar_list as $row) {?>

              <ul  >
                <li style="margin-bottom: 10px;padding-bottom: 5px;">
                  <div class="row">
                    <div class="col-md-6 sidebar-thumb" style="    margin-right: 0px;">
                         <a href="singlePost.php?event_id= <?php echo $row["id"]; ?>" title="<?php echo $row["event_title"]; ?>">
            <img class="mr-3  rounded-circle " src="images/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["event_title"]; ?>" style="width:50px; height: 50px;padding: 0px !important;float:right;"></a>

                    </div><!-- .Sidebar-thumb -->
                    <div class="col-md-5 sidebar-content" style="padding: 0px;">
                         <span name="follow" class="card-title" style="font-size: 0.9vw;">

                          <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["kullanici_adi"]; ?>  </a></span>

                        </br>
                         <?php echo $row["department"]; ?>

                    </div><!-- .Sidebar-thumb -->
                   
                  </div>
                </li><!-- .Li ends here -->
              </ul><!-- .Ul ends here -->

 <?php  } ?>

          </div><!-- .Widget ends here -->

      </div><!-- .Col ends here -->
    
  </div><!-- .Row ends here -->

