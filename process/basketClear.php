<?
$uBasket=unserialize($_COOKIE['basket']);
unset($uBasket);
$sBasket=serialize($uBasket);
setcookie("basket",$sBasket,time()+9999999,"/");
header("Location: /");
?> 
<!-- Полная очистка корзины -->

