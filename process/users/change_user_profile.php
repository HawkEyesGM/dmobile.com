<?
session_start();
include '../../lib/functions/validation_func.php';
include '../../db/config/config.php';

$time= date('c');
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
$id=($_SESSION['iduser']); //получаем айди юзера из сессии
$pathava = $_POST['name_ava']; //старая картинка из базы $user['avatar'];
$avatar = $_POST['name_ava'];
$name = strip_tags(trim(htmlspecialchars($_POST['name'])));
$sec_name = strip_tags(trim(htmlspecialchars($_POST['sec_name'])));
$phone = strip_tags(trim(htmlspecialchars($_POST['phone'])));
$email = strip_tags(trim(htmlspecialchars($_POST['email'])));
$password = strip_tags(trim(htmlspecialchars($_POST['password'])));

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
$query="SELECT `avatar`
		FROM `users`
		WHERE id=".$id.";";
$res=mysqli_query($dbc, $query);
$user=mysqli_fetch_assoc($res);
//если не буквы '/[^а-яёa-z]/iu' то вернуть тру и записать логи
if(checkName($name)){
	file_put_contents('../../db/logs/reg_log.txt', $time."Введено некорректное имя при записи в профиль "."(".$name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
	header("Location: /?route=user_profile");
	die();
}
if(checkName($sec_name)){
	file_put_contents('../../db/logs/reg_log.txt', $time."Введена некорректная фамилия при записи в профиль "."(".$sec_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
	header("Location: /?route=user_profile");
	die();
}
if(checkPhone($phone)==false){
	file_put_contents('../../db/logs/reg_log.txt', $time."Введен некорректный номер телефона при записи в профиль "."(".$phone.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
	header("Location: /?route=user_profile");
	die();
}
if(checkEmail($email) == false){
	file_put_contents('../../db/logs/reg_log.txt', $time."Введен некорректный email	при записи в профиль "."(".$email.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
	header("Location: /?route=user_profile");
	die();
}
// if(checkPassword($password) == false){
// 	file_put_contents('../../db/logs/reg_log.txt', $time."Введен некорректный пароль
// 		при записи в профиль "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
// 	header("Location: /my_project_online_shop/?route=user_profile");
// die();
// }else{
// 	$password=password_hash($znach, PASSWORD_DEFAULT);
// }
if((int)$_FILES['avatar']["error"] === 0){		
	$mimeType=$_FILES['avatar']["type"];
	$extFile=explode(".", $_FILES['avatar']["name"]);		
	$extFile=$extFile[count($extFile)-1];

	if(($mimeType == "image/gif" && $extFile == "gif") || ($mimeType == "image/jpeg" && $extFile == "jpg") ||
		($mimeType == "image/jpeg" && $extFile == "jpeg") || ($mimeType == "image/bmp" && $extFile == "bmp") ||
		($mimeType == "image/png" && $extFile == "png")){
		$name_ava=md5(microtime().uniqid().rand(0,9999));
		move_uploaded_file($_FILES['avatar']["tmp_name"], "../../images/users_avatars/".$name_ava.".".$extFile);
		$avatar = $name_ava.".".$extFile;
		if($user['avatar'] !== 'stand_ava.jpg' ){
		unlink("../../images/users_avatars/$pathava");
		}		
	} 
}

$query="UPDATE `users` 
		SET `name`='".$name."',`sec_name`='".$sec_name."',`phone`='".$phone."',`email`='".$email."',`avatar`='".$avatar."' 
		WHERE id=".$id.";";
$res=mysqli_query($dbc, $query);

$_SESSION['name'] = $name;

mysqli_close($dbc);
header("Location: /?route=user_profile");
die();
?>
