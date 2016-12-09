<?
/////////////////    DELETING PRODUCT ////////////////////////
if($_POST['delete_product']==true){
$g_id = $_POST['good'];

include '../../db/config/config.php';;
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
	if(!$dbc){	
		//код вывода страницы ошибки (Проводятся технические работы)		
		die();
	}

$query="DELETE FROM `goods`
		WHERE id=$g_id ;";	
$res=mysqli_query($dbc, $query);

$query="DELETE FROM `goods_features`
		WHERE id=$g_id ;";	
$res=mysqli_query($dbc, $query);

$query="DELETE FROM `goods_goods_colors`
		WHERE id=$g_id ;";	
$res=mysqli_query($dbc, $query);

$query="SELECT `i_id`
		FROM `goods_images`
		WHERE g_id=".$g_id.";";	
$res = mysqli_query($dbc, $query);
$row = mysqli_fetch_assoc($res);
$i_id = $row['i_id'];


$query="SELECT *
		FROM `images`
		WHERE id=$i_id ;";	
$res = mysqli_query($dbc, $query);
$row = mysqli_fetch_assoc($res);
$m_img = $row['main_img'];
$m_img_medium = $row['main_img_medium'];
$m_img_small = $row['main_img_small'];
$img_1 = $row['img_1'];
$img_1_small = $row['img_1_small'];
$img_2 = $row['img_2'];
$img_2_small = $row['img_2_small'];
$img_3 = $row['img_3'];
$img_3_small = $row['img_3_small'];
$img_4 = $row['img_4'];
$img_4_small = $row['img_4_small'];
$img_5 = $row['img_5'];
$img_5_small = $row['img_5_small'];
unlink("../../images/$m_img");
unlink("../../images/$m_img_medium");
unlink("../../images/$m_img_small");
if($img_1 != ''){
unlink("../../images/$img_1");
unlink("../../images/$img_1_small");}
if($img_2 != ''){
unlink("../../images/$img_2");
unlink("../../images/$img_2_small");}
if($img_3 != ''){
unlink("../../images/$img_3");
unlink("../../images/$img_3_small");}
if($img_4 != ''){
unlink("../../images/$img_4");
unlink("../../images/$img_4_small");}
if($img_5 != ''){
unlink("../../images/$img_5");
unlink("../../images/$img_5_small");}

$query="DELETE FROM `images`
		WHERE id=$i_id;";	
$res=mysqli_query($dbc, $query);

	if(!$res){
		print_r($query);
		die();
	}

mysqli_close($dbc);
header("Location: /?route=admin_edit");


}





?>