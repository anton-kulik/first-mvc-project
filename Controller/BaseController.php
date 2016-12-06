<?php

namespace Controller;


use Model\BaseModel;

class BaseController
{
    protected $name = 'Index';
    protected $layout = 'default';

    /* data for views */
    protected $data;
    protected $message;

    protected function render($templateName)
    {
		$this->name = str_replace('\\', '/', $this->name);
		
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . 'View' . DS . $this->name . DS . $templateName . '.php';
        $content = ob_get_clean();

        include SITE_DIR . DS . 'View' . DS . 'Layout' . DS . $this->layout . '.php';
    }

    protected function render404()
    {
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . 'View' . DS . '404.php';
        $content = ob_get_clean();

        include SITE_DIR . DS . 'View' . DS . 'Layout' . DS . $this->layout . '.php';
    }

    public function search($srting)
    {
        $string = $_POST['search'];
        $search = new BaseModel();
        $this->data['articles'] = $search->searchArticle($string);
        $this->render('searchResult');
    }
}