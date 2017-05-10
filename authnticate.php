<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
	<div id="google_translate_element"></div><script type="text/javascript">
	function googleTranslateElementInit() {
  	new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<title>IIITD&M DNP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="print.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#image").mouseover(function(){
                           $("#pop-up").show();
                         });
$("#image").mouseout(function(){
                           $("#pop-up").hide();
                         });
$("#tcn").mouseover(function(){
                           $("#pop-up1").show();
                         });
$("#tcn").mouseout(function(){
                           $("#pop-up1").hide();
                         });
$("#amt").mouseover(function(){
                           $("#pop-up2").show();
                         });
$("#amt").mouseout(function(){
                           $("#pop-up2").hide();
                         });
$("#acn").mouseover(function(){
                           $("#pop-up3").show();
                         });
$("#acn").mouseout(function(){
                           $("#pop-up3").hide();
                         });
});
</script>
</head>
<body style="height: 100%;">
<?php if($_SESSION['validlogin']==1){ ?>
<?php
$validform = 0;
	require 'connection.php';
		if(!($_POST['core_password']=="")){
			$pass = mysql_real_escape_string($_POST['core_password']);
			$dcc_num = mysql_real_escape_string($_SESSION['num']);
			$query = "select Password from Account_Info where Account_Number ='$dcc_num'";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			#echo "$query";
			$row = mysql_fetch_row($retval);
			$password = $row[0];
			if($pass==$password) {
			$acc_num = mysql_real_escape_string($_SESSION['acn']);
			$amt = mysql_real_escape_string($_SESSION['amt']);
			$query = "select Account_Number from Account_Info where Account_Number ='$acc_num'";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			//echo "$query";
			$row = mysql_fetch_row($retval);
			$query = "update Account_Info set Balance=Balance+$amt
						where Account_Number=$acc_num;";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			echo "$query";
			$query = "update Account_Info set Balance=Balance-$amt
						where Account_Number=$dcc_num;";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
				}
				unset($_SESSION['acn']);
				unset($_SESSION['amt']);
				header("Location:process_complete.php");
			}
			else{
				?><p style="font-size: 25px; vertical-align: middle; background-color: #E74C3C; text-align: center; margin: 0px !important;"><strong>Wrong Password</strong><img src="Account_login_images/Repeat.png" class="img-rounded" alt="Cinque Terre" width="35" height="35"></p><?php
			}
		}

?>
<div class="DNP-container top">
	<a href="shop.php" class="DNP-logo">XYZ <span class="port">BANK</span></a>
	<div class="DNP-right toptext DNP-wide">We <span style="color:#ff0000;">Work</span> To <span style="color:#3498DB;">Serve</span> You</div>
</div>

<nav class="navbar navbar-inverse" style="margin-bottom:0px !important; ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="shop.php"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="Account_login.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
	<div class="jumbotron">
	  	<p style="vertical-align: middle; text-align: center;"><strong>Complete Your Payment</strong><img src="Account_login_images/lock-unlock-icon.png" class="img-rounded" alt="Cinque Terre" width="65" height="65"></p>
	</div>	
 <div class="container">
 	<center>
 	<?php
	if($_SESSION['acn']==""){
		?><p style="font-size: 25px; vertical-align: middle; background-color: #F1C40F; text-align: center; margin: 0px !important; width: 450px;"><img src="Account_login_images/unchecked.png" border="none" style="height: 50px;width: 50px;" /><strong>Enter Valid Details. <a href="Pay.php" style="color: #DE2916;"><span class="glyphicon glyphicon-circle-arrow-left"></span>Go Back</a></strong></p><?php
	}?>
 	<form>
 		<div class="row">
	 		<div class="col-md-4"></div>
	 		<div class="col-md-7">
	 			<div class="col-md-4">
	 				<label><p id="tcn">Account Tranferring To: </label></p>
	 			</div>
	 			<div class="col-md-2">
	 			<?php echo $_SESSION['acn']; ?><span id="pop-up1" style="position: absolute; display:none; z-index: 2;"><img src="Account_login_images/sample-axis-bank-cash-deposit-slip-right.jpg" border="none" style="height: 275px;width: 550px;" /></span>
	 			</div>
	 		</div>
 		</div>

 		<div class="row">
	 		<div class="col-md-4"></div>
	 		<div class="col-md-7">
	 			<div class="col-md-4">
	 				<label><p id="amt">Amount: </label></p>
	 			</div>
	 			<div class="col-md-2">
	 			<?php echo $_SESSION['amt']; ?><span id="pop-up2" style="position: absolute; display:none; z-index: 3;"><img src="Account_login_images/1491302115_Money.png" border="none" style="height: 100px;width: 120px;" /></span>
	 			</div>
	 		</div>
 		</div>

 		<div class="row">
	 		<div class="col-md-4"></div>
	 		<div class="col-md-7">
	 			<div class="col-md-4">
	 				<label><p id="acn"><strong>Your Account Number: </strong></label></p>
	 			</div>
	 			<div class="col-md-4">
	 			<?php echo "XXXX XXXX XXXX ".$_SESSION['num'][12].$_SESSION['num'][13].$_SESSION['num'][14].$_SESSION['num'][15]; ?><span id="pop-up3" style="position: absolute; display:none; "><img src="Account_login_images/Account-Number-on-Check.gif" border="none" style="height: 150px;width: 400px; z-index: 2;" /></span>
	 			</div>
	 		</div>
 		</div>
 		<br>
 	</form>
 	</center>
 	<div class="col-md-4"></div>
 	<div class="col-md-4">
 	<form role="form" action="authnticate.php" id="login_form" method="post">
 		<label for="Acc" id="image">IPIN:<span id="pop-up" style="position: absolute; display:none; "><img src="Account_login_images/Key-Lock-icon.png" border="none" style="height: 50px;width: 50px;" /></span></label>
 		<input type="password" name="core_password" class="form-control" id="pwd" required>
 		<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-check"></span> Submit</button>
 		<strong><hr width="200" align="center" style="border-color: #5D6D7E;"></strong>
 		<center><p><strong>Or</strong></p></center>
 		<strong><hr width="200" align="center" style="border-color: #5D6D7E;"></strong>
 		<button type="submit" class="btn btn-primary btn-sm" onclick="window.location='Camera1.php'"><span class="glyphicon glyphicon-camera"></span> Camera</button>
 	</form>
 	</div>
</div>	
	<div class="row" style="margin: 0px !important;">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h4>
					<a href="Pay.php">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>Go Back
					</a>
				</h4>
			</div>
			<div class="col-md-4"></div>
	</div>
<script src="print.js"></script>


<?php
 }
else {
	?>
	<div class="jumbotron">
	  	<p style="vertical-align: middle; text-align: center;"><strong>Illegal Entry</strong></p><center><img src="Account_login_images/Apps-Bad-Piggies-icon.png"  class="img-rounded" alt="Cinque Terre" width="100" height="100"></center>
	</div>
	<?php
}
?>
<footer style="position: relative;bottom: 0; height: 50px; width:100%;">
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
</body>

</html>
<?php}
?>