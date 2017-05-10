<?php session_start();
//echo $_SESSION['validlogin'];
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
</head>
<body style="height: 100%; width: 100%;">
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
    <li><a href="logout_acc.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
  </div>
</nav>	
	<div class="jumbotron">
	  	<p style="vertical-align: middle; text-align: center;"><img src="Account_login_images/welcome.png" class="img-rounded" alt="Cinque Terre" width="80" height="80"><strong>Welcome to Internet Banking Interface</strong></p>
	</div>
	<div class="row" style="margin: 0px !important; margin-bottom: 30px !important;">
	<div class="col-md-3"></div>
	<div class="col-md-4"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="Account_login_images/images.jpg" class="img-rounded" alt="Cinque Terre" width="100" height="100" onclick="imageClick('Pay.php')"></div>

 	<div class="col-md-4"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="Account_login_images/money-icon.png" class="img-rounded" alt="Cinque Terre" width="100" height="100" onclick="imageClick('balance.php')"></div>
 	<div class="col-md-2"></div>
 	</div>
 	<div class="row" style="margin: 0px !important; margin-top: 50px !important;">
 	<div class="col-md-3"></div>
	<div class="col-md-4"><button type="button" class="btn btn-default" onclick="window.location='Pay.php'">Transfer</button>
 	</div>
 	<div class="col-md-4"><button type="button" class="btn btn-default" onclick="window.location='balance.php'">Check Balance</button>
 	</div>
	<div class="col-md-2"></div>
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
function imageClick(url) {
    window.location = url;
}

function bigImg(x) {
    x.style.height = "140px";
    x.style.width = "170px";
}

function normalImg(x) {
    x.style.height = "100px";
    x.style.width = "100px";
}
</script>
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