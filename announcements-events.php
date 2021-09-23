
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

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/announcements-events.css" rel="stylesheet">


<section class="two-column-list mb-sm-5 pr-lg-3 container-fluid" id="two-column-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pr-0">
                <section aria-label="Announcements" class="announcements">
                    <h2 class="font-weight-bold border-bottom pb-3 mt-3 mb-0 pr-5">Announcements</h2>
 <?php

     $announcements= $db-> prepare("SELECT * FROM announcements ORDER BY ann_date DESC LIMIT 3");
  $announcements->execute();
  $announcements_list=$announcements->fetchALL(PDO::FETCH_ASSOC);

  foreach ($announcements_list as $row) {?>

                    <div class="announcement-slider border-r-xs-0 border-r position-relative">
                        <div>
                            <ul class="nolist list-unstyled position-relative mb-0 px-lg-5 pt-lg-5">
                                <li class="border-bottom pb-3 mt-3">
                                    <span class="meta text-uppercase"><?php echo $row["ann_date"]; ?></span>
                                    <h3 class="font-weight-bold mt-0">
                                       <a href="singlePost.php?event_id= <?php echo $row["event_id"]; ?>"></a> <?php echo $row["ann_title"]; ?>  </a>
                                            
                                        </a>
                                    </h3>
                                    <p class="m-0 post_intro"><?php echo mb_strimwidth($row["ann_content"], 0,230,"...")  ?></p>
                                </li>
                                
                              </ul>
                              <?php }

    ?>
           
                            <a class="all pos-stat text-uppercase ml-lg-5" href="https://www.solodev.com/news/">All announcements
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                            <div class="left-right-arrows pr-lg-5">
                                <button class="prev-arrow-announcement" type="button"><i class="fa fa-chevron-left"></i></button>
                                <button class="next-arrow-announcement" type="button"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
   
             <div>
                            <ul class="nolist list-unstyled position-relative mb-0 px-lg-5 pt-lg-5">
                                <li class="border-bottom pb-3 mt-3">
                                    <span class="meta text-uppercase">05/10/2019</span>

                                    <h3 class="font-weight-bold mt-0">
                                        <a href="https://www.solodev.com/news/solodev-earns-national-recognition-as-marketing-and-commerce-cms-leader.stml">
                                            Solodev Earns National Recognition as Marketing and Commerce CMS Leader
                                        </a>
                                    </h3>
                                    <p class="m-0 post_intro">Solodev has achieved rigorous Marketing & Commerce competency in recent listing from Amazon Web Services.</p>
                                </li>
                                <li class="border-bottom pb-3 mt-3">
                                    <span class="meta text-uppercase">05/10/2019</span>

                                    <h3 class="font-weight-bold mt-0">
                                        <a href="https://www.solodev.com/news/solodev-helps-power-american-dairy-association-north-easts-online-passions.stml">
                                            Solodev Helps Power American Dairy Association North East's Online Passions
                                        </a>
                                    </h3>

                                    <p class="m-0 post_intro">The newly redesigned website combines three legacy organizations into one user-optimized website for the AWS Cloud.</p>
                                </li>
                                <li class="border-bottom pb-3 mt-3">
                                    <span class="meta text-uppercase">05/10/2019</span>
                                    <h3 class="font-weight-bold mt-0">
                                        <a href="http://www.marketwired.com/press-release/solodev-recognized-as-number-one-high-performer-on-g2-crowds-summer-2017-web-content-2225641.htm">
                                            Solodev Recognized as Number One 
                                        </a>
                                    </h3>
                                    <p class="m-0 post_intro">Web experience platform provider ranked among global content management software companies based largely on user ratings</p>
                                </li>
                            </ul>
                            <a class="all pos-stat text-uppercase" href="/announcements/">All announcements
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                            <div class="left-right-arrows pr-lg-5">
                                <button class="prev-arrow-announcement" type="button"><i class="fa fa-chevron-left"></i></button>
                                <button class="next-arrow-announcement" type="button"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6 pl-0">
                <section class="events-section pl-lg-3" aria-label="Events">
                    <h2 class="font-weight-bold border-bottom pb-3 mt-3 pl-lg-5 mb-0">Events</h2>
                    <div class="events p-lg-5">
                        <div class="events-block">
                            <ul class="nolist list-unstyled position-relative mb-0 px-lg-3">
                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">May
                                            <span>10</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                CMS City Exhibition
                                            </a>
                                        </h3>
                                        <p>
                                            10:30 PM
                                        </p>
                                    </div>
                                </li>
                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">May
                                            <span>31</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                Content Management Expo
                                            </a>
                                        </h3>
                                        <p>
                                            6:30 PM
                                        </p>
                                    </div>
                                </li>
                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">June
                                            <span>07</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                Techolocon
                                            </a>
                                        </h3>
                                        <p>
                                            8:30 AM
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a class="all pos-stat text-uppercase ml-lg-5" href="/calendar/">All events
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                            <div class="left-right-arrows second">
                                <button class="prev-arrow-events" type="button"><i class="fa fa-chevron-left"></i></button>
                                <button class="next-arrow-events" type="button"><i class="fa fa-chevron-right"></i></button>
                            </div>

                        </div>
                        <div class="events-block">
                            <ul class="nolist list-unstyled position-relative mb-0 px-lg-3">

                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">June
                                            <span>15</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                Cloud City Expo
                                            </a>
                                        </h3>
                                        <p>
                                            12PM
                                        </p>
                                    </div>
                                </li>
                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">June
                                            <span>23</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                Solodev at the Education Conference
                                            </a>
                                        </h3>
                                        <p>
                                            10:30
                                        </p>
                                    </div>
                                </li>
                                <li class="border-bottom d-flex align-items-center">
                                    <div class="events-date text-uppercase text-center">
                                        <a class="text-white" href="#">July
                                            <span>25</span>
                                        </a>
                                    </div>
                                    <div class="d-inline-block pl-3 event-li">
                                        <h3 class="font-weight-bold mt-0">
                                            <a href="#">
                                                AWS Challenge Conference
                                            </a>
                                        </h3>
                                        <p>
                                            9:15AM
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a class="all text-uppercase ml-lg-5" href="/calendar/">All events
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </a>
                            <div class="left-right-arrows second">
                                <button class="prev-arrow-events" type="button"><i class="fa fa-chevron-left"></i></button>
                                <button class="next-arrow-events" type="button"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/announcements-events.js"></script>
</body>
</html>