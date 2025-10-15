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

    public function getDBArticleByCategorieId($idCategorie){
        $stmt = $this->pdo->prepare("SELECT * FROM Article WHERE id_categorie = :idCategorie");
        $stmt->bindValue(":idCategorie", $idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDBCategorie($data){
        $req = "INSERT INTO categorie (id_categorie, nom)
                VALUES (:id_categorie, :nom)";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(":id_categorie", $data['id_categorie'], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $data['nom'], PDO::PARAM_STR);
        
        $stmt->execute();

        $categorie = $this->getDBCategorieById($data['id_categorie']);

        return $categorie;
    }

    public function deleteDBCategorie ($id){
        $req = "DELETE FROM categorie
                WHERE id_categorie = :id";
                
        $stmt = $this->pdo->prepare($req);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }

    public function updateDBCategorie ($id, $data){
        $req = "UPDATE categorie
                SET id_categorie = :id_categorie, nom = :nom
                WHERE id_categorie = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(":id_categorie", $data['id_categorie'], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $data['nom'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }
}
