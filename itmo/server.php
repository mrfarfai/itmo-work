<?php 
include "db.php";

session_start();

function login() {
	global $conn;
	$email = htmlspecialchars($_POST['email']);
	$pass = htmlspecialchars($_POST['pass']);

	$q = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' and `password` = '$pass';");
	if(mysqli_num_rows($q) > 0) {
		$res = mysqli_fetch_assoc($q);
		$_SESSION['user'] = md5($res["id"]);
		echo "ok";
	}
	else {
		echo "no";
	}

}


function register() {
	global $conn;
	$name = htmlspecialchars($_POST['name']);
	$surname = htmlspecialchars($_POST['surname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$phone = htmlspecialchars($_POST['phone']);
	$email = htmlspecialchars($_POST['email']);
	$pass = htmlspecialchars($_POST['pass']);
	$university = htmlspecialchars($_POST['university']);
	$city = htmlspecialchars($_POST['city']);

	$q = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email';");
	if(mysqli_num_rows($q) > 0) {
		echo "no";
		return;
	}

	mysqli_query($conn, "INSERT INTO `user` (`name`, `surname`, `lastname`, `phone`, `email`, `password`, `university`, `city`) VALUES ('$name', '$surname', '$lastname', '$phone', '$email', '$pass', $university, $city);");
	

	$q = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");
	$res = mysqli_fetch_assoc($q);
	$_SESSION['user'] = md5($res["id"]);
	echo "ok";
}

function zayavka(){
	global $conn;
	$fio = htmlspecialchars($_POST['fullName']);
	$university = htmlspecialchars($_POST['organizationName']);
	$doclad_name = htmlspecialchars($_POST['presentationTitle']);
	$soavtor = htmlspecialchars($_POST['authorsList']);
	$rukovoditel = htmlspecialchars($_POST['supervisor']);
	$conf = htmlspecialchars($_POST['conferenceName']);
	$conf_napr = htmlspecialchars($_POST['fieldConference']);
	$language = htmlspecialchars($_POST['language']);

	$time = time();

	$tezis_doclad = "docs/abstract_".$time.".docx";
	$statya = "";

	move_uploaded_file($_FILES["abstract"]["tmp_name"], $tezis_doclad);
	if (isset($_FILES['statya'])) {
    	if ($_FILES['statya']['error'] == UPLOAD_ERR_OK) {
			$statya = "docs/statya_".$time.".docx";
			move_uploaded_file($_FILES["statya"]["tmp_name"], $statya);
		}
	}

	mysqli_query($conn, "INSERT INTO `zayavka` (`fio`, `university`, `doclad_name`,`soavtor`,`rukovoditel`,`conf`, `conf_napr`, `language`, `tezis_doclad`, `statya`, `reg_date`) VALUES ('$fio', '$university', '$doclad_name', '$soavtor', '$rukovoditel', '$conf', '$conf_napr', '$language', '$tezis_doclad', '$statya', NOW());");

	header("Location: /table.php");
}


$type = $_POST['type'];

if($type == "login") login();
if($type == "register") register();
if(isset($_FILES['abstract'])) zayavka();

?>