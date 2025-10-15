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

    public function getDBCommandeByArticleId($idArticle) {
        $stmt = $this->pdo->prepare("SELECT id_commande FROM assoc_article_commande WHERE id_article = :idArticle");
        $stmt->bindValue(":idArticle", $idArticle, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function createDBArticle($data){
        $req = "INSERT INTO article (id_article, nom, prix, description, id_categorie)
                VALUES (:id_article, :nom, :prix, :description, :id_categorie)";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(":id_article", $data['id_article'], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(":prix", $data['prix'], PDO::PARAM_INT);
        $stmt->bindParam(":description", $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(":id_categorie", $data['id_categorie'], PDO::PARAM_INT);
        
        $stmt->execute();

        $article = $this->getDBArticleById($data['id_article']);

        return $article;
    }

    public function deleteDBArticle ($id){
        $req = "DELETE FROM article
                WHERE id_article = :id";
                
        $stmt = $this->pdo->prepare($req);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }

    public function updateDBArticle ($id, $data){
        $req = "UPDATE article
                SET id_article = :id_article, nom = :nom, prix = :prix, description = :description, id_categorie = :id_categorie
                WHERE id_article = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(":id_article", $data['id_article'], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(":prix", $data['prix'], PDO::PARAM_INT);
        $stmt->bindParam(":description", $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(":id_categorie", $data['id_categorie'], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }

}
