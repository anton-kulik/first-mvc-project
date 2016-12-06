<?php

namespace Controller;


use Model\BaseModel;
use Model\CommentsModel;


class ArticleController extends BaseController
{
    public function article($id)
    {
        $articleModel = new BaseModel();
        $this->data['data'] = $articleModel->getArticle($id);
        $this->render('article');
    }

    public function tag($tag)
    {
        $articleModel = new BaseModel();
        $this->data['articles'] = $articleModel->getByTag($tag);
        $this->data['tag'] = $tag;
        $this->render('listByTag');
    }

    public function like($comment_id)
    {
        $like = new CommentsModel();
        $like->like($comment_id);
        echo '<p class="bg-success">Ваше мнение засчитано</p><br><button type="button" class="btn btn-default btn-lg" onclick="history.back();">Назад</button>';
    }

    public function disLike($comment_id)
    {
        $like = new CommentsModel();
        $like->disLike($comment_id);
        echo '<p class="bg-success">Ваше мнение засчитано</p><br><button type="button" class="btn btn-default btn-lg" onclick="history.back();">Назад</button>';
    }
}