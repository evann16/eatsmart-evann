<?php

require_once "./models/CategorieModel.php";

class CategorieController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategorieModel();
    }

    public function getAllCategories()
    {
        $categories = $this->model->getDBAllCategories();
        echo json_encode($categories);
    }

    public function getCategorieById ($idCategorie){
        $lignesCategories = $this->model->getDBCategorieById($idCategorie);
        echo json_encode($lignesCategories);
    }

    public function getArticleByCategorieId ($idCategorie){
        $lignesCategories = $this->model->getDBArticleByCategorieId($idCategorie);
        echo json_encode($lignesCategories);
    }

    public function createCategorie($data) {
        $ligneCategorie = $this->model->createDBCategorie($data);
        http_response_code(201);
        echo json_encode($ligneCategorie);
    }

    public function deleteCategorie($id) {      
        $success = $this->model->deleteDBCategorie($id);
        if ($success) {
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "categorie introuvable"]);
        }
    }

    public function updateCategorie($id, $data) {      
        $success = $this->model->updateDBCategorie($id, $data);
        if ($success) {
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "categorie non trouvé ou non modifié"]);
        }
    }
}
