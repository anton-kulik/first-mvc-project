<?php

namespace Model;

use Common\DB;

class BaseModel
{
    protected $db;
    protected $table;
    protected $validations = array();

    public function checkLogin($login, $password)
    {
        $user = $this->db->query('SELECT * FROM `' . $this->table . '` WHERE `login` = ' . "'$login'");
        if (isset($user[0]['login'])) {
            if ($user[0]['password'] == $password) {
                return true;
            }
        }

        return false;
    }

    public function __construct()
    {
        $this->db = new DB();
    }

    /** page должна делать сдвиг по выборке для пагинации
     *  по умолчанию page = 1, то есть сдвиг с первого
     *  меньшего id статьи в соотвествующей категории
     */
    public function all($page)
    {
        $result = $this->db->query('SELECT * 
                                    FROM `' . $this->table . '`'.
                                   ' WHERE cat_id ='. $this->cat_id .
                                   ' ORDER BY `date` DESC LIMIT 5 ' .
                                   ' OFFSET ' . $page);
        return $result;
    }

    public function get($id)
    {
        $id = intval($id);
        $result = $this->db->query('SELECT * FROM `' . $this->table . '` WHERE id=' . $id);

        return $result[0];
    }

    public function getByTag($tag)
    {
        $result = $this->db->query('SELECT * FROM `articles` WHERE `meta_tags` LIKE ' . '\'%' . $tag . '%\'');
        return $result;
    }

    public function lastArticles()
    {
        $result = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE cat_id=' . $this->cat_id . ' ORDER BY `date` DESC LIMIT 5');
        return $result;
    }


    public function lastNews()
    {
        $connect = mysqli_connect("localhost", "user", "password", "db_name");

        $query = "SELECT * FROM articles
                  ORDER BY `date` DESC
                  LIMIT 3";

        $data = mysqli_query($connect, $query);
        mysqli_close($connect);
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }

        return $result;
    }

    /** В запросе выбираем материалы, у оторых больше всего комментариев */
    public function getTopArticles()
    {
        $result = $this->db->query("SELECT articles.title,
                                           articles.id,
                                    COUNT(comments.id) AS 'CommonComments'
                                    FROM `articles`
                                    LEFT JOIN comments ON comments.article_id = articles.id
                                    GROUP BY articles.title
                                    ORDER BY COUNT(comments.id) DESC
                                    LIMIT 3");

        return $result;
    }


    public function getSettings()
    {
        $query = 'SELECT `headColor` FROM `settings`';
        return $this->db->query($query);
    }

    public function searchArticle($string)
    {
        $query = "SELECT * FROM `articles` WHERE `title` LIKE '%{$string}%'";
        return $this->db->query($query);
    }
}