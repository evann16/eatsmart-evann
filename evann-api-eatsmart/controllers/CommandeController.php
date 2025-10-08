<?php

require_once "./models/CommandeModel.php";

class CommandeController
{
    private $model;

    public function __construct()
    {
        $this->model = new CommandeModel();
    }

    public function getAllCommandes()
    {
        $commandes = $this->model->getDBAllCommandes();
        echo json_encode($commandes);
    }

    public function getCommandeById ($idCommande){
        $lignesCommandes = $this->model->getDBCommandeById($idCommande);
        echo json_encode($lignesCommandes);
    }
}
