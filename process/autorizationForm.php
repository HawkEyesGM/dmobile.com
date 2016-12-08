<?if ($_SESSION['auth']){?>
  <div class="hello_auth">
  <? echo "Здравствуй ". "<b>".$_SESSION['name']."</b>"; ?>
  </div>
<a href="?route=user_profile">Профиль</a>
  <a href="process/deleteAutorization.php">Выход</a>
<?}else{?>

  <form action="process/processForm.php" method="GET">
    <input class="regForm" type="text"  name="loginForm" placeholder="| login" required/>
    <a href="/?route=registration">Регистрация</a> <br>       
    <input class="regForm" type="text"  name="passwordForm" placeholder="| password" required/>  
    <input type="submit" id="authSubmit" value="Войти">        
  </form>

<?}?>