<?php include 'header.php';

$kullanicilar = $db->prepare("SELECT * FROM kullanicilar
  WHERE id=?");

$kullanicilar->execute(array($id));
$photo_retrieve =$kullanicilar->fetch(PDO::FETCH_ASSOC);
 ?>


<div class="container">
		<div class="row profile">
			<div class="col-12 col-md-3">
				<div class="profile-sidebar">
					<?php
          $profile_photo= $db-> prepare("SELECT * FROM profile_photo
        INNER JOIN kullanicilar ON kullanicilar.id = profile_photo.user_id
        WHERE user_id=? ORDER BY photo_id DESC");
          $profile_photo-> execute(array($id));
          $photo_list= $kullanicilar-> fetchALL(PDO::FETCH_ASSOC);

        foreach ($photo_list as $row) {?>
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						

						<a href="profile.php?photo_id= <?php echo $row["photo_id"]; ?>" >
            <img class="card-img-top" src="images/<?php echo $row["photo"]; ?>" ></a>


						<img alt="" class="img-responsive" src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg">

					</div><!-- END SIDEBAR USERPIC -->

					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							Marcus Doe
						</div>
						<div class="profile-usertitle-job">
							Developer
						</div>
					</div><!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<button class="btn btn-success btn-sm" type="button">Follow</button> <button class="btn btn-danger btn-sm" type="button">Message</button>
					</div><!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav" style="display: block !important;">
							<li class="active">
								<a href="#"><i class="glyphicon glyphicon-home"></i> Overview</a>
							</li>
							<li>
								<a href="#"><i class="glyphicon glyphicon-user"></i> Account Settings</a>
							</li>
							<li>
								<a href="#" target="_blank"><i class="glyphicon glyphicon-ok"></i> Tasks</a>
							</li>
							<li>
								<a href="#"><i class="glyphicon glyphicon-flag"></i> Help</a>
							</li>
						</ul>
					</div>
<!-- END MENU -->

        
				</div>
        
				<center>
					<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
				</center><br>




