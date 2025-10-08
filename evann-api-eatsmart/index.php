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

            } if (isset($url[2])=="commandes"){
                
                $commandeIds = $articleController->getCommandeByArticleId($url[1]);
                    
                foreach ($commandeIds as $commandeId) {
                    $commandeController->getCommandeById($commandeId);
                }
                
            } else {
                print_r($articleController->getAllArticles());
            }
            break;
        case "categories" : 
            if (isset($url[1])) {
                $categorieController->getCategorieById($url[1]);
            } if (isset($url[2])=="artcles"){
                $categorieController->getArticleByCategorieId($url[1]);
            } else {
                print_r($categorieController->getAllCategories());
            }
            break;
        case "commandes" : 
            if (isset($url[1])) {
                $commandeController->getCommandeById($url[1]);
            } if (isset($url[2])=="articles"){
                
                $articleIds = $commandeController->getArticleByCommandeId($url[1]);
                    
                foreach ($articleIds as $articleId) {
                    
                    $articleController->getArticleById($articleId);

                } 

            } else {
                print_r($commandeController->getAllCommandes());
            }
            break;

        default :
            echo "La page n'existe pas";
    }
}