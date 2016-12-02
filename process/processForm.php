<?
session_start();
include '../db/config/config.php';
include '../lib/functions/validation_func.php';
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
$email =trim(htmlspecialchars(strip_tags($_GET["loginForm"])));
$password = trim(htmlspecialchars(strip_tags($_GET["passwordForm"])));
$time= date('c');
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
$query="SELECT `email`, `password`, `id`, `name`
		FROM `users`
		WHERE email='".$email."';";
$res=mysqli_query($dbc, $query);
$res=mysqli_fetch_assoc($res);
if(checkEmail($email) != 1){
	file_put_contents('../db/logs/auth_log.txt', $time." Неверный ввод email "."(".$email.")"." IP ".$remote_ip." HOST ".$remote_host."\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("Location: /");	
}elseif(checkPassword($password) != 1){
	file_put_contents('../db/logs/auth_log.txt', $time." Неверный ввод пароля "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host."\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("Location: /");	
}elseif($res["email"]==$email&&password_verify($password,$res["password"])){
	$_SESSION['auth'] = true;
	$_SESSION['iduser'] = $res["id"];
	$_SESSION['name'] = $res["name"];
	mysqli_close($dbc);
	header("location: /");	
}else{
	file_put_contents('../db/logs/auth_log.txt', $time." Не пройдена проверка email или пароля "."(".$email.")"."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host."\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("location: /");
} 
?>
<!-- Обработка авторизации -->


