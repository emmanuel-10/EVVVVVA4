<?php

namespace controllers;

use modelo\RecetaModel as RecetaModel;

require_once("../modelo/RecetaModel.php");

class Armazon{

    public function getMateriales(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->getArmazones();
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso denegado"]);
        }
    }
}
$obj = new Armazon();
$obj->getMateriales();