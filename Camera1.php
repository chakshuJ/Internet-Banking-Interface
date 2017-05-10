<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<div id="google_translate_element"></div><script type="text/javascript">
	function googleTranslateElementInit() {
  	new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Cam Snap</title>
<script type="text/javascript" src="webcam.js"></script>
<script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {
    document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><button onclick="SaveSnap();" style="font-size : 20px;" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Save Picture</button>';
});
}
function ShowCam(){
Webcam.set({
width: 320,
height: 240,
image_format: 'jpeg',
jpeg_quality: 100
});
Webcam.attach('#my_camera');
}
function SaveSnap(){
    document.getElementById("loading").innerHTML="Saving, please wait...";
    var file =  document.getElementById("base64image").src;
    var formdata = new FormData();
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
    ajax.open("POST", "saveimage.php");
    ajax.send(formdata);
}
function uploadcomplete(event){
    document.getElementById("loading").innerHTML="";
    var image_return=event.target.responseText;
    var showup=document.getElementById("uploaded").src=image_return;
    window.location.replace("cam_auth1.php");
}
window.onload= ShowCam;
</script>
<style type="text/css">
.container{display:inline-block;width:320px;}
#Cam{background:rgb(200,200,200);}#Prev{background:rgb(200,200,200);}#Saved{background:rgb(200,200,200);}
</style>
</head>
<body bgcolor="#778899">
<?php $name=uniqid(); $_SESSION['img_name']=$name;
?>
<div class="" style="height: 40px; width: 100%; padding:0.01em 16px;margin-top:16px!important;margin-bottom:16px!important color:#fff!important;background-color:#f44336!important"><p style="margin-top: 10px; font-size: large;"><strong>Take a clear picture of you</strong></p></div>
<div class="col-md-4" id="Cam" style="font-size : 20px;"><b>Webcam Preview...<img src="Account_login_images/camera.jpeg" alt="camera" style="width:50px;height:40px;"></b>
    <div id="my_camera"></div><form><button type="button" class="btn btn-info" value="Snap It" onClick="take_snapshot()" style="font-size : 20px;">Click <span class="glyphicon glyphicon-hand-up"></span></button></form>
</div>
<div class="col-md-4" id="Prev" style="font-size : 20px;">
    <b>Picture Preview...</b><div id="results"></div>
</div>
<div class="col-md-4" id="Saved" style="font-size : 20px;">
    <b>Saved <span class="glyphicon glyphicon-floppy-saved"></span></b><img id="uploaded" src=""/><span id="loading"></span>
</div>
<div class="row" style="padding-top: 25%">
<div class="col-md-4"></div>
<div class="col-md-4">
	<h4>
		<a href="Account_login.php">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>
				Back to 	Home page
		</a>
	</h4>
</div>				
</div>
</body>
</html>