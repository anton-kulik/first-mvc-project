<?php

namespace Model;


class CommentsModel extends BaseModel
{
    protected $table = 'comments';

    public function getTopComments()
    {
        $result = $this->db->query("SELECT comments.id as 'id',
                                            users.login as 'login',
                                            users.id as user_id,
                                            articles.title,
                                            comments.text,
                                            comments.likes,
                                            comments.dislikes,
                                            comments.article_id,
                                            comments.published
                                            FROM `" . $this->table .
            '` LEFT JOIN `articles` ON articles.id = comments.article_id ' .
            ' LEFT JOIN `users` ON users.id = comments.user_id ' .
            ' WHERE comments.published = 1 ' .
            ' ORDER BY `likes` DESC LIMIT 5');

        return $result;
    }

    public function getCommentsById($id)
    {
        $result = $this->db->query('SELECT comments.text,
                                    users.login,
                                    articles.title
                                    FROM `comments`
                                    LEFT JOIN users ON users.id = comments.user_id
                                    LEFT JOIN articles ON articles.id = comments.article_id
                                    WHERE user_id = ' . $id);

        return $result;
    }

    public function getCommentById($id)
    {
        $result = $this->db->query("SELECT  comments.id as 'id',
                                            users.login as 'login',
                                            comments.text,
                                            comments.likes,
                                            comments.dislikes,
                                            comments.article_id,
                                            comments.published
                                    FROM `" . $this->table .
            '` LEFT JOIN users ON users.id = comments.user_id ' .
            ' WHERE `article_id` = ' . $id .
            ' AND `published` = 1 ' .
            ' ORDER BY `likes` DESC');

        return $result;
    }

    public function getCommentForAdmin($id)
    {
        $result = $this->db->query("SELECT * FROM `" . $this->table .
            '` ' . ' WHERE `id` = ' . $id);

        return $result;
    }


    public function like($comment_id)
    {
        $result = $this->db->execute('UPDATE `' . $this->table .
            '` SET `likes` = `likes` + 1' .
            ' WHERE `id` = ' . $comment_id);

        return $result;
    }

    public function disLike($comment_id)
    {
        $result = $this->db->execute('UPDATE `' . $this->table .
            '` SET `dislikes` = `dislikes` + 1' .
            ' WHERE `id` = ' . $comment_id);

        return $result;
    }


    /** Заносим данные в бд, по умолчанию коммент не опубликован */
    public function addComment($user_id, $article_id, $text)
    {
        $result = $this->db->execute("INSERT INTO `{$this->table}` SET user_id = {$user_id}" .
            ", likes = 0 " .
            ", dislikes = 0 " .
            ", published = 0 " .
            ", text ='{$text}'" .
            ", `date` = (now())" .
            ", article_id = " . $article_id);

        return $result;
    }
}