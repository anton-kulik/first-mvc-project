<?php

namespace Controller;

use Model\AdminModel;
use Model\CommentsModel;
use Model\PoliticModel;

class PoliticController extends BaseController
{
    public function all($page)
    {
        $settings = new AdminModel();
        $this->data['settings'] = $settings->getSettings();

        $page = intval($page);
        $politicModel = new PoliticModel();
        $this->data['articles'] = $politicModel->all($page);
        $this->render('politic');
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

        $politicModel = new PoliticModel();
        $this->data['article'] = $politicModel->get($id);

        $comments = new CommentsModel();
        $this->data['comments'] = $comments->getCommentById($id);

        $this->render('article');
    }
}






