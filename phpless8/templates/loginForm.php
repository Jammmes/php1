<form class="form-inline border p-2 justify-content-center"  method="post" action = "/user-auth">
    <label for="login" class="sr-only">Логин</label>
    <input type="text" name = "login" class="form-control m-2" id="login" placeholder="Login" value="<?=$login;?>">
    <label for="pass" class="sr-only">Пароль</label>
    <input type="password" name = "password" class="form-control m-2" id="pass" placeholder="Password" value="<?=$password;?>">
    <input type="checkbox" name = "isRemember" class="form-check-input m-2" id="rememberMe" <?=$remember;?>>
    <label class="form-check-label" for="rememberMe">Запомнить пароль</label>
    <button type="submit" class="btn btn-primary m-2">Вход</button>
</form>