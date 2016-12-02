<?
	$id=$_GET["id"];
	$uBasket=unserialize($_COOKIE["basket"]);
	unset($uBasket[$id]);
	$sBasket=serialize($uBasket);
	setcookie("basket",$sBasket,time()+9999999,"/");
	header("Location: /?route=basket");
?>
<!-- Код удаления товара из корзины -->