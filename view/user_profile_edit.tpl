<?
session_start();
include 'db/config/config.php';?>

<link rel="stylesheet" href="/static/css/style.css">
<div class="regBack">
	<div class="newReg">
<!-- читаем из базы все поля профиля -->
<?
$id=$_SESSION['iduser'];
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,"HawkEyes");
if(!$dbc){	
	//код вывода страницы ошибки (Проводятся технические работы)		
	die();
}
$query="SELECT `email`, `password`, `name`, `sec_name`, `phone`, `avatar`
		FROM `users`
		WHERE id=".$id.";";
$res=mysqli_query($dbc, $query);
$user=mysqli_fetch_assoc($res);
?>

<a href="?route=user_profile"><img id="close_prof" src="static/img/close-button.png"></a>

<form action="process/users/change_user_profile.php" method="POST" enctype="multipart/form-data">
	<div>
		<p><b>Аватар </b><p><img src="images/users_avatars/<?=$user['avatar'];?>" class="avaprof" alt="avatar" width=100px;>
		<input type="file" name="avatar" value="">
		<input type="hidden" name="name_ava"  value="<?=$user['avatar'];?>">
	</div>

	<div>
		Имя: <?=$user['name'];?><br>
		<input type="text" name="name" value="<?=$user['name'];?>">		
	</div>

	<div>
		Фамилия: <?=$user['sec_name'];?><br>
		<input type="text" name="sec_name" value="<?=$user['sec_name'];?>">		
	</div>

	<div>
		Телефон: <?=$user['phone'];?><br>
		<input type="text" name="phone" value="<?=$user['phone'];?>">		
	</div>

	<div>
		Email: <?=$user['email'];?><br>
		<input type="text" name="email" value="<?=$user['email'];?>">		
	</div>

	<!-- <div>
		Пароль: <br>
		<input type="text" name="password" placeholder="| Введите новый пароль">	
	</div> -->
	<br><br>

	<input type="submit"  value="Сохранить">

</form>
<?mysqli_close($dbc);?>

	</div>
</div>