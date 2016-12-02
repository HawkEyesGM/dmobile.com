<?
$id=$_GET['id'];  // мы кнопкой передали ГЕТ запрос ?id=<?=$key  , теперь его вынем
$sBasket=$_COOKIE["basket"];
$uBasket=unserialize($sBasket);
if($uBasket[$id]==false){
 $uBasket[$id]=1;
}
else{ 
  $uBasket[$id]=$uBasket[$id]+1;
}
$sBasket=serialize($uBasket);
setcookie("basket",$sBasket,time()+9999999,"/");
header("Location: /?route=basket");
?>

<!-- Добавление товара в корзину -->