<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
	<div id="google_translate_element"></div><script type="text/javascript">
	function googleTranslateElementInit() {
  	new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<title>Payment Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#image").mouseover(function(){
                           $("#pop-up").show();
                         });
$("#image").mouseout(function(){
                           $("#pop-up").hide();
                         });
$("#pass").mouseover(function(){
                           $("#pop-up2").show();
                         });
$("#pass").mouseout(function(){
                           $("#pop-up2").hide();
                         });
                                                 });
</script>

</head>
<body style="height: 100%">
<?php
$validform = 0;
	require 'connection.php';
	if (isset($_POST['num'])) {
		if(!($_POST['core_password']=="")){
			$acc_num = mysql_real_escape_string($_POST['num']);
			$_SESSION['num']=$_POST['num'];
			$pass = mysql_real_escape_string($_POST['core_password']);
			$query = "select Password from Account_Info where Account_Number ='$acc_num'";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			#echo "$query";
			$row = mysql_fetch_row($retval);
			$password = $row[0];
			if($pass==$password) {
				$validform=10;
				$_SESSION['validlogin']=1;
				header("Location:shop.php");
				// echo "testing.php";
				exit;	
			}	
			else {
				$validform = 1;
				?><p style="font-size: 25px; vertical-align: middle; background-color: #E74C3C; text-align: center; margin: 0px !important;"><strong>Wrong Password</strong><img src="Account_login_images/Repeat.png" class="img-rounded" alt="Cinque Terre" width="35" height="35"></p><?php
			} 
		}
		else{
			$_SESSION['num']=$_POST['num'];
			header("Location:Camera.php");
			 //echo "camera.php";
		}		
	}

?>
<div class="container-fluid">
	<div class="row">
		<div class="jumbotron">
			<center><h1>Login</h1><img src="Account_login_images/Vault-icon.png" class="img-rounded" alt="Cinque Terre" width="100" height="100"></center> 
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php if($_SESSION['successful_register']==2){
				?><p style="font-size: 25px; vertical-align: middle; background-color: #E74C3C; text-align: center;"><strong>Invalid Authentication</strong><img src="Account_login_images/user-delete-icon.png" class="img-rounded" alt="Cinque Terre" width="35" height="35"></p><?php
			}?>
		</div>
		<div class="col-md-2"></div>	
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			
			<!-- form starts -->
			
			<form role="form" action="Account_login.php" id="login_form" method="post">
			<div class="form-group"><label>Select Language:</label><select id="voiceselection"></select></div>
			  	<div class="form-group"><button type="button" class="btn btn-primary"  onclick="responsiveVoice.speak($('#image').text(),$('#voiceselection').val());" value="Play" >
   				<span class="glyphicon glyphicon-play-circle"></span> 
				</button>
			    <label for="Acc" id="image">Account Number:<span id="pop-up" style="position: absolute; display:none; "><img src="Account_login_images/Account-Number-on-Check.gif" border="none" style="height: 150px;width: 400px;" /></span></label>
			    <input type="text" name="num" maxlength="16" class="form-control" id="email" required>
			  	</div>
			 	<div class="form-group">
			    <label for="pwd" id="pass">Password:</label><span id="pop-up2" style="position: absolute; display:none; "><img src="Account_login_images/Key-Lock-icon.png" class="img-rounded" alt="Cinque Terre" width="60" height="60"/></span>
			    <input type="password" name="core_password" class="form-control" id="pwd">
			 	</div>
			  	<div class="checkbox">
    				<label><input type="checkbox"> Remember me</label>
  			  	</div>
			  	<div class="btn-group">
			    <!-- <a class="btn btn-primary" role="button" type="submit">Login</a> -->
			            <button type="submit" class="btn btn-default btn-sm">
          					<span class="glyphicon glyphicon-check"></span> Submit
        				</button>
			    <button type="submit" class="btn btn-default btn-sm" onClick="camera()"><span class="glyphicon glyphicon-camera"></span> Camera</button>
			  	</div>
			</form>

			<!-- form ends -->

		</div>
		<div class="col-md-4"></div>
	</div>

</div>

<script>
        //Populate voice selection dropdown
        var voicelist = responsiveVoice.getVoices();
        var vselect = $("#voiceselection");
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });
</script>
<script src='//vws.responsivevoice.com/v/e?key=Ywkstj4M'></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.min.js"></script>
</body>
<?php
	$_SESSION['successful_register']=1;
?>

<footer style="position: absolute;bottom: 0; height: 50px; width:100%;">
	<div class="panel-info">
		<div class="panel-heading">
			<span>
				<p>
All copyrights reserved | IIITD&M Kancheepuram, Chennai
				</p>
			</span>
		</div>
	</div>
</footer>
</html>
<?php ob_end_flush(); ?>