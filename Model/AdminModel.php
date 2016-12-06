<?php

namespace Model;


class AdminModel extends BaseModel
{
    public function allUsers()
    {
        $result = $this->db->query('SELECT * FROM `users` ORDER BY `id` ASC');
        return $result;
    }

    public function deleteUser($id)
    {
        $id = intval($id);

        $this->db->execute('DELETE FROM comments WHERE user_id =' . $id);
        $this->db->execute('DELETE FROM `users` WHERE id =' . $id);
        return true;
    }

    /* Категории */

    public function allCategories()
    {
        $result = $this->db->query('SELECT * FROM `categories` ORDER BY `id` ASC');
        return $result;
    }

    public function saveCategory($data)
    {
        if (isset($data['description'])) {
            $query = "INSERT INTO `categories` SET
                      `title` = '{$data['title']}',
                      `description` = '{$data['description']}'";

            return $this->db->execute($query);
        }

        $query = "INSERT INTO `categories` SET
                  `title` = '{$data['title']}'";

        return $this->db->execute($query);
    }

    public function updateCategory($data)
    {
        if (isset($data['description'])) {
            $query = "UPDATE `categories` SET
                      `title` = '{$data['title']}',
                      `description` = '{$data['description']}'
                      WHERE id = {$data['id']}";

            return $this->db->execute($query);
        }

        $query = "UPDATE `categories` SET
                  `title` = '{$data['title']}'
                  WHERE id = {$data['id']}";

        return $this->db->execute($query);
    }

    public function editCategory($id)
    {
        $query = "SELECT * FROM `categories` WHERE id = {$id}";
        return $this->db->query($query);
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM `categories` WHERE `id`={$id};";
        return $this->db->execute($query);
    }


    /* Methods for Articles */

    public function allArticles()
    {
        $result = $this->db->query('SELECT * FROM `articles` ORDER BY `id` ASC');
        return $result;
    }

    public function saveArticle($data)
    {
        if (isset($data['tags'])) {

            $name = time() . '.' . $data['image']['name'];
            $path = 'img/articles/' . $name;
            move_uploaded_file($data['image']['tmp_name'], $path);

            $query = "INSERT INTO `articles` SET
                      `title` = '{$data['title']}',
                      `cat_id` = '{$data['category']}',
                      `date` = '{$data['date']}',
                      `text` = '{$data['text']}',
                      `image` = '{$name}',
                      `meta_tags` = '{$data['tags']}'";

            return $this->db->execute($query);
        }

        $name = time() . '.' . $data['image']['name'];
        $path = 'img/articles/' . $name;
        move_uploaded_file($data['image']['tmp_name'], $path);

        $query = "INSERT INTO `articles` SET
                  `title` = '{$data['title']}',
                  `cat_id` = '{$data['category']}',
                  `date` = '{$data['date']}',
                  `text` = '{$data['text']}',
                  `image` = '{$name}'";

        return $this->db->execute($query);
    }

    public function updateArticle($data)
    {
        if (isset($data['description'])) {
            $query = "UPDATE `articles` SET
                      `title` = '{$data['title']}',
                      `description` = '{$data['description']}'
                      WHERE id = {$data['id']}";

            return $this->db->execute($query);
        }

        $query = "UPDATE `articles` SET
                      `title` = '{$data['title']}'
                      WHERE id = {$data['id']}";

        return $this->db->execute($query);
    }

    public function editArticle($id)
    {
        $query = "SELECT * FROM `articles` WHERE id = {$id}";
        return $this->db->query($query);
    }

    public function changePublishedArticle($id)
    {
        $publishedStatus = "SELECT `published` FROM `articles` WHERE id = {$id}";
        $publishedStatus = $this->db->query($publishedStatus);
        $status = $publishedStatus[0]['published'];

        if ($status == 0) {
            $query = "UPDATE `articles` SET `published` = 1 WHERE id = {$id}";
            return $this->db->execute($query);

        } elseif ($status == 1) {
            $query = "UPDATE `articles` SET `published` = 0 WHERE id = {$id}";
            return $this->db->execute($query);
        }
    }

    public function deleteArticle($id)
    {
        $query = "DELETE FROM `articles` WHERE `id`={$id};";
        return $this->db->execute($query);
    }


    /** Тепер настройки
     */

    public function saveImage($data)
    {
        $path = 'img/bg/bg.jpg';
        if (move_uploaded_file($data['tmp_name'], $path)) {
            return true;
        }
    }

    public function delBgImage()
    {
        $bgImage = 'img/bg/bg.jpg';

        if (file_exists($bgImage)) {
            unlink($bgImage);
            return true;
        }
    }

    public function changeHeadColor($color)
    {
        $query = "UPDATE `settings` SET `headColor` = '{$color}'";
        return $this->db->execute($query);
    }


    /** Комментарии */

    public function allComments()
    {
        $result = $this->db->query('SELECT comments.id, comments.text,
                                    comments.likes,
                                    comments.dislikes,
                                    comments.published,
                                    comments.article_id,
                                    comments.date,
                                    users.login,
                                    articles.title
                                    FROM `comments`
                                    LEFT JOIN `users` ON users.id = comments.user_id
                                    LEFT JOIN `articles` ON articles.id = comments.article_id
                                    ORDER BY comments.date DESC');
        return $result;
    }

    public function getUnPublishedComments()
    {
        $result = $this->db->query('SELECT comments.id, comments.text,
                                    comments.likes,
                                    comments.dislikes,
                                    comments.published,
                                    comments.article_id,
                                    comments.date,
                                    users.login,
                                    articles.title
                                    FROM `comments`
                                    LEFT JOIN `users` ON users.id = comments.user_id
                                    LEFT JOIN `articles` ON articles.id = comments.article_id
                                    WHERE comments.published = 0
                                    ORDER BY comments.date DESC');
        return $result;
    }

    public function updateComment($data)
    {
        $query = "UPDATE `comments` SET
                      `text` = '{$data['text']}'
                      WHERE id = {$data['id']}";

        return $this->db->execute($query);
    }

    public function editComment($id)
    {
        $query = "SELECT * FROM `comments` WHERE id = {$id}";
        $result = $this->db->query($query);
        return $result;
    }

    public function changePublished($id)
    {
        $publishedStatus = "SELECT `published` FROM `comments` WHERE id = {$id}";
        $publishedStatus = $this->db->query($publishedStatus);
        $status = $publishedStatus[0]['published'];

        if ($status == 0) {
            $query = "UPDATE `comments` SET `published` = 1 WHERE id = {$id}";
            return $this->db->execute($query);

        } elseif ($status == 1) {
            $query = "UPDATE `comments` SET `published` = 0 WHERE id = {$id}";
            return $this->db->execute($query);
        }
    }

    public function deleteComment($id)
    {
        $query = "DELETE FROM `comments` WHERE `id`={$id};";
        return $this->db->execute($query);
    }
}