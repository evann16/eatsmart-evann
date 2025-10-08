<?php

class CommandeModel
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
    
    public function getDBAllCommandes()
    {
        $stmt = $this->pdo->query("SELECT * FROM Commande");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBCommandeById($idCommande){
        $stmt = $this->pdo->prepare("SELECT * FROM Commande WHERE id_commande = :idCommande");
        $stmt->bindValue(":idCommande", $idCommande, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBArticleByCommandeId($idCommande) {
        $stmt = $this->pdo->prepare("SELECT id_article FROM assoc_article_commande WHERE id_commande = :idCommande");
        $stmt->bindValue(":idCommande", $idCommande, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
