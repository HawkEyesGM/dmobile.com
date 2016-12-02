<!DOCTYPE html>
<html>
<head>
	<title>&#10026 DMobile &#10026</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/accordeon_style.css">
</head>
<body>
    <header>    		
        <span class="m-menu">
            <a href="/"><img src="static/img/Logo2-s.png" alt="Logo2-s.png"></a>  
            <a href="/">Главная</a>
            <a href="/?route=about">О нас</a>
            <a href="/?route=contacts">Контакты</a>
            <a href="/?route=delivery">Доставка</a>
            <a href="/?route=answers">Вопросы и ответы</a>
            <form class="form-search" method="get" action="/search" target="_blank">
                <input type="text" name="q" placeholder="поиск" >	
            </form>
        </span>                       
        <!-- авторизация и регистрация пользователя -->
        <div id="authorization">
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
    </header>

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
   <!--  Menu-accordeon -->
    <aside>
    	<div class="lside">    		
					<div class="accordion vertical">
						<ul>
							<li>
								<input type="checkbox" id="checkbox-1" name="checkbox-accordion" />
								<label for="checkbox-1">Производитель</label>
									<div class="content">
										<ul class="left_menu">
											<li class="active"><a class="linc" href="/?route=catalogue"><span>Все смартфоны</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=apple"><span>Apple</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=samsung"><span>Samsung</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=lenovo"><span>Lenovo</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=htc"><span>HTC</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=xiaomi"><span>Xiaomi</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=sony"><span>Sony</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=asus"><span>Asus</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=meizu"><span>Meizu</span></a></li>
                                            <li><a class="linc" href="/?route=catalogue&brand=huawei"><span>Huawei</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=microsoft"><span>Microsoft</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=motorolla"><span>Motorolla</span></a></li>
											<li><a class="linc" href="/?route=catalogue&brand=headphones"><span>Наушники</span></a></li>
                                            <li><a class="linc" href="/?route=catalogue&brand=protection"><span>Чехлы и защита</span></a></li>
										</ul>
									</div>
							</li>
							<li>
								<input type="checkbox" id="checkbox-2" name="checkbox-accordion" />
								<label for="checkbox-2">Беспроцентный кредит</label>
									<div class="content2">
										<ul class="left_menu">
											<li class="active"><a class="linc" href="#"><span>0% на 10 месяцев</span></a></li>
											<li><a class="linc" href="#"><span>0% на 5 месяцев</span></a></li>
											<li><a class="linc" href="#"><span>Оплата частями</span></a></li>
                            
										</ul>
									</div>
        </li>
        <li>
            <input type="checkbox" id="checkbox-3" name="checkbox-accordion" />
            <label for="checkbox-3">Класс</label>
            <div class="content3">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>Акционные предложения</span></a></li>
                            <li><a class="linc" href="#"><span>Две SIM-карты</span></a></li>
                            <li><a class="linc" href="#"><span>Доступные смартфоны</span></a></li>
                            <li><a class="linc" href="#"><span>Защищенные</span></a></li>
                            <li><a class="linc" href="#"><span>С аккумулятором большой емкости</span></a></li>
                            
                </ul>
            </div>
        </li>
        <li>
            <input type="checkbox" id="checkbox-4" name="checkbox-accordion" />
            <label for="checkbox-4">Диагональ</label>
            <div class="content4">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>До 4"</span></a></li>
                            <li><a class="linc" href="#"><span>4.1" - 4.5"</span></a></li>
                            <li><a class="linc" href="#"><span>4.5" - 5"</span></a></li>
                            <li><a class="linc" href="#"><span>5.1" - 5.5"</span></a></li>
                            <li><a class="linc" href="#"><span>5.55" - 6"</span></a></li>
                            <li><a class="linc" href="#"><span>Более 6"</span></a></li>
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-5" name="checkbox-accordion" />
            <label for="checkbox-5">Оперативная память</label>
            <div class="content3">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>< 1 ГБ</span></a></li>
                            <li><a class="linc" href="#"><span>1 - 1.5 ГБ</span></a></li>
                            <li><a class="linc" href="#"><span>2 ГБ</span></a></li>
                            <li><a class="linc" href="#"><span>3 ГБ</span></a></li>
                            <li><a class="linc" href="#"><span>4 ГБ</span></a></li>  
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-6" name="checkbox-accordion" />
            <label for="checkbox-6">Емкость аккумулятора</label>
            <div class="content3">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>До 1800 мА*ч</span></a></li>
                            <li><a class="linc" href="#"><span>От 1800 - до 2300 мА*ч</span></a></li>
                            <li><a class="linc" href="#"><span>От 2300 - до 2800 мА*ч</span></a></li>
                            <li><a class="linc" href="#"><span>От 2800 - до 3500 мА*ч</span></a></li>
                            <li><a class="linc" href="#"><span>От 3500 мА*ч и выше</span></a></li>           
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-7" name="checkbox-accordion" />
            <label for="checkbox-7">Основная камера</label>
            <div class="content2">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>2 - 7 Мп</span></a></li>
                            <li><a class="linc" href="#"><span>8 - 12 Мп</span></a></li>
                            <li><a class="linc" href="#"><span>13 и более Мп</span></a></li>                 
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-8" name="checkbox-accordion" />
            <label for="checkbox-8">Операционная система</label>
            <div class="content3">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>Android</span></a></li>
                            <li><a class="linc" href="#"><span>Windows 10 Mobile</span></a></li>
                            <li><a class="linc" href="#"><span>Windows Phone 8.1</span></a></li>
                            <li><a class="linc" href="#"><span>iOS</span></a></li>
                            <li><a class="linc" href="#"><span>Другая</span></a></li>                        
                </ul>
            </div>
        </li>
        <li>
            <input type="checkbox" id="checkbox-9" name="checkbox-accordion" />
            <label for="checkbox-9">Цвет</label>
            <div class="content5">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>Black</span></a></li>
                            <li><a class="linc" href="#"><span>Blue</span></a></li>
                            <li><a class="linc" href="#"><span>Golden</span></a></li>
                            <li><a class="linc" href="#"><span>Green</span></a></li>
                            <li><a class="linc" href="#"><span>Grey</span></a></li>
                            <li><a class="linc" href="#"><span>Red</span></a></li>
                            <li><a class="linc" href="#"><span>Silver</span></a></li>
							<li><a class="linc" href="#"><span>Violet</span></a></li>
							<li><a class="linc" href="#"><span>White</span></a></li>						
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-10" name="checkbox-accordion" />
            <label for="checkbox-10">Количество ядер</label>
            <div class="content5">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>2</span></a></li>
                            <li><a class="linc" href="#"><span>2+2</span></a></li>
                            <li><a class="linc" href="#"><span>4</span></a></li>
                            <li><a class="linc" href="#"><span>4+2</span></a></li>
                            <li><a class="linc" href="#"><span>4+4</span></a></li>
                            <li><a class="linc" href="#"><span>4+4+2</span></a></li>
                            <li><a class="linc" href="#"><span>8</span></a></li>
							<li><a class="linc" href="#"><span>10</span></a></li>
							<li><a class="linc" href="#"><span>1</span></a></li>							
                </ul>
            </div>
        </li>
		<li>
            <input type="checkbox" id="checkbox-11" name="checkbox-accordion" />
            <label for="checkbox-11">Разрешение экрана</label>
            <div class="content">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="#"><span>WQHD (2560х1440)</span></a></li>
                            <li><a class="linc" href="#"><span>FullHD (1920x1080)</span></a></li>
                            <li><a class="linc" href="#"><span>HD (1280x720)</span></a></li>
                            <li><a class="linc" href="#"><span>1024х768</span></a></li>
                            <li><a class="linc" href="#"><span>FWVGA (854х480) и ниже</span></a></li>
                            <li><a class="linc" href="#"><span>4K UHD (3840x2160)</span></a></li>
                            <li><a class="linc" href="#"><span>360x400 </span></a></li>
							<li><a class="linc" href="#"><span>800х400 </span></a></li>
							<li><a class="linc" href="#"><span>1136x640 </span></a></li>
							<li><a class="linc" href="#"><span>1334x750 </span></a></li>
							<li><a class="linc" href="#"><span>qHD (960x540)</span></a></li>
			    </ul>
            </div>
        </li>
        <li>
            <input type="checkbox" id="checkbox-12" name="checkbox-accordion" />
            <label for="checkbox-12">Цена</label>
            <div class="content">
                <ul class="left_menu">
                            <li class="active"><a class="linc" href="/?route=catalogue&filter=price<1000"><span>до 1000 грн</span></a></li>
                            <li><a class="linc" href="/?route=catalogue&filter=price>1000 AND price<2000"><span>1000 - 2000 грн</span></a></li>
                            <li><a class="linc" href="/?route=catalogue&filter=price>2000 AND price<3000"><span>2000-3000 грн</span></a></li>
                            <li><a class="linc" href="/?route=catalogue&filter=price>3000 AND price<5000"><span>3000-5000 грн</span></a></li>
                            <li><a class="linc" href="/?route=catalogue&filter=price>5000 AND price<10000"><span>5000-10000 грн</span></a></li>
                            <li><a class="linc" href="/?route=catalogue&filter=price>10000 AND price<2000"><span>более 10000 грн</span></a></li>
                            
                </ul>
            </div>
        </li>
    </ul>
</div>
		</div>
		
	</div>
	
    	</div>
    </aside>
    <div class="m-content">
        <? include "route.php";?>
    </div>
</div>
</body>
<footer>
   <span id="footSpan">
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
      <div class="footInfo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo modi mollitia ducimus numquam, quod voluptates molestias, amet recusandae odio impedit.</div>
  </span>
</footer> 
</html>