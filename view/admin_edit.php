<link rel="stylesheet" href="../static/css/styleAdmin.css">

<div class="admin">
<h1><a href="?route=admin">Добавление новой позиции </a> | &#9998; Редактировать товар </h1>
<br>
<?include 'db/config/config.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
$query="SELECT `id`, `name`, `brand`
		FROM `goods`
		ORDER BY `brand`;";	
$res=mysqli_query($dbc, $query);
if(!$res){
	print_r($query);
	die();
}?>

<form action="?route=admin_edit" method="POST">
	<select name="find_good" ><?
		while ($row = mysqli_fetch_assoc($res)){?>	
		<option value="<?=$row['id']?>"><?=$row['name']?></option><?
		}
		?>
	</select>
	<input type="submit" value="Найти" >
</form>
<?mysqli_close($dbc);
 if($_POST['find_good']){
 	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
 	if(!$dbc){	
				//код вывода страницы ошибки (Проводятся технические работы)		
 		die();
 	}
 	$g_id = $_POST['find_good'];
 	$query="SELECT *
 	FROM `goods`
 	WHERE id=$g_id;";
 	$res=mysqli_query($dbc, $query);
 	if(!$res){
 		print_r($query);
 		die();
 	}
 	$row = mysqli_fetch_assoc($res);
 	mysqli_close($dbc);


  ?>	
	<form action="" method="POST" enctype="multipart/form-data">
		<label> Название товара: </label><br>
	 	<input type="text" name="productName" value="<?=$row['name']?>" size=50px required><br><br>
	
		<label>Группа:</label>   
		  <select name="category">		   
			   <option <?if($row['group_goods'] == "phone"){echo 'selected';}?>>Телефоны</option>
			   <option <?if($row['group_goods'] == "smartphone"){echo 'selected';}?>>Смартфоны</option>
			   <option <?if($row['group_goods'] == "headphones"){echo 'selected';}?>>Наушники</option>
			   <option <?if($row['group_goods'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
	   	  </select><br><hr>

	   	  <label>Бренд товара:</label>   
		  <select name="brand" >		   
			   <option <?if($row['brand'] == ""){echo 'selected';}?>>- - - - - -</option>
			   <option <?if($row['brand'] == "apple"){echo 'selected';}?>>Apple</option>
			   <option <?if($row['brand'] == "samsung"){echo 'selected';}?>>Samsung</option>
			   <option <?if($row['brand'] == "lenovo"){echo 'selected';}?>>Lenovo</option>
			   <option <?if($row['brand'] == "htc"){echo 'selected';}?>>HTC</option>
			   <option <?if($row['brand'] == "xiaomi"){echo 'selected';}?>>Xiaomi</option>
			   <option <?if($row['brand'] == "sony"){echo 'selected';}?>>Sony</option>
			   <option <?if($row['brand'] == "asus"){echo 'selected';}?>>Asus</option>
			   <option <?if($row['brand'] == "meizu"){echo 'selected';}?>>Meizu</option>
			   <option <?if($row['brand'] == "huawei"){echo 'selected';}?>>Huawei</option>
			   <option <?if($row['brand'] == "microsoft"){echo 'selected';}?>>Microsoft</option>
			   <option <?if($row['brand'] == "motorolla"){echo 'selected';}?>>Motorolla</option>
			   <option <?if($row['brand'] == "headphones"){echo 'selected';}?>>Наушники</option>
			   <option <?if($row['brand'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
	   	  </select><br><hr>

		<label>Видеообзор:</label><br>	   
		  <input type="text" value="<?=$row['video']?>" name="mediaLinkVideo" size=50px ><br>

 		<label>Демонстрация товара:</label><br>	 
		  <input type="text" value="<?=$row['demo']?>" name="mediaLinkDemo" size=50px><br><hr>

 		<label>Стикер:</label>     
	 	  <select name="stiker1">
	 		  <option <?if($row['sticker'] == ""){echo 'selected';}?>>- - - - - - -</option>      
	 		  <option <?if($row['sticker'] == "Суперцена"){echo 'selected';}?>>Суперцена</option>
	 		  <option <?if($row['sticker'] == "Топ продаж"){echo 'selected';}?>>Топ продаж</option>
	 		  <option <?if($row['sticker'] == "Акция"){echo 'selected';}?>>Акция</option>   
	 	  </select><br><hr>

  

   		  	<label>Старая цена:</label>
      	  <input type="text" name="oldPrice" value="<?=$row['old_price']?>" pattern="\d+"><small> грн</small><br> 

    	<label>Цена товара:</label>
       	  <input type="text" name="Price" value="<?=$row['price']?>" pattern="\d+" required><small> грн</small><br><hr>

       	  <label>Описание товара</label><br>
		<textarea type="text" name="description"  style="width:800px; height:80px;" required><?=$row['description']?></textarea><hr>

    	

    		<label>Наличие:</label>     
   		  <select name="inStock">
     		<option selected value="t11">В наличии</option>      
     		<option value="t22">Заканчивается</option>
     		<!-- <option value="t33">Закончился</option>  -->       
     	  </select><br><hr>

     	  <label>Рейтинг:</label>
	      <select name="productRaiting">
	   		 <option selected value="t1">0</option>      
	   		 <option value="t2">0.5</option>
	   		 <option value="t3">1</option>
	   		 <option value="t4">1.5</option>
	   		 <option value="t5">2</option> 
	   		 <option value="t6">2.5</option> 
	   		 <option value="t7">3</option> 
	   		 <option value="t8">3.5</option> 
	   		 <option value="t9">4</option>
	   		 <option value="t10">4.5</option> 
	   		 <option value="t11">5</option>     
	   	  </select><br><hr>


 <?	 	  $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
	 	  if(!$dbc){	
				//код вывода страницы ошибки (Проводятся технические работы)		
	 	  	die();
	 	  }
	 	  
	 	  $query="SELECT `i_id`
	 	  FROM `goods_images`
	 	  WHERE `g_id`=$g_id;";
	 	  $res=mysqli_query($dbc, $query);
	 	  if(!$res){
	 	  	print_r($query);
	 	  	die();
	 	  }
	 	  $row = mysqli_fetch_assoc($res);
	 	  $i_id = $row['i_id'];



	 	  $query="SELECT `id`, `main_img`, `alt_img`, `title_img`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`
	 	  FROM `images`
	 	  WHERE id= $i_id;";
	 	  $res=mysqli_query($dbc, $query);
	 	  if(!$res){
	 	  	print_r($query);
	 	  	die();
	 	  }
	 	  $row = mysqli_fetch_assoc($res);
	 	  mysqli_close($dbc);
?>
		<img src="images/<?=$row['main_img']?>" width="100px" >

	   	  <label>Главное изображение товара:</label>
          <input type="file" name="g_img_main" required><br><br>

          <?if($row['img_1']){?><img src="images/<?=$row['img_1']?>" width="100px" ><?}?>
		<label>Дополнительное изображение #1</label>
          <input type="file" name="g_img_1"><br>

          <?if($row['img_1']){?><img src="images/<?=$row['img_2']?>" width="100px" ><?}?>
    	<label>Дополнительное изображение #2</label>
          <input type="file" name="g_img_2"><br>

          <?if($row['img_1']){?><img src="images/<?=$row['img_3']?>" width="100px" ><?}?>
    	<label>Дополнительное изображение #3</label>
          <input type="file" name="g_img_3"><br>

          <?if($row['img_1']){?><img src="images/<?=$row['img_4']?>" width="100px" ><?}?>
    	<label>Дополнительное изображение #4</label>
          <input type="file" name="g_img_4"><br>

          <?if($row['img_1']){?><img src="images/<?=$row['img_5']?>" width="100px" ><?}?>
    	<label>Дополнительное изображение #5</label>
          <input type="file" name="g_img_5"><br>   	
   	
   		<label>Альтернативный текст изображения:</label><br>
   		  <input type="text" name="imgAlt" value="<?=$row['alt_img']?>" required><br>

   		<label>Всплывающая подсказка:</label><br>
   		  <input type="text" name="imgValue" value="<?=$row['title_img']?>" required><br><hr>






		<label>Цвет товара (Все возможные): </label><a href="../process/admin_add/add_color.php"> Добавить новый цвет</a><br>

			<? include 'db/config/config.php';
			$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
			if(!$dbc){	
			//код вывода страницы ошибки (Проводятся технические работы)		
			die();
			}
			$query = "SELECT `id`, `name`, `target`
	      			  FROM `colors`";
			$res = mysqli_query($dbc, $query);
			// перебираем строки из таблицы `colors` пока они не закончатся и while==false
			while ($row = mysqli_fetch_assoc($res)){?>
				<div class="feature_input">
				<label for="<?=$row['id']?>"><?=$row['name'];?></label><br>  
	 			<input type="checkbox" name="<?=$row['id'];?>" class="colors" id='<?=$row['id'];?>'><br>
		 		<!-- <img src="../static/img/<?=$row['target']?>" width=30px;> -->
				</div>
			<?}
			mysqli_close($dbc);
			?>
			<br><br><hr>

    

   	

   		   	 

   		<label>Особенности товара(Все возможные): </label> <a href="../process/admin_add/add_featch.php"> Добавить новую характеристику</a><br>
		<? include 'db/config/config.php';
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
		if(!$dbc){	
			//код вывода страницы ошибки (Проводятся технические работы)		
		die();
		}
		$query = "SELECT `id`, `feature_name`, `feature_img`
      			  FROM `features`";
		$res = mysqli_query($dbc, $query);

		while ($row = mysqli_fetch_assoc($res)){?>
			<div class="feature_input">
			<label for="<?=$row['id']?>"><?=$row['feature_name'];?></label><br>  
 			<input type="checkbox" name="<?=$row['id'];?>" class="colors" id='<?=$row['id'];?>'>
			<!--  <img src="../static/img/<?=$row['feature_img']?>"> -->
			</div>
		<?}
		mysqli_close($dbc);
		?>
		<br><br><hr>
 
		

		<input type="submit" class="my_button" value="Сохранить">	
	</form>	
	<?}?>
</div>