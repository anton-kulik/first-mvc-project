<?php

namespace Controller;


use Model\AdminModel;
use Model\CommentsModel;

class AdminController extends BaseController
{
    protected $layout = 'administrator';
    protected $name = 'Index/admin';

    public function isAdmin()
    {
        if (isset($_SESSION['type']) && $_SESSION['type'] == 'administrator') {
            return true;
        }
        return false;
    }

    public function panel()
    {
        if ($this->isAdmin()) {
            $users = new AdminModel();
            $this->data['users'] = $users->allUsers();
            $this->render('panel');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function deleteUser($id)
    {
        if ($this->isAdmin()) {
            $user = new AdminModel();
            if ($user->deleteUser($id)) {
                echo '<script>window.location=\'/admin/panel\'</script>';
            }
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    /**
     * function for categories
     * */

    public function categories()
    {
        if ($this->isAdmin()) {
            $categories = new AdminModel();
            $this->data['categories'] = $categories->allCategories();
            $this->render('categories');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function addCategory()
    {
        if ($this->isAdmin()) {
            if (isset($_POST) && isset($_POST['title'])) {
                $category = new AdminModel();
                $data['title'] = $_POST['title'];
                if (isset($_POST['description'])) {
                    $data['description'] = $_POST['description'];
                }
                if ($category->saveCategory($data)) {
                    echo '<script>window.location=\'categories\'</script>';
                }
            }
            $this->render('addCategory');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function editCategory($id)
    {
        if ($this->isAdmin()) {

            if (isset($_POST) && isset($_POST['title'])) {
                $category = new AdminModel();

                $data['title'] = $_POST['title'];
                $data['id'] = $_POST['id'];

                if (isset($_POST['description'])) {
                    $data['description'] = $_POST['description'];
                }

                $update = $category->updateCategory($data);
				
                if ($update) {
                    echo '<script>window.location=\'/admin/categories\'</script>';
                }
            }

            $category = new AdminModel();
            $this->data['category'] = $category->editCategory($id);
            $this->render('editCategory');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }

    }

    public function deleteCategory($id)
    {
        if ($this->isAdmin()) {

            $category = new AdminModel();
            $category->deleteCategory($id);
            echo '<script>window.location=\'/admin/categories/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }


    /**
     * function for articles
     * */

    public function articles()
    {
        if ($this->isAdmin()) {
            $articles = new AdminModel();
            $this->data['articles'] = $articles->allArticles();
            $this->render('articles');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function addArticle()
    {
        if ($this->isAdmin()) {

            if (isset($_POST) && isset($_POST['title'])) {
                $article = new AdminModel();

                $data['title'] = $_POST['title'];
                $data['category'] = $_POST['category'];
                $data['date'] = $_POST['date'];
                $data['text'] = $_POST['text'];
                $data['image'] = ($_FILES['image']);

                if (isset($_POST['tags'])) {
                    $data['tags'] = $_POST['tags'];
                }

                if ($article->saveArticle($data)) {
                    echo '<script>window.location=\'articles\'</script>';
                }
            }

            $article = new AdminModel();
            $this->data['category'] = $article->allCategories();
            $this->render('addArticle');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function editArticle($id)
    {
        if ($this->isAdmin()) {

            if (isset($_POST) && isset($_POST['title'])) {
                $article = new AdminModel();

                $data['title'] = $_POST['title'];
                $data['id'] = $_POST['id'];

                if (isset($_POST['description'])) {
                    $data['description'] = $_POST['description'];
                }

                $update = $article->updateArticle($data);

                if ($update) {
                    echo '<script>window.location=\'/admin/category\'</script>';
                }
            }
            $article = new AdminModel();
            $this->data['article'] = $article->editArticle($id);
            $this->render('editArticle');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }


    public function editPubArticle($id)
    {
        if ($this->isAdmin()) {
            $article = new AdminModel();
            $article->changePublishedArticle($id);
            echo '<script>window.location=\'/admin/articles/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function deleteArticle($id)
    {
        if ($this->isAdmin()) {
            $article = new AdminModel();
            $article->deleteArticle($id);
            echo '<script>window.location=\'/admin/articles/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }


    /** Теперь настройки
     */

    public function settings()
    {
        if ($this->isAdmin()) {

            if (isset($_POST['action']) && $_POST['action'] == 'changeBgImage') {

                $image = new AdminModel();
                $data = ($_FILES['image']);

                if ($image->saveImage($data)) {
                    $message = '<div class="alert alert-success" role="alert">Фон установлен, теперь очистите кэш браузера и обновите страницу чтобы увидеть изменения</div>';
                    $this->message = $message;
                }
            }

            if (isset($_POST['action']) && $_POST['action'] == 'delBgImage') {

                $image = new AdminModel();

                if ($image->delBgImage()) {
                    $message = '<div class="alert alert-success" role="alert">Фон удален</div>';
                    $this->message = $message;
                } else {
                    $message = '<div class="alert alert-danger" role="alert">Нечего удалять, фон не был установлен</div>';
                    $this->message = $message;
                }
            }

            if (isset($_POST['action']) && $_POST['action'] == 'changeHeadColor') {

                $color = $_POST['headColor'];

                $headColor = new AdminModel();
                $headColor->changeHeadColor($color);
            }


            $this->render('settings');

        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    /** Комментарии */

    public function comments()
    {
        if ($this->isAdmin()) {
            $comments = new AdminModel();
            $this->data['comments'] = $comments->allComments();
            $this->render('comments');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function commentsToModerate()
    {
        if ($this->isAdmin()) {
            $comments = new AdminModel();
            $this->data['comments'] = $comments->getUnPublishedComments();
            $this->render('commentsToModerate');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function editComment($id)
    {
        if ($this->isAdmin()) {

            if (isset($_POST) && isset($_POST['text'])) {
                $comment = new AdminModel();

                $data['text'] = $_POST['text'];
                $data['id'] = $_POST['id'];

                $update = $comment->updateComment($data);

                if ($update) {
                    echo '<script>window.location=\'/admin/comments\'</script>';
                }
            }

            $comment = new CommentsModel();
            $this->data['comment'] = $comment->getCommentForAdmin($id);
            $this->render('editComment');

        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function editPubComment($id)
    {
        if ($this->isAdmin()) {
            $comment = new AdminModel();
            $comment->changePublished($id);
            echo '<script>window.location=\'/admin/comments/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function editPubCommentInUnPublished($id)
    {
        if ($this->isAdmin()) {
            $comment = new AdminModel();
            $comment->changePublished($id);
            echo '<script>window.location=\'/admin/commentsToModerate/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function deleteComment($id)
    {
        if ($this->isAdmin()) {
            $article = new AdminModel();
            $article->deleteComment($id);
            echo '<script>window.location=\'/admin/comments/\'</script>';
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }

    public function ad()
    {
        if ($this->isAdmin()) {
            $this->render('ad');
        } else {
            echo '<script>window.location=\'/\'</script>';
        }
    }
}