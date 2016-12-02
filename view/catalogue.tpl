<link rel="stylesheet" href="static/css/style-catalogue.css">


<div class="sort">
<form action="" method="post">	   
	Сортировка: 
	<select name="category" onchange="this.form.submit()">			  	   		   
		<option value="raiting" <?if($_POST['category'] == "raiting"){echo 'selected';}?> >по рейтингу</option>
		<option value="cheap" <?if($_POST['category'] == "cheap"){echo 'selected';}?> >от дешевых к дорогим</option>
		<option value="expensive" <?if($_POST['category'] == "expensive"){echo 'selected';}?> >от дорогих к дешевым</option>
		<option value="new" <?if($_POST['category'] == "new"){echo 'selected';}?> >новинки</option>
	</select>	   	  
</form>
</div>


<?
foreach ($goods as $key => $good){
$g_id=$key; // айди товара
include 'db/config/config.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
?>
	<div class="good" >
		<!-- видеообзор -->
		<div class="video">
			<?if ($good["video"]){?>
			  <a href="<?=$good["video"]?>"><center><img src="static/img/video.jpg" title="Видеообзор" alt="Видеообзор" 	width="25px" /><br>video</center></a>
			<?}?>
		</div>
		<!-- стикер -->
		<?switch ($good["sticker"]){
			case false;
			$class = "";
			break;
			case "Суперцена";
			$class = "superPrice";
			break;
			case "Топ продаж";
			$class = "topSales";
			break;
			case "Акция";
			$class = "stock";
			break;
		  }?>
		<div class="<?=$class?>"><?=$good["sticker"]?></div>

		<!-- демо-видео -->
		<div class="demo">
			<?
			if ($good["demo"]) {?>
				<a href="<?=$good["demo"]?>"><center><img src="static/img/demo.jpg" title="Демонстрация" alt="Демонстрация" width="25px" /><br>demo</center></a>
			<?}?>
		</div>

		<!-- изображение товара -->		
		<?$query="SELECT `i_id`
				  FROM `goods_images`
				  WHERE g_id=$g_id;";		
		$res=mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($res);
		$i_id=$row["i_id"];  //айди изображения найденное по айди товара

		$query="SELECT `main_img`, `alt_img`, `title_img`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`
				FROM `images`
				WHERE id=$i_id;";	// ищем все изображения по айди изображения
		$res=mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($res);
		?>

		<div class="imgGood">			
			<?if ($row) {?>
				<a href="?route=product&id=<?=$key?>"> <center><img src="images/<?=$row["main_img"];?>" alt="<?=$row["alt_img"]?>" title="<?=$row["title_img"]?>"
					width="187px" height="280px"></center> </a>
			<?}?>
		</div>

		<!-- цвета товара -->
		<?$query="SELECT `id`, `name`, `target`
		   		  FROM `colors`;";  //выбираем все цвета с базы
		$res=mysqli_query($dbc, $query);
		$colors=[];
		while ($row = mysqli_fetch_assoc($res)){
			$id=$row['id'];     // задаем индексы в массиве не 0 1 2 3 а 23 24 27 32
			$colors[$id]=$row;  //выбираем все цвета с базы
		}
		?>
		<div class="colorsGood"><?
			$query="SELECT `c_id`
					FROM `goods_colors`
					WHERE g_id=$g_id;"; //выбираем айдишники цветов по которые соответствуют айди товара
			$res = mysqli_query($dbc, $query);
			while ($row = mysqli_fetch_assoc($res)){
				$c_id=$row['c_id'];
			?>
			<a href="?route=product&id=<?=$key?>"><img src="static/img/<?=$colors[$c_id]["target"]?>" class="colorChoise" alt="<?=$colors[$c_id]["name"]?>"/></a><br>
			<?}?>
		</div>

		<!-- наличие товара -->
		<div class="endingGood">
			<?if ($good["in_stock"]) {?>
				<center>Заканчивается</center>
			<?}?>
		</div>

		<!-- название товара -->
		<div class="nameGood">
			<a href="?route=product&id=<?=$key?>"><?=$good["name"]?></a>                                                     
		</div>

		<!-- старая цена товара -->
		<div class="oldPrice">
			<?if ($good["old_price"]) {?>
				<del><span><?=$good["old_price"]."<small>"?></span></del><?=" грн</small>"?>
			<?}?>				
		</div>

		<!-- актуальная цена товара -->
		<div class="PriceContainer">
			<div class="price">
				<?if ($good["price"]) {?>
					<?=$good["price"]."<small> грн</small>"?>
				<?}?>
			</div>

			<!-- рейтинг товара -->
			<div class="raiting">
				<i class="sprite sprite-<?=$good["raiting"]?>"></i>										
			</div>

			<!-- отзывы -->
			<?$query="SELECT `id_comm`, `g_id`, `comm_description`, `plus`, `minus`
					  FROM `comments`
					  WHERE g_id=$g_id;";
			$res=mysqli_query($dbc, $query);
			$comments=[];
			while ($row = mysqli_fetch_assoc($res)){
				$comments[]=$row;
			}
			$comments_count = count($comments);
			?>
			<div class="reviews">	
				<?for($f=$comments_count; $f<=$comments_count; $f++){					
					$rest=$f%10;
					if(($f===0) || ($rest>=5 && $rest<=9) || ($f%100>=10 && $f<=20)){						
						$last="ов";
					}elseif($rest===1){								
						$last= "";
					}else{$last= "a";
					}
				}?>
				<a href=""><?=$comments_count." "." отзыв".$last?> </a>		
			</div> 
		</div>

		<div class="idGood">
			<a href="process/BuyProduct.php?id=<?=$key?>"><img src="static/img/buy_button.png" width="130px"></a>
		</div>

		<!-- особенности товара -->
		<?$query="SELECT `id`, `feature_name`, `feature_img`
				  FROM `features`;";
		$res=mysqli_query($dbc, $query);
		$features=[];
		while ($row = mysqli_fetch_assoc($res)){
			$id=$row['id'];
			$features[$id]=$row;
		}
		?>
		<div class="features"><?
			$query="SELECT `f_id`
					FROM `goods_features`
					WHERE g_id=$g_id;";
			$res = mysqli_query($dbc, $query);
		?>
		<span>
		<?while ($row = mysqli_fetch_assoc($res)){
			$f_id=$row['f_id'];
		?>
		<img src="static/img/<?=$features[$f_id]["feature_img"]?>" title="<?=$features[$f_id]["feature_name"]?>">
		<?}?>
		</span>
		</div><br>

		<!-- описание товара -->
		<div class="description">
			<?=$good["description"]?>
		</div>
	</div>

<?
mysqli_close($dbc);
}
?>













