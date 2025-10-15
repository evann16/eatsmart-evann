<?php

require_once "./models/ArticleModel.php";

class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    public function getAllArticles()
    {
        $articles = $this->model->getDBAllArticles();
        echo json_encode($articles);
    }

    public function getArticleById ($idArticle){
        $lignesArticles = $this->model->getDBArticleById($idArticle);
        echo json_encode($lignesArticles);
    }

    public function getCommandeByArticleId ($idArticle){
        $commandeId = $this->model->getDBcommandeByArticleId($idArticle);
        return $commandeId;
    }

    public function createArticle($data) {
        $ligneArticle = $this->model->createDBArticle($data);
        http_response_code(201);
        echo json_encode($ligneArticle);
    }
}
