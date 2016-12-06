<?php

namespace Controller;

use Model\AdminModel;
use Model\CommentsModel;
use Model\CriminalModel;

class CriminalController extends BaseController
{
    public function all($page)
    {
        $settings = new AdminModel();
        $this->data['settings'] = $settings->getSettings();

        $page = intval($page);
        $criminalModel = new CriminalModel();
        $this->data['articles'] = $criminalModel->all($page);
        $this->render('criminal');
    }

    public function article($id)
    {
        if (isset($_POST['action']) && $_POST['action'] == 'addComment') {
            if (!$_SESSION['isLogged']) {
                $message = '<p class="bg-danger">Только авторизированные пользователя могут оставлять комментарии</p>';
                $this->message = $message;
            } else {
                $user_id = $_POST['user_id'];
                $article_id = $_POST['article_id'];
                $text = $_POST['text'];
                $comment = new CommentsModel();
                if($comment->addComment($user_id, $article_id, $text) != false) {
                    $message = '<p class="bg-danger">Комментарий появиться после проверки модератором</p>';
                    $this->message = $message;
                }
            }
        }

        $criminalModel = new CriminalModel();
        $this->data['article'] = $criminalModel->get($id);

        $comments = new CommentsModel();
        $this->data['comments'] = $comments->getCommentById($id);

        $this->render('article');
    }
}