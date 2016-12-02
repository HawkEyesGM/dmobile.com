<?
	$id=$_GET["id"];
	$uBasket=unserialize($_COOKIE["basket"]);
	
	if($uBasket[$id]>1)
 {
 $uBasket[$id]=$uBasket[$id]-1;
 }
	$sBasket=serialize($uBasket);
	setcookie("basket",$sBasket,0,"/");
	header("Location: /?route=basket");
?>

<!-- Код уменьшения кол-ва товара в корзине -->