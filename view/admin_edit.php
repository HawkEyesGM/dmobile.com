<link rel="stylesheet" href="../static/css/styleAdmin.css">

<div class="admin_edit">
<h1><a href="?route=admin">Добавление новой позиции </a> | &#9998; Редактировать товар </h1>
<br>
<?include 'db/config/config.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
	if(!$dbc){	
		//код вывода страницы ошибки (Проводятся технические работы)		
		die();
	}
// запрос на все товары из базы данных, сортируем по бренду
$query="SELECT `id`, `name`, `brand`
		FROM `goods`
		ORDER BY `brand`;";	
$res=mysqli_query($dbc, $query);
	if(!$res){
		print_r($query);
		die();
	}?>
<!-- форма запроса товара через селект -->
<form action="" method="POST">
	<select name="find_good" >
		<option value="">---</option>
		<?while ($row = mysqli_fetch_assoc($res)){?>	
		<option value="<?=$row['id']?>"><?=$row['name']?></option><?
		}
		?>
	</select>
	<input type="submit" value="Найти товар" >
</form><br><br>

<?mysqli_close($dbc);
// если есть запрос товара то вывести его
 if($_POST['find_good']){
 	// получить айти товара из поста
 	$g_id = $_POST['find_good'];

///////////  Удаление товара из БД /////////////////////////////////
 	?> <div class="del_product">
 		<form action="process/product/delete_prod.php" method="POST">
 			<input type="hidden" name="good" value="<?=$g_id?>">
 			<input type="hidden" name="delete_product" value="true">
 			<input type="submit" value="Удалить выбранный товар">
 		</form>
 	</div> <?

 	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
 	if(!$dbc){	
				//код вывода страницы ошибки (Проводятся технические работы)		
 		die();
 	}
 	
 	//по айди выбранного твоара выводим весь товар в формы 
 	$query="SELECT *
 			FROM `goods`
 			WHERE id=$g_id;";
 	$res=mysqli_query($dbc, $query);
 	if(!$res){
 		print_r($query);
 		die();
 	}
 	$row = mysqli_fetch_assoc($res);
 	?> 	 
 	
	<form action="process/product/edit_product.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name='id_good' value='<?=$g_id?>'>
		<label> Название товара: </label>
	 	<input type="text" name="productName" value="<?=$row['name']?>" size=50px required><br><br><hr>
	
		<label>Группа:</label>   
		  <select name="category">		   
			   <option value="c1" <?if($row['group_goods'] == "phone"){echo 'selected';}?>>Телефоны</option>
			   <option value="c2" <?if($row['group_goods'] == "smartphone"){echo 'selected';}?>>Смартфоны</option>
			   <option value="c3" <?if($row['group_goods'] == "headphones"){echo 'selected';}?>>Наушники</option>
			   <option value="c4" <?if($row['group_goods'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
	   	  </select><br><hr>

	   	  <label>Бренд товара:</label>   
		  <select name="brand" >		   
			   <option value="g1" <?if($row['brand'] == ""){echo 'selected';}?>>- - - - - -</option>
			   <option value="g2" <?if($row['brand'] == "apple"){echo 'selected';}?>>Apple</option>
			   <option value="g3" <?if($row['brand'] == "samsung"){echo 'selected';}?>>Samsung</option>
			   <option value="g4" <?if($row['brand'] == "lenovo"){echo 'selected';}?>>Lenovo</option>
			   <option value="g5" <?if($row['brand'] == "htc"){echo 'selected';}?>>HTC</option>
			   <option value="g6" <?if($row['brand'] == "xiaomi"){echo 'selected';}?>>Xiaomi</option>
			   <option value="g7" <?if($row['brand'] == "sony"){echo 'selected';}?>>Sony</option>
			   <option value="g8" <?if($row['brand'] == "asus"){echo 'selected';}?>>Asus</option>
			   <option value="g9" <?if($row['brand'] == "meizu"){echo 'selected';}?>>Meizu</option>
			   <option value="g10" <?if($row['brand'] == "huawei"){echo 'selected';}?>>Huawei</option>
			   <option value="g11" <?if($row['brand'] == "microsoft"){echo 'selected';}?>>Microsoft</option>
			   <option value="g12" <?if($row['brand'] == "motorolla"){echo 'selected';}?>>Motorolla</option>
			   <option value="g13" <?if($row['brand'] == "headphones"){echo 'selected';}?>>Наушники</option>
			   <option value="g14" <?if($row['brand'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
	   	  </select><br><hr>

		<label>Видеообзор:</label><br>	   
		 	<input type="text" value="<?=$row['video']?>" name="mediaLinkVideo" size=50px ><br>

 		<label>Демонстрация товара:</label><br>	 
		 	<input type="text" value="<?=$row['demo']?>" name="mediaLinkDemo" size=50px><br><hr>

 		<label>Стикер:</label>     
	 	 	<select name="stiker1">
	 		  <option value="s1" <?if($row['sticker'] == ""){echo 'selected';}?>>- - - - - - -</option>      
	 		  <option value="s2" <?if($row['sticker'] == "Суперцена"){echo 'selected';}?>>Суперцена</option>
	 		  <option value="s3" <?if($row['sticker'] == "Топ продаж"){echo 'selected';}?>>Топ продаж</option>
	 		  <option value="s4" <?if($row['sticker'] == "Акция"){echo 'selected';}?>>Акция</option>   
	 	 	</select><br><hr>

   		<label>Старая цена:</label>
      		<input type="text" name="oldPrice" value="<?=$row['old_price']?>" pattern="\d+"><small> грн</small><br> 

    	<label>Цена товара:</label>
       		<input type="text" name="Price" value="<?=$row['price']?>" pattern="\d+" required><small> грн</small><br><hr>

       	<label>Описание товара</label><br>
			<textarea type="text" name="description"  style="width:800px; height:80px;" required><?=$row['description']?></textarea><hr>    	

    	<label>Наличие:</label>     
   		 	<select name="inStock">
	     		<option <?if($row['in_stock'] == false){echo 'selected';}?> value="t11">В наличии</option>      
	     		<option <?if($row['in_stock'] == true){echo 'selected';}?> value="t22">Заканчивается</option>	     		       
     	 	</select><br><hr>

     	<label>Рейтинг:</label>
	     	<select name="productRaiting">
		   		 <option <?if($row['raiting'] == 1){echo 'selected';}?> value="t1">0</option>      
		   		 <option <?if($row['raiting'] == 2){echo 'selected';}?> value="t2">0.5</option>
		   		 <option <?if($row['raiting'] == 3){echo 'selected';}?> value="t3">1</option>
		   		 <option <?if($row['raiting'] == 4){echo 'selected';}?> value="t4">1.5</option>
		   		 <option <?if($row['raiting'] == 5){echo 'selected';}?> value="t5">2</option> 
		   		 <option <?if($row['raiting'] == 6){echo 'selected';}?> value="t6">2.5</option> 
		   		 <option <?if($row['raiting'] == 7){echo 'selected';}?> value="t7">3</option> 
		   		 <option <?if($row['raiting'] == 8){echo 'selected';}?> value="t8">3.5</option> 
		   		 <option <?if($row['raiting'] == 9){echo 'selected';}?> value="t9">4</option>
		   		 <option <?if($row['raiting'] == 10){echo 'selected';}?> value="t10">4.5</option> 
		   		 <option <?if($row['raiting'] == 11){echo 'selected';}?> value="t11">5</option>     
	   	    </select><br><hr>
	   	    <!-- Изображения товара	   	     -->
 		<? 		
	 	// делаем запрос в промежуточную таблицу изображений по айди товара и получаем айди изображения соотв. товару 
	 	$query="SELECT `i_id`
	 	  		FROM `goods_images`
	 	  		WHERE `g_id`=$g_id;";
	 	$res=mysqli_query($dbc, $query);
	 	  if(!$res){
	 	  	print_r($query);
	 	  	die();
	 	  }
	 	$row = mysqli_fetch_assoc($res);
		// айди изображения соотв. товару 
	 	$i_id = $row['i_id'];
	 	// запрос в саму таблицу изображений с айди изображения
	 	$query="SELECT `id`, `main_img`, `alt_img`, `title_img`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`
	 	  		FROM `images`
	 	  		WHERE id= $i_id;";
	 	$res=mysqli_query($dbc, $query);
	 	  if(!$res){
	 	  	print_r($query);
	 	  	die();
	 	  }
	 	$row = mysqli_fetch_assoc($res);
	 	?>
		<!-- выводим главное фото товара -->
		<img src="images/<?=$row['main_img']?>" width="100px" >
		<? $path_img_m = $row['main_img']; ?>
		<input type="hidden" name="old_img_m" value="<?=$path_img_m?>">
	   	<label>Главное изображение товара:</label><br><br>   
		<input type="file" name="g_img_main" >
		<br><hr>
		<!-- Дополнительные изображения -->
		<?if($row['img_1']){?><img src="images/<?=$row['img_1']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #1</label>
		<? $path_img_1 = $row['img_1']; ?>
		<!-- для передачи в форму редактирования названия старой картинки и последуюзего ее удаления -->
		<input type="hidden" name="old_img_1" value="<?=$path_img_1?>">
		<input type="file" name="g_img_1"><br>

		<?if($row['img_2']){?><img src="images/<?=$row['img_2']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #2</label>
		<? $path_img_1 = $row['img_2']; ?>
		<input type="hidden" name="old_img_2" value="<?=$path_img_2?>">
		<input type="file" name="g_img_2"><br>

		<?if($row['img_3']){?><img src="images/<?=$row['img_3']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #3</label>
		<? $path_img_3 = $row['img_3']; ?>
		<input type="hidden" name="old_img_3" value="<?=$path_img_3?>">
		<input type="file" name="g_img_3"><br>

		<?if($row['img_4']){?><img src="images/<?=$row['img_4']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #4</label>
		<? $path_img_4 = $row['img_4']; ?>
		<input type="hidden" name="old_img_4" value="<?=$path_img_4?>">
		<input type="file" name="g_img_4"><br>

		<?if($row['img_5']){?><img src="images/<?=$row['img_5']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #5</label>
		<? $path_img_5 = $row['img_5']; ?>
		<input type="hidden" name="old_img_5" value="<?=$path_img_5?>">
		<input type="file" name="g_img_5"><br><hr><br>  	
   	
		<label>Альтернативный текст изображения:</label><br>
		<input type="text" name="imgAlt" value="<?=$row['alt_img']?>" required><br>

		<label>Всплывающая подсказка:</label><br>
		<input type="text" name="imgValue" value="<?=$row['title_img']?>" required><br><hr>

		<!-- изменение цвета товара -->
		<label>Цвет товара (Все возможные): </label><a href="../process/admin_add/add_color.php"> Добавить новый цвет</a><br><br>
		<?	 
		$query = "SELECT `id`, `name`, `target`
				  FROM `colors`";
		$res = mysqli_query($dbc, $query);
			// перебираем строки из таблицы `colors` пока они не закончатся и while==false
		while ($row = mysqli_fetch_assoc($res)){?>
		<div class="feature_input">
			<label for="<?=$row['id']?>"><?=$row['name'];?></label><br>  
			<input type="checkbox" name="<?=$row['id'];?>" class="colors" id='<?=$row['id'];?>'><br>
		</div>
		<?}?>
		<br><br><hr> 
		<!-- изменение особенностей товара -->
		<label>Особенности товара(Все возможные): </label> <a href="../process/admin_add/add_featch.php"> Добавить новую характеристику</a><br><br> 
		<?		
		$query = "SELECT `id`, `feature_name`, `feature_img`
      			  FROM `features`";
		$res = mysqli_query($dbc, $query);

		while ($row = mysqli_fetch_assoc($res)){?>
			<div class="feature_input">
			<label for="<?=$row['id']?>"><?=$row['feature_name'];?></label><br>  
 			<input type="checkbox" name="<?=$row['id'];?>" class="colors" id='<?=$row['id'];?>'>			
			</div>
		<?}?>
		<br><br><hr> 		
		
		<input type="submit" class="my_button" value="Сохранить">	
	</form>	
	<br><br>
	<?
	mysqli_close($dbc);
	}?>
</div>