<?
include '../db/config/config.php';
include '../lib/functions/resize_crop_func.php';
$remote_ip = $_SERVER['REMOTE_ADDR'];
$remote_host = $_SERVER['REMOTE_HOST'];
$time= date('c');
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
//код вывода страницы ошибки (Проводятся технические работы)		
die();
}
///////////////////Video-review//////////////////////////////////////////////////////
$video = strip_tags(trim(htmlspecialchars($_POST["mediaLinkVideo"])));

///////////////////Demo-review///////////////////////////////////////////////////////
$demo = strip_tags(trim(htmlspecialchars($_POST["mediaLinkDemo"])));
///////////////////Stiker////////////////////////////////////////////////////////////
$stiker = $_POST['stiker1'];
switch ($stiker){
	case 's1':
		$stiker = false;		
		break;
	case 's2':
		$stiker = "Суперцена";		
		break;
	case 's3':
		$stiker = "Топ продаж";		
		break;
	case 's4':
		$stiker = "Акция";		
		break;		
}
///////////////////Group////////////////////////////////////////////////////////////
$category = $_POST['category'];
switch ($category){
	case 'c1':
		$category = "phone";		
		break;
	case 'c2':
		$category = "smartphone";		
		break;
	case 'c3':
		$category = "headphones";		
		break;
	case 'c4':
		$category = "protection";		
		break;		
}
////////////////////ProductName////////////////////////////////////////////////////////////
$productName = strip_tags(trim(htmlspecialchars($_POST['productName'])));
if( iconv_strlen($productName) == 0 )
 {
 	header("Location: /?route=admin");
 	die();
 }
///////////////////Brand////////////////////////////////////////////////////////////
$brand = $_POST['brand'];
switch ($brand){
	case 'g1':	
	file_put_contents('../db/logs/admin_log.txt', $time." Не выбран бренд товара при добавлении в базу "."(".$productName.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
		header("Location: /?route=admin");
		die();		
		break;
	case 'g2':
		$brand = "apple";		
		break;
	case 'g3':
		$brand = "samsung";		
		break;
	case 'g4':
		$brand = "lenovo";		
		break;
	case 'g5':
		$brand = "htc";		
		break;
	case 'g6':
		$brand = "xiaomi";		
		break;
	case 'g7':
		$brand = "sony";		
		break;
	case 'g8':
		$brand = "asus";		
		break;
	case 'g9':
		$brand = "meizu";		
		break;
	case 'g10':
		$brand = "huawei";		
		break;
	case 'g11':
		$brand = "microsoft";		
		break;
	case 'g12':
		$brand = "motorolla";		
		break;
	case 'g13':
		$brand = "headphones";		
		break;
	case 'g14':
		$brand = "protection";		
		break;
}

////////////////////InStock////////////////////////////////////////////////////////////////
$endingGood = $_POST['inStock'];
if ($endingGood == "t22") {
	$endingGood = true;	
}else{$endingGood = "false";}
/////////////////OLD PRICE////////////////////////////////////////////////////////////////
$oldPrice=strip_tags(trim(htmlspecialchars($_POST['oldPrice'])));
if(iconv_strlen($oldPrice) == 0)
 {
 	$oldPrice="false";
 }
 // if(!ctype_digit($oldPrice))
 // {
 // 	header("Location: /?route=admin");
 //  die();
 // }
/////////////////PRICE////////////////////////////////////////////////////////////////////
$Price=trim(htmlspecialchars(strip_tags($_POST['Price'])));
if(iconv_strlen($Price) !== 0 && ctype_digit($Price))
 {
 }else{
  header("Location: /?route=admin");
  die();
  }
///////////////////Raiting////////////////////////////////////////////////////////////////
$raiting=$_POST['productRaiting'];
switch($raiting) {
	case 't1':
		$raiting = 1;
		break;
	case 't2':
		$raiting = 2;		
		break;
	case 't3':
		$raiting = 3;
		break;
	case 't4':
		$raiting = 4;
		break;
	case 't5':
		$raiting = 5;
		break;
	case 't6':
		$raiting = 6;
		break;
	case 't7':
		$raiting = 7;
		break;
	case 't8':
		$raiting = 8;
		break;
	case 't9':
		$raiting = 9;
		break;
	case 't10':
		$raiting = 10;
		break;
	case 't11':
		$raiting = 11;
		break;
}
////////////////Reviews//////////////////////////////////////////////////////////
$reviews = 0;
// $good["reviews"]=["#reviews",$reviews];

/////////////////////////////DESCRIPTION////////////////////////////////////////
$description = strip_tags(trim(htmlspecialchars($_POST['description'])));

//////////////PUT IN BASE///////////////////////////////////////////////////
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	die();
}
$query = "INSERT INTO `goods`( `name`, `demo`, `video`, `price`, `old_price`, `description`, `sticker`, `in_stock`, `raiting`, `group_goods`, `brand`)
          VALUES ('".$productName."', '".$demo."', '".$video."', $Price, $oldPrice, '".$description."','".$stiker."',$endingGood, $raiting,'".$category."','".$brand."')";
$res = mysqli_query($dbc, $query);
$id_good = mysqli_insert_id($dbc); // id последнего добавленного товара
if (!$res) {
	var_dump($query);
};

/////////////////////////////Features//////////////////////////////////////////////////////////////////

$query = "SELECT `id`
		  FROM `features`";
$res = mysqli_query($dbc, $query);
// в эьль массив вытянем все строки соответствия фичи товару из промежуточной таблицы
$arr=[];
while($row = mysqli_fetch_assoc($res)){
	$arr[]=$row;	
}
// делаем цикл где перебираем каждую строку являющуюся элементом массива, количество циклов = кол-ву элементов массива
for($i=0;$i<count($arr);$i++){
	// (feature = on) проверяем чему равно значение фичи, что же передается через пост  [id=>4, id=>6, id=>7]
	$feature = $_POST[$arr[$i]['id']];
	if($feature == "on")
	{
		$f_id = $arr[$i]['id']; //айди фичи
		$query = "INSERT INTO `goods_features`(`g_id`, `f_id`) 
				  VALUES ('".$id_good."','".$f_id."')";
		$res = mysqli_query($dbc, $query);
	}		
}
///////////////////COLORS////////////////////////////////////////////////////////////////
$query = "SELECT `id`
      	  FROM `colors`";
$res = mysqli_query($dbc, $query);
// в эьль массив вытянем все строки соответствия фичи товару из промежуточной таблицы
$arr_color=[];
while($row = mysqli_fetch_assoc($res)){
	$arr_color[]=$row;	
}
// делаем цикл где перебираем каждую строку являющуюся элементом массива, количество циклов = кол-ву элементов массива
for($i=0;$i<count($arr_color);$i++){
	// (feature = on) проверяем чему равно значение фичи, что же передается через пост  [id=>4, id=>6, id=>7]
	$color = $_POST[$arr_color[$i]['id']];
	if($color == "on")
	{
		$c_id = $arr_color[$i]['id']; //айди фичи
		$query = "INSERT INTO `goods_colors`(`g_id`, `c_id`) 
				  VALUES ('".$id_good."','".$c_id."')";
		$res = mysqli_query($dbc, $query);
	}		
}
///////////////////PRODUCT IMAGE//////////////////////////////////////////////////////
$alt = strip_tags(trim(htmlspecialchars($_POST["imgAlt"])));
$title = strip_tags(trim(htmlspecialchars($_POST["imgValue"])));

if((int)$_FILES['g_img_main']['error'] === 0){		
	$filetype=$_FILES['g_img_main']['type'];
	$fileform=explode(".",$_FILES['g_img_main']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_main']["tmp_name"], "../images/".$img.".".$fileform);
	}
	$img_name = $img.".".$fileform;
	$img_name_medium = $img."_med".".".$fileform;
	$img_name_small = $img."_small".".".$fileform;

	resize("../images/".$img_name, "../images/".$img_name_medium, 173, 280);
	resize("../images/".$img_name, "../images/".$img_name_small, 0, 100);

	$size_img=getimagesize('../images/'.$img_name_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name_small,  "../images/".$img_name_small,  65,  0);
	}
}
if((int)$_FILES['g_img_1']['error'] === 0){		
	$filetype=$_FILES['g_img_1']['type'];
	$fileform=explode(".",$_FILES['g_img_1']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img1=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_1']["tmp_name"], "../images/".$img1.".".$fileform);
	}
	$img_name1 = $img1.".".$fileform;
	$img_name1_small = $img1."_small".".".$fileform;

	resize("../images/".$img_name1, "../images/".$img_name1_small, 0, 100);
	$size_img=getimagesize('../images/'.$img_name1_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name1_small,  "../images/".$img_name1_small,  75,  0);
	}

}
if((int)$_FILES['g_img_2']['error'] === 0){		
	$filetype=$_FILES['g_img_2']['type'];
	$fileform=explode(".",$_FILES['g_img_2']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img2=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_2']["tmp_name"], "../images/".$img2.".".$fileform);
	}
	$img_name2 = $img2.".".$fileform;	
	$img_name2_small = $img2."_small".".".$fileform;

	resize("../images/".$img_name2, "../images/".$img_name2_small, 0, 100);
	$size_img=getimagesize('../images/'.$img_name2_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name2_small,  "../images/".$img_name2_small,  75,  0);
	}
}
if((int)$_FILES['g_img_3']['error'] === 0){		
	$filetype=$_FILES['g_img_3']['type'];
	$fileform=explode(".",$_FILES['g_img_3']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img3=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_3']["tmp_name"], "../images/".$img3.".".$fileform);
	}
	$img_name3 = $img3.".".$fileform;
	$img_name3_small = $img3."_small".".".$fileform;

	resize("../images/".$img_name3, "../images/".$img_name3_small, 0, 100);
	$size_img=getimagesize('../images/'.$img_name3_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name3_small,  "../images/".$img_name3_small,  75,  0);
	}
}
if((int)$_FILES['g_img_4']['error'] === 0){		
	$filetype=$_FILES['g_img_4']['type'];
	$fileform=explode(".",$_FILES['g_img_4']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img4=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_4']["tmp_name"], "../images/".$img4.".".$fileform);
	}
	$img_name4 = $img4.".".$fileform;
	$img_name4_small = $img4."_small".".".$fileform;

	resize("../images/".$img_name4, "../images/".$img_name4_small, 0, 100);
	$size_img=getimagesize('../images/'.$img_name4_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name4_small,  "../images/".$img_name4_small,  75,  0);
	}
}
if((int)$_FILES['g_img_5']['error'] === 0){		
	$filetype=$_FILES['g_img_5']['type'];
	$fileform=explode(".",$_FILES['g_img_5']['name']);
	$fileform=$fileform[count($fileform)-1];
	if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
		{$img5=md5(microtime().uniqid().rand(0,9999));
			move_uploaded_file($_FILES['g_img_5']["tmp_name"], "../images/".$img5.".".$fileform);
	}
	$img_name5 = $img5.".".$fileform;
	$img_name5_small = $img5."_small".".".$fileform;

	resize("../images/".$img_name5, "../images/".$img_name5_small, 0, 100);
	$size_img=getimagesize('../images/'.$img_name5_small);
	if($size_img[0] > $size_img[1]){
		 
		resize("../images/".$img_name5_small,  "../images/".$img_name5_small,  75,  0);
	}
}
$query = "INSERT INTO `images`(`main_img`, `main_img_medium`, `main_img_small`, `alt_img`, `title_img`, `img_1`, `img_1_small`, `img_2`, `img_2_small`, `img_3`, `img_3_small`, `img_4`, `img_4_small`, `img_5`, `img_5_small`) 
		  VALUES ('".$img_name."','".$img_name_medium."','".$img_name_small."','".$alt."','".$title."','".$img_name1."','".$img_name1_small."','".$img_name2."','".$img_name2_small."','".$img_name3."','".$img_name3_small."','".$img_name4."','".$img_name4_small."','".$img_name5."','".$img_name5_small."')";
$res = mysqli_query($dbc, $query);
$i_id = mysqli_insert_id($dbc);

$query = "INSERT INTO `goods_images`(`g_id`, `i_id`) 
		  VALUES ('".$id_good."','".$i_id."')";
$res = mysqli_query($dbc, $query);

mysqli_close($dbc);

header("Location: /?route=admin");
?>
<a href="/" id="back">Вернуться на главную</a>
