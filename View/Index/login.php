<style>
    /*Тут меняем цвет меню*/
    .navbar-default {
        background-color: <?php echo $data['settings'][0]['headColor'] ?>
    }
</style>

<h1>Вход</h1>

<?php
if (isset($message)) {
    echo $message;
}
?>

<form class="form-horizontal" method="post">
    <div class="form-group">
        <input name="login" type="text" class="form-control" placeholder="Логин">
    </div>
    <div class="form-group">
        <input name="password" type="password" class="form-control" placeholder="Пароль">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Войти</button>
    </div>
</form>



