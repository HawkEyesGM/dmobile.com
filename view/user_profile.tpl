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

<a href="/"><img id="close_prof" src="static/img/close-button.png"></a>


<form action="process/users/change_user_profile.php" method="POST" enctype="multipart/form-data">
	<div>
		<p><b>Аватар </b><p>
		<img src="images/users_avatars/<?=$user['avatar'];?>" class="avaprof" alt="avatar" width=100px;>
		<a href="?route=user_profile_edit"><img id="edit_prof" src="static/img/edit.png"  title="редактировать"></a>		
	</div><br>

	<div>
		Имя: <?=$user['name'];?>
		<a href="?route=user_profile_edit"><img id="edit_prof" src="static/img/edit.png"  title="редактировать"></a><br>				
	</div><br>

	<div>
		Фамилия: <?=$user['sec_name'];?>
		<a href="?route=user_profile_edit"><img id="edit_prof" src="static/img/edit.png"  title="редактировать"></a><br>				
	</div><br>

	<div>
		Телефон: <?=$user['phone'];?>
		<a href="?route=user_profile_edit"><img id="edit_prof" src="static/img/edit.png"  title="редактировать"></a><br>				
	</div><br>

	<div>
		Email: <?=$user['email'];?>
		<a href="?route=user_profile_edit"><img id="edit_prof" src="static/img/edit.png"  title="редактировать"></a><br>				
	</div>
	<br><br>

</form>
<?mysqli_close($dbc);?>

	</div>
</div>