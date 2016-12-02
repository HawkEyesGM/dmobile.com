<?
	$id=$_GET["id"];
	$uBasket=unserialize($_COOKIE["basket"]);
	$quantity=$_GET["quantity"];
	if(ctype_digit($quantity)){ 
 		if($quantity>0){  		
  			$uBasket[$id]=$quantity;
  		}
 	}	
	$sBasket=serialize($uBasket);
	setcookie("basket",$sBasket,time()+9999999,"/");
	header("Location: /?route=basket");
?>

<!-- ввод информации вручную -->




