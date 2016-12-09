<!-- шаблон корзина товаров -->
<link rel="stylesheet" href="static/css/basket.css">
<?include 'db/config/config.php';
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}?>
<div id="backgroundBasket">
	<div class="basketBody">
		<a href="/?route=catalogue"><div id="closer"></div></a>
		<?$uBasket=isset($uBasket) ? $uBasket : ''; //php7
		$uBasket=unserialize($_COOKIE["basket"]);		
		if(count($uBasket)==0){?>
			<div id="empty"><? echo "КОРЗИНА ПУСТА";?></div><?
		}else{?>   
			<div id="wrapper">
				<h1>Корзина</h1>
				<?foreach ($uBasket as $k => $v) {
					// id -номер товара в массиве
					$id=$k;
					$g_id=$id;
					$good=$goods[$id];
				?>
					<div class="block">
					<!-- удалить товар из корзины -->
					<div id="delProduct"><a href="process/basketDel.php?id=<?=$k?>" id="plus"><img src="static/img/delProduct.png" width="30px" alt=""></a></div>
					<!-- изображение товара -->
					<?$query="SELECT `i_id`
			  				  FROM `goods_images`
			  				  WHERE g_id=$g_id;";		
					$res=mysqli_query($dbc, $query);
					$row = mysqli_fetch_assoc($res);
					$i_id=$row["i_id"];  

					$query="SELECT *
					FROM `images`
					WHERE id=$i_id;";	
					$res=mysqli_query($dbc, $query);
					$row = mysqli_fetch_assoc($res);
					?>

					<div id="img">			
					<?if ($row) {?>
					<a href="#"> <center><img src="images/<?=$row["main_img_small"];?>" alt="<?=$row["alt_img"]?>" title="<?=$row["title_img"]?>"
					 ></center> </a>
					<?}?>
					</div>
					<!-- название товара -->
					<div id="nameProduct"><a href="?route=product&id=<?=$key?>"><?=$good["name"]?></a></div>
					<!-- цена товара -->
					<div id="price"><?if ($good["price"]) {?>
					<mark><?=$good["price"]."<small> грн</small>"?></mark>
					<?}?>
					</div>
					<!-- уменьшение количества товара  -->
					<div id="plusminus"><a href="process/basketMinus.php?id=<?=$k?>" id="minus"><img src="static/img/-minus.png" alt=""></a>
					<!-- вывод и ручной ввод количества товара -->
					<form action="process/inputForm.php?id=<?=$k?>">
						<input type="text"  name="quantity" id="quantity"  value="<?=$v?>" pattern="\d+">
						<input type="hidden" name="id" value="<?=$k?>"  >
					</form>
					<!-- увеличение количества товара  -->
					<a href="process/basketPlus.php?id=<?=$k?>" id="plus"><img src="static/img/+plus.png" alt=""></a></div>
					<!-- общая цена указанного товара -->
					<div id="productCost"><?=$good["price"]*$v."<small>"?></span><?=" грн</small>"?></div>
					<div id="summ"><u>Сумма:</u></div>
					</div>

					<?
					// Общая сумма заказа
					$totalSum=isset($totalSum) ? $totalSum : '';
					$totalSum=$totalSum+($good["price"]*$v);
					?>
					<hr width="89%">
				<?}?>						
							
					<div id="totalSum"><span><pre>Итого:   	<?=$totalSum."<small>"?></span><?=" грн</small><br>"?>
						<img src="static/img/button-oform.png" width="250px" onclick="exec_code();">
					</div>
					<!-- оформление заказа -->
					<script> function exec_code() {
   						alert("Заказ оформлен, ждите звонок менеджера");
					}
					</script>
			</div>
						
			<a  id="clearbasket" href="process/basketClear.php">Очистить корзину</a>
		<?}?>
	</div>
</div>
<?mysqli_close($dbc);?>
