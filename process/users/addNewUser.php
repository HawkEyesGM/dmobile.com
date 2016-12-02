<?
session_start();
// читаем из базы пользователей
include '../../db/config/config.php';
include '../../lib/functions/validation_func.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
$email = strip_tags(trim(htmlspecialchars($_POST["email"])));
$password = strip_tags(trim(htmlspecialchars($_POST['password'])));
$time= date('c');
// проверяем есть ли в базе такой емейл
$query="SELECT `email`
		FROM `users`
		WHERE email='".$email."';";
// отправляем запрос в базу
$res=mysqli_query($dbc, $query);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
if($row["email"]!=NULL){
	file_put_contents('../../db/logs/reg_log.txt', $time." email при регистрации совпал с существующим "."(".$email.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("Location: /?route=registration");
};
///////////////////////valid email&password//////////////////////////////
if (checkEmail($email) !=1){
	file_put_contents('../../db/logs/reg_log.txt', $time." Не пройдена проверка email "."(".$email.")"." IP ".$remote_ip." HOST ".$remote_host."\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("Location: /?route=registration");	
}elseif (checkPassword($password) !=1){
	file_put_contents('../../db/logs/reg_log.txt', $time." Не пройдена проверка пароля "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host."\n" ,FILE_APPEND);
	mysqli_close($dbc);
	header("Location: /?route=registration");	
}else{
	$pas = password_hash($password, PASSWORD_DEFAULT);
	$avatar = "stand_ava.jpg";
	$query = "INSERT INTO `users`( `email`, `password`, `avatar`)
		      VALUES ('".$email."','".$pas."','".$avatar."')";
	$res = mysqli_query($dbc, $query); 
	$_SESSION['auth'] = true;
	$_SESSION['name'] ="noname";
	$_SESSION['iduser'] = mysqli_insert_id($dbc);
	mysqli_close($dbc);	
	header("Location: /?route=user_profile");
	};
?>
