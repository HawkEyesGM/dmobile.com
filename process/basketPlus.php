<?
$id=$_GET["id"];
$uBasket=unserialize($_COOKIE["basket"]);
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

<!-- Код увеличения кол-ва товара в корзине -->