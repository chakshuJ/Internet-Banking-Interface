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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body style="height: 100%">
<?php if($_SESSION['validlogin']==1){ ?>
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
		<center><label>Select Language:</label><select id="voiceselection"></select></center>
	  	<p style="vertical-align: middle; text-align: center;"><img src="Account_login_images/money.png" class="img-rounded" alt="Cinque Terre" width="80" height="80"><strong>Your Bank Account Balance is:</strong></p>
	  	<?php
		require 'connection.php';
		$dcc_num = mysql_real_escape_string($_SESSION['num']);
		$query = "select Balance from Account_Info where Account_Number ='$dcc_num'";
		$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
		$row = mysql_fetch_row($retval);	
		?> <center><button type="button" class="btn btn-primary"  onclick="responsiveVoice.speak($('#bal').text(),$('#voiceselection').val());" value="Play" ><span class="glyphicon glyphicon-play-circle"></span></button><p id="bal"><i class="fa fa-inr" style="font-size:22px"></i><strong><?php echo " ".$row[0]; ?></strong></p></center> <?php
		?>
	</div>
	<div class="container text-center">
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
<script src="print.js"></script>

<div class="scroll-to-top" style="display: block;">
<a href="#" title="Scroll to top">
	<span class="sr-only">Top</span>
</a>
</div>

<?php } 
else {
	?>
	<div class="jumbotron">
	  	<p style="vertical-align: middle; text-align: center;"><strong>Illegal Entry</strong></p><center><img src="Account_login_images/Apps-Bad-Piggies-icon.png"  class="img-rounded" alt="Cinque Terre" width="100" height="100"></center>
	</div>
	<?php
}
?>
<script>
        //Populate voice selection dropdown
        var voicelist = responsiveVoice.getVoices();
        var vselect = $("#voiceselection");
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });
</script>
<script src='//vws.responsivevoice.com/v/e?key=Ywkstj4M'></script>
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
<?php}?>