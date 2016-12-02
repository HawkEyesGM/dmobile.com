<link rel="stylesheet" href="../../static/css/style.css">
<div class="regBack">
	<div class="newReg">
		<div id ="close"><a href="/?route=admin">Закрыть</a></div>
	<h1>Добавление новой характеристики товара</h1><br><br>
	<form action="add_featch.php" method="POST" enctype="multipart/form-data">
		Добавить название новой характеристики:<br>		
		(Название латиницей или кириллицей)<br>
		<input type="text" name="featch_name" ><br>
		Добавить изображение новой характеристики:
		<input type="file" name="featch_img" value="">		
		<input type="submit" name="new_featch" value="Сохранить">
	</form>	
	</div>
</div>

<?
include '../../db/config/config.php';
include '../../lib/functions/validation_func.php';
$time= date('c');
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
if(isset($_POST['new_featch'])){
	$featch_name=$_POST['featch_name'];
	
	if((int)$_FILES['featch_img']["error"] === 0){		
		$mimeType=$_FILES['featch_img']["type"];
		$extFile=explode(".", $_FILES['featch_img']["name"]);		
		$extFile=$extFile[count($extFile)-1];
		if(($mimeType == "image/gif" && $extFile == "gif") || ($mimeType == "image/jpeg" && $extFile == "jpg") ||
			($mimeType == "image/jpeg" && $extFile == "jpeg") || ($mimeType == "image/bmp" && $extFile == "bmp") ||
			($mimeType == "image/png" && $extFile == "png")){
			$name_ava=md5(microtime().uniqid().rand(0,9999));
			$featch_img = $name_ava.".".$extFile;
			move_uploaded_file($_FILES['featch_img']["tmp_name"], "../../static/img/".$featch_img);						
		} 
	}
if(checkFeatName($featch_name)){
	file_put_contents('../../db/logs/admin_log.txt', $time."Введено некорректное имя "."(".$featch_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
		?>
		<script>alert("Некорректное название характеристики");</script>
		<?
	die();
}

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
	if(!$dbc){	
		//код вывода страницы ошибки (Проводятся технические работы)		
		die();
	}
$query = "INSERT INTO `features`( `feature_name`, `feature_img`)
		  VALUES ('".$featch_name."','".$featch_img."')";
$res = mysqli_query($dbc, $query);
mysqli_close($dbc);

?>
<script>alert("Новая характеристика успешно добавлена");</script>
<?
}

?>


