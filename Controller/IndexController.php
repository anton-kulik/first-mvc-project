<?php

namespace Controller;

use Model\AdminModel;
use Model\BaseModel;
use Model\CommentsModel;
use Model\PoliticModel;
use Model\FinanceModel;
use Model\ItModel;
use Model\CriminalModel;


class IndexController extends BaseController
{
    protected $name = 'Index';

    public function index()
    {
        if (isset($_GET['search'])) {
            $string = $_GET['search'];
            $search = new BaseModel();
            $this->data['articles'] = $search->searchArticle($string);
            $this->render('searchResult');
        } else {

            $settings = new AdminModel();
            $this->data['settings'] = $settings->getSettings();

            $this->data['siteName'] = SITE_NAME;

            $lastNews = new BaseModel();
            $this->data['lastNews'] = $lastNews->lastNews();

            $financeModel = new FinanceModel();
            $this->data['finance'] = $financeModel->lastArticles();

            $politicModel = new PoliticModel();
            $this->data['politic'] = $politicModel->lastArticles();

            $itModel = new ItModel();
            $this->data['it'] = $itModel->lastArticles();

            $criminalModel = new CriminalModel();
            $this->data['criminal'] = $criminalModel->lastArticles();

            $topComments = new CommentsModel();
            $this->data['topComments'] = $topComments->getTopComments();

            $topArticles = new BaseModel();
            $this->data['topArticles'] = $topArticles->getTopArticles();

            $this->render('main');
        }
    }
}