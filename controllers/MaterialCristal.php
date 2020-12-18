<?php

namespace controllers;

use modelo\RecetaModel as RecetaModel;

require_once("../modelo/RecetaModel.php");

class MaterialCristal{

    public function getMateriales(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->getMaterialCristal();
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso denegado"]);
        }
    }
}
$obj = new MaterialCristal();
$obj->getMateriales();