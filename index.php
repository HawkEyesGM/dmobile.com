<?
session_start();
// Добавить пустую корзину при первом входе 
$_COOKIE["basket"] = isset($_COOKIE["basket"]) ? $_COOKIE["basket"] : serialize([]); // php7
 if(count(unserialize($_COOKIE["basket"])) == 0){
     $uBasket = [];
     $sBasket = serialize($uBasket);
     setcookie("basket", $sBasket, time()+99999999, "/");    
  }  

require_once "db/goods.base";


$route=isset($_GET['route']) ? $_GET['route'] : '';
include "view/template.tpl";

?>	


