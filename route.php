<?
session_start();
$route=$_GET["route"];
if ($_SESSION["REFERRER"] != $_SERVER['REQUEST_URI']){
	$_SESSION["REFERRER"] = $_SERVER['REQUEST_URI'];
}
// echo $_SESSION["REFERRER"];
	switch ($route) {
	case NULL;                      // Если вбили index.php без ? то зайдем на главную все-равно
		include "view/main.tpl";
		break;
		case 'about';
		include "view/about.tpl";
		break;
		case 'contacts';
		include "view/contacts.tpl";
		break;
		case 'catalogue';
		include "view/catalogue.tpl";
		break;
		case 'product';
		include "view/product.tpl";
		break;
		case 'delivery';
		include "view/delivery.tpl";
		break;
		case 'answers';
		include "view/answers.tpl";
		break;
		case 'apple';
		include "view/sort.tpl";
		break;
		case 'samsung';
		include "view/sort.tpl";
		break;
		case 'basket';
		include "view/basket.tpl";
		break;
		case 'admin';
		include "view/admin.php";
		break;
		case 'admin_edit';
		include "view/admin_edit.php";
		break;
		case 'registration';
		include "view/registration.tpl";
		break;
		case 'user_profile';
		include "view/user_profile.tpl";
		break;
		case 'user_profile_edit';
		include "view/user_profile_edit.tpl";
		break;
		
			
		default:
		include "view/404.tpl";
		break;
}

?>



