<?php

namespace Controller;


use Model\AdminModel;
use Model\CommentsModel;
use Model\UserModel;

class UserController extends BaseController
{
    public function login()
    {

        $settings = new AdminModel();
        $this->data['settings'] = $settings->getSettings();

        if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

            $user = new UserModel();

            $login = $_POST['login'];
            $password = $_POST['password'];

            if ($user->checkLogin($login, $password)) {

                $userSettings = $user->userSettings($login);

                $_SESSION['type'] = $userSettings['type'];
                $_SESSION['isLogged'] = true;
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $userSettings['id'];

                echo '<script>window.location=\'/\'</script>';
                die;

            } else {

                $msg = '<div class="alert alert-danger" role="alert">
                             <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                             <span class="sr-only">Ошибка!</span>Неправильный логин или пароль</div>';

                $this->message = $msg;
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        unset($_SESSION['isLogged']);
        unset($_SESSION['type']);
        unset($_SESSION['login']);
        echo '<script>window.location=\'/\'</script>';
    }

    public function cabinet()
    {
        $this->render('cabinet');
    }

    public function commentsList($id)
    {
        $userComments = new CommentsModel();
        $this->data['comments'] = $userComments->getCommentsById($id);
        $this->render('userComments');
    }
}