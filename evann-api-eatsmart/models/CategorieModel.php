<?php

class CategorieModel
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
    
    public function getDBAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM Categorie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBCategorieById($idCategorie){
        $stmt = $this->pdo->prepare("SELECT * FROM Categorie WHERE id_categorie = :idCategorie");
        $stmt->bindValue(":idCategorie", $idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
