	<link rel="stylesheet" href="../static/css/styleAdmin.css">

<div class="admin">
	<h1>&#9998; Добавление новой позиции| <a href="?route=admin_edit">Редактировать товар</a></h1>
	<!-- обработать форму в процессе  addInBase.php для передачи файлов на сервер -enctype="multipart/form-data" -->
	<form action="../process/addInBase.php" method="POST" enctype="multipart/form-data">
		<label> Название товара: </label><br>
	 	<input type="text" name="productName" placeholder="| Название товара.." size=50px required><br><br>
	
		<label>Группа:</label>   
		  <select name="category">		   
			   <option selected value="c1">Телефоны</option>
			   <option value="c2">Смартфоны</option>
			   <option value="c3">Наушники</option>
			   <option value="c4">Чехлы и защита</option>
	   	  </select><br><hr>

	   	  <label>Бренд товара:</label>   
		  <select name="brand" >		   
			   <option selected value="g1">- - - - - -</option>
			   <option value="g2">Apple</option>
			   <option value="g3">Samsung</option>
			   <option value="g4">Lenovo</option>
			   <option value="g5">HTC</option>
			   <option value="g6">Xiaomi</option>
			   <option value="g7">Sony</option>
			   <option value="g8">Asus</option>
			   <option value="g9">Meizu</option>
			   <option value="g10">Huawei</option>
			   <option value="g11">Microsoft</option>
			   <option value="g12">Motorolla</option>
			   <option value="g13">Наушники</option>
			   <option value="g14">Чехлы и защита</option>
	   	  </select><br><hr>

		<label>Видеообзор:</label><br>	   
		  <input type="text" placeholder="| Ссылка на видео.." name="mediaLinkVideo" size=50px><br>

 		<label>Демонстрация товара:</label><br>	 
		  <input type="text" placeholder="| Ссылка на демо.." name="mediaLinkDemo" size=50px><br><hr>

 		<label>Стикер:</label>     
	 	  <select name="stiker1">
	 		  <option selected value="s1">- - - - - - -</option>      
	 		  <option  value="s2">Суперцена</option>
	 		  <option  value="s3">Топ продаж</option>
	 		  <option  value="s4">Акция</option>   
	 	  </select><br><hr>

    	<label>Главное изображение товара:</label>
          <input type="file" name="g_img_main" required><br><br>
		<label>Дополнительное изображение #1</label>
          <input type="file" name="g_img_1"><br>
    	<label>Дополнительное изображение #2</label>
          <input type="file" name="g_img_2"><br>
    	<label>Дополнительное изображение #3</label>
          <input type="file" name="g_img_3"><br>
    	<label>Дополнительное изображение #4</label>
          <input type="file" name="g_img_4"><br>
    	<label>Дополнительное изображение #5</label>
          <input type="file" name="g_img_5"><br>   	
   	
   		<label>Альтернативный текст изображения:</label><br>
   		  <input type="text" name="imgAlt" placeholder="| alt" required><br>

   		<label>Всплывающая подсказка:</label><br>
   		  <input type="text" name="imgValue" placeholder="| value" required><br><hr>

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

    	<label>Наличие:</label>     
   		  <select name="inStock">
     		<option selected value="t11">В наличии</option>      
     		<option value="t22">Заканчивается</option>
     		<!-- <option value="t33">Закончился</option>  -->       
     	  </select><br><hr>

   		<label>Старая цена:</label>
      	  <input type="text" name="oldPrice" pattern="\d+"><small> грн</small><br> 

    	<label>Цена товара:</label>
       	  <input type="text" name="Price" pattern="\d+" required><small> грн</small><br><hr>

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
 
		<label>Описание товара</label><br>
		<textarea type="text" name="description" placeholder="| Описание товара.." style="width:800px; height:150px;" required></textarea>

		<input type="submit" class="my_button" value="Сохранить">	
	</form>	
</div>