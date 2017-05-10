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
$("#amt").mouseover(function(){
                           $("#pop-up2").show();
                         });
$("#amt").mouseout(function(){
                           $("#pop-up2").hide();
                         });
                                                 });
</script>
</head>
<body style="height: 100%">
<?php if($_SESSION['validlogin']==1){ ?>
<?php
	require 'connection.php';
	if (isset($_POST['acn'])){
			$_SESSION['acn']=$_POST['acn'];
			$_SESSION['amt']=$_POST['amt'];
			$amt = mysql_real_escape_string($_SESSION['amt']);
			$num = mysql_real_escape_string($_SESSION['num']);
			$query = "select Balance from Account_Info where Account_Number ='$num'";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			#echo "$query";
			$row = mysql_fetch_row($retval);
			//echo row[0];
			if(($_SESSION['num']!=$_POST['acn'])&&($amt<$row[0])){	
			header("Location:authnticate.php");	
			}
			else if($_SESSION['num']==$_POST['acn']){
				?><p style="font-size: 25px; vertical-align: middle; background-color: #E74C3C; text-align: center; margin: 0px !important;"><strong>Enter Different Account Number</strong><img src="Account_login_images/Repeat.png" class="img-rounded" alt="Cinque Terre" width="35" height="35"></p><?php
				unset($_SESSION['amt']);
				unset($_SESSION['acn']);
			}
		}

?>
<div class="DNP-container top">
	<a href="shop.php" class="DNP-logo">XYZ <span class="port">BANK</span></a>
	<div class="DNP-right toptext DNP-wide">We <span style="color:#ff0000;">Work</span> To <span style="color:#3498DB;">Serve</span> You</div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="shop.php"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="Account_login.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>	
 <div class="container">
 <div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			
			<!-- form starts -->
			<?php 
			if(($_SESSION['num']!=$_POST['acn'])&&($amt>$row[0])){
				?><p style="font-size: 25px; vertical-align: middle; background-color: #F1C40F; text-align: center; margin: 0px !important;"><strong>Not Enough Balance</strong><img src="Account_login_images/not enough.png" class="img-rounded" alt="Cinque Terre" width="120" height="100"></p><?php
				unset($_SESSION['amt']);
				unset($_SESSION['acn']);
			}
			?>
			<form role="form" action="Pay.php" id="login_form" method="post">
			<div class="form-group"><label>Select Language:</label><select id="voiceselection"></select></div>
			  	<div class="form-group"><button type="button" class="btn btn-primary"  onclick="responsiveVoice.speak($('#image').text(),$('#voiceselection').val());" value="Play" >
   				<span class="glyphicon glyphicon-play-circle"></span> 
				</button>
			    <label for="Acc" id="image">Account Number<span style="font-size: 12px; color: #FF0000;">(To Transfer<span class="glyphicon glyphicon-transfer"></span>)</span>:<span id="pop-up" style="position: absolute; display:none; "><img src="Account_login_images/sample-axis-bank-cash-deposit-slip-right.jpg" border="none" style="height: 275px;width: 550px;" /></span></label>
			    <input type="text" name="acn" maxlength="16" class="form-control" id="email" required>
			  	</div>
			  	<div class="form-group"><button type="button" class="btn btn-primary"  onclick="responsiveVoice.speak($('#amt').text(),$('#voiceselection').val());" value="Play" >
   				<span class="glyphicon glyphicon-play-circle"></span> 
				</button>
			    <label for="Acc" id="amt">Amount:<span id="pop-up2" style="position: absolute; display:none; "><img src="Account_login_images/1491302115_Money.png" border="none" style="height: 100px;width: 120px;" /></span></label>
			    <input type="number" name="amt" maxlength="16" class="form-control" id="email" required>
			  	</div>
			  	<div class="btn-group">
			    <!-- <a class="btn btn-primary" role="button" type="submit">Login</a> -->
			        <button type="submit" class="btn btn-default btn-sm">
          				<span class="glyphicon glyphicon-check" onclick="window.location='authnticate.php'"></span> Pay
        			</button>
        		</div>
			</form>
		</div>
</div>
	<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h4>
					<a href="shop.php">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>Go Back
					</a>
				</h4>
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
<?php } 
else {
	?>
	<div class="jumbotron">
	  	<p style="vertical-align: middle; text-align: center;"><strong>Illegal Entry</strong></p><center><img src="Account_login_images/Apps-Bad-Piggies-icon.png"  class="img-rounded" alt="Cinque Terre" width="100" height="100"></center>
	</div>
	<?php
}
?>
</body>
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
<?php}$_SESSION['false']=1;?>