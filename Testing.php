<?php 
session_start();

echo"Mai testing mei hu \n";
define('UPLOAD_DIR', 'saved_images/');
$file = UPLOAD_DIR . $_SESSION['img_name'] . '.jpeg';
echo($file);
#echo $file;
require 'connection.php';
$acc_num=$_SESSION['num'];
			$query = "select img_path from Account_Info where Account_Number ='$acc_num'";
			$retval = mysql_query($query);
			if(!$retval) {
				die('Could not query'.mysql_error());
			}
			echo "$query";
			$row = mysql_fetch_row($retval);
$imgpath=$row[0];
echo $imgpath;
$command = escapeshellcmd("br -gui -algorithm FaceRecognition -compare $imgpath $file");
$result = exec("$command",$retval);
var_dump($retval);
if(($retval[0]>1)){
	echo $retval[0];
	echo "Almost There";
	$_SESSION['validlogin']=1;
	header("Location:shop.php");
}
else{
	echo "Sorry";
	$_SESSION['successful_register']=2;
	header("Location:Account_login.php");
}

?>