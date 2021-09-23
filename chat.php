

<?php session_start();?>
<?php include 'header.php';?>
<head>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/chat.css">
</head>

<div id="wrapper">
	<center style="margin: 20px 0px;"> Welcome
<?php echo $_SESSION['username']; ?>
	</center>
	<div class="chat_wrapper">
		<div id="chat"></div>

		<form method="POST" id="messageFrm" action="">

			<div class="row">
				<div class="col-md-12">
			<textarea name="message" cols="30" rows="2" class="textarea" ></textarea>
			</div>
			
            </div>
		
		</form>
		
	</div>
	
</div>

	<script>
LoadChat();

setInterval(function(){
	LoadChat();
},1000); 

function LoadChat()
{
	$.post('handlers/messages.php?action=getMessages','kullanici_adi=<?=$_SESSION['username'];?>',function(response){
		

		var scrollpos = $('#chat').scrollTop();
		var scrollpos = parseInt(scrollpos)+520;
		var scrollHeight =$('#chat').prop('scrollHeight');


		$('#chat').html(response);
		

       if (scrollpos < scrollHeight ) {

        }else{
        	$('#chat').scrollTop($('#chat').prop('scrollHeight'));        
        }

	});
}

		$('.textarea').keyup(function(e){
			if (e.which==13) {
				$('form').submit();

				}
		});
		$('form').submit(function(){
		var message = $('.textarea').val();
		$.post('handlers/messages.php?action=sendMessage&message='+message,function(response){
			if (response==1) {
				LoadChat();
				document.getElementById('messageFrm').reset();
			}

		});
		return false;
	});
	</script> 
	
</body>
</html>