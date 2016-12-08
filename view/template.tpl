<!DOCTYPE html>
<html>
<head>
	<title>&#10026 DMobile &#10026</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="static/css/style.css">
    
</head>
<body>
<div id='wrapper-content'>
    <header>    		
        <span class="m-menu">
            <a href="/"><img src="static/img/Logo2-s.png" alt="Logo2-s.png"></a>  
            <a href="/">Главная</a>
            <a href="/?route=about">О нас</a>
            <a href="/?route=contacts">Контакты</a>
            <a href="/?route=delivery">Доставка</a>
            <a href="/?route=answers">Вопросы и ответы</a>           
        </span>
        <div class='find'>
             <form class="form-search" method="get" action="/search" target="_blank">
                <input type="text" name="q" placeholder="| поиск" >   
            </form>
        </div>                       
        <!-- авторизация и регистрация пользователя -->
        <div class="authorization">
            <? include "process/autorizationForm.php" ?>                   
        </div>

        <a href="/?route=basket" id="basket"><img src="static/img/basket.png" alt="basket" width="50px">    
            <!--  Подсчет количества товаров в корзине -->
            <?
            $_COOKIE["basket"]=isset($_COOKIE["basket"]) ? $_COOKIE["basket"] : ''; //php7
            $uBasket=unserialize($_COOKIE["basket"]);        
            if(count($uBasket)!=0){?>
            <div id="fullBasket">
                <?=count($uBasket);?>
            </div>
            <?}?>              
        </a>
          <div class="menu2">
            <center>       
            <a href="/?route=catalogue" >Все смартфоны</a>
            <a href="/?route=catalogue&brand=apple">Apple</a>
            <a href="/?route=catalogue&brand=samsung" >Samsung</a>   
            <a href="/?route=catalogue&brand=lenovo">Lenovo</a>
            <a href="/?route=catalogue&brand=htc">HTC</a>
            <a href="/?route=catalogue&brand=xiaomi">Xiaomi</a>
            <a href="/?route=catalogue&brand=sony">Sony</a> 
            <a href="/?route=catalogue&brand=asus">Asus</a>
            <a href="/?route=catalogue&brand=meizu">Meizu</a>
            <a href="/?route=catalogue&brand=huawei">Huawei</a>
            <a href="/?route=catalogue&brand=microsoft">Microsoft</a>
            <a href="/?route=catalogue&brand=motorolla">Motorolla</a>
            <a href="/?route=catalogue&brand=headphones">Наушники</a>
            <a href="/?route=catalogue&brand=protection">Чехлы и защита</a>         
            <a href="/?route=admin">Admin</a>
            </center>
        </div> 
    </header>  
     
    <div class="m-content">
        <? include "route.php";?>
    </div>
</body>   
</div>

<div class='footer'>
 <span id="footSpan">
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
  </span>  
</div>

</html>