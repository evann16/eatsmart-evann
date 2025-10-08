<?php
require_once "controllers/ArticleController.php";
require_once "controllers/CategorieController.php";
require_once "controllers/CommandeController.php";

$articleController = new ArticleController();
$categorieController = new CategorieController();
$commandeController = new CommandeController();

if (empty($_GET["page"])) {
    echo "La page n'existe pas";
} 
else {

    $url = explode("/", $_GET['page']);
    
    print_r($url);

    switch($url[0]) {
        case "articles" : 
            if (isset($url[1])) {
                $articleController->getArticleById($url[1]);
            } else {
                print_r($articleController->getAllArticles());
            }
            break;
        case "categories" : 
            if (isset($url[1])) {
                echo "Afficher les informations de la categorie : ". $url[1];
            } else {
                print_r($categorieController->getAllCategories());
            }
            break;
        case "commandes" : 
            if (isset($url[1])) {
                echo "Afficher les informations de la commande : ". $url[1];
            } else {
                print_r($commandeController->getAllCommandes());
            }
            break;

        default :
            echo "La page n'existe pas";
    }
}