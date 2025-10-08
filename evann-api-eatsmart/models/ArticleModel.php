<?php

class ArticleModel
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=eatsmart_bdd_bruno;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
    public function getDBAllArticles()
    {
        $stmt = $this->pdo->query("SELECT * FROM Article");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBArticleById($idArticle){
        $stmt = $this->pdo->prepare("SELECT * FROM Article WHERE id_article = :idArticle");
        $stmt->bindValue(":idArticle", $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
