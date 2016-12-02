<?
function checkEmail($email){
	if(preg_match("/[^\w\.@]/i",$email)){
	return false;
	}elseif(preg_match_all('/([a-z-0-9]+\.)*[a-z-0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}/',$email)){
	return true;
	}else{
	return false;
	}
};

function checkPassword($password){
	if(preg_match('/[\s\)\(\+\-\$\.\\\%\^\?\|\[\]]/',$password)){
	return false;
	}elseif(preg_match('/[A-Z]+/',$password)&&preg_match('/[a-z]+/',$password)&&preg_match('/[0-9]+/',$password)&&preg_match('/^.{8,128}$/',$password)){
	return true;
	}else{		
	return false;
	}
};

function checkPhone($phone){
	if(preg_match('/[^\d]/',$phone)){
	return false;
	}elseif(preg_match('/\d{6,20}/',$phone,$arr)){
	return true;
	}else{		
	return false;
	}
};

function checkLogin($login){
	if(preg_match('/\w{2,32}/i',$login)){
	return true;
	}else{
	return false;	
	}
};

function checkName($name){
	if(preg_match('/[^а-яёa-z]/iu',$name,$arr)){
		return true;	
	}else{
		return false;			
	}
};

function checkFeatName($name){
	if(preg_match('/[^0-9а-яёa-z ]/iu',$name,$arr)){
		return true;	
	}else{
		return false;			
	}
};

?>