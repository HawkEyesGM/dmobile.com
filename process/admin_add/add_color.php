<link rel="stylesheet" href="../../static/css/style.css">
<div class="regBack">
	<div class="newReg">
		<div id ="close"><a href="/?route=admin">Закрыть</a></div>
	<h1>Добавление нового цвета товара</h1><br><br>
	<form action="add_color.php" method="POST" enctype="multipart/form-data">
		Добавить название нового цвета:<br>
		(Название латиницей или кириллицей)<br>
		<input type="text" name="color_name" ><br><br>
		Добавить изображение нового цвета:<br>
		(Изображение в формате 'png')<br><br>
		<input type="file" name="color_img" value=""><br><br>		
		<input type="submit" name="new_color" value="Сохранить">
	</form>	
	</div>
</div>

<?
include '../../db/config/config.php';
include '../../lib/functions/validation_func.php';
$time= date('c');
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
if(isset($_POST['new_color'])){
	$color_name=$_POST['color_name'];
	if((int)$_FILES['color_img']["error"] === 0){		
		$mimeType=$_FILES['color_img']["type"];
		$extFile=explode(".", $_FILES['color_img']["name"]);		
		$extFile=$extFile[count($extFile)-1];
		if(($mimeType == "image/gif" && $extFile == "gif") || ($mimeType == "image/jpeg" && $extFile == "jpg") ||
			($mimeType == "image/jpeg" && $extFile == "jpeg") || ($mimeType == "image/bmp" && $extFile == "bmp") ||
			($mimeType == "image/png" && $extFile == "png")){
			$name_ava=md5(microtime().uniqid().rand(0,9999));
			$color_img = $name_ava.".".$extFile;
			move_uploaded_file($_FILES['color_img']["tmp_name"], "../../static/img/".$color_img);						
		} 
	}
if(checkName($color_name)){
	file_put_contents('../../db/logs/admin_log.txt', $time."Введено некорректное название цвета "."(".$color_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
		?>
		<script>alert("Некорректное название цвета");</script>
		<?
	die();
}

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
	if(!$dbc){	
		//код вывода страницы ошибки (Проводятся технические работы)		
		die();
	}
$query = "INSERT INTO `colors`( `name`, `target`)
		  VALUES ('".$color_name."','".$color_img."')";
	$res = mysqli_query($dbc, $query);
mysqli_close($dbc);

?>
<script>alert("Новый цвет успешно добавлен");</script>
<?
}

?>




