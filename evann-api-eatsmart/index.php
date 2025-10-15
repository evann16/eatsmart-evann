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
    
    $method = $_SERVER["REQUEST_METHOD"];

    switch($url[0]) {
        case "articles" : 
            switch ($method){
                case "GET":
                    if (isset($url[1])) {

                        $articleController->getArticleById($url[1]);

                        if (isset($url[2]) && $url[2] =="commandes"){
                        
                            $commandeIds = $articleController->getCommandeByArticleId($url[1]);
                            
                            foreach ($commandeIds as $commandeId) {
                                $commandeController->getCommandeById($commandeId);
                            }
                        }
                    } else {
                        $articleController->getAllArticles();
                    }
                    break;  
                case "POST":
                    $data = json_decode(file_get_contents("php://input"),true);
                    $articleController->createArticle($data);
                    break;              
                case "DELETE":
                    if (isset($url[1])) {
                        $articleController->deleteArticle($url[1]);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message"=> "ID de l'article manquant dans l'URL"]);
                    }
                    break;
                case "PUT":
                    if (isset($url[1])) {
                        $data = json_decode(file_get_contents("php://input"),true);
                        $articleController->updateArticle($url[1],$data);
                    } else {
                        http_response_code(400);
                        echo json_encode(["message"=> "ID de l'article manquant dans l'URL"]);
                    }
                    break;
            }
            break;
        case "categories" : 
            if (isset($url[1])) {
                $categorieController->getCategorieById($url[1]);
            } if (isset($url[2]) && $url[2] =="articles"){
                $categorieController->getArticleByCategorieId($url[1]);
            } else {
                print_r($categorieController->getAllCategories());
            }
            break;
        case "commandes" : 
            if (isset($url[1])) {
                $commandeController->getCommandeById($url[1]);
            } if (isset($url[2]) && $url[2] =="articles"){
                
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