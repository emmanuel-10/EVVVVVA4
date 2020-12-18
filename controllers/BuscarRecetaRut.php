<?php

namespace controllers;

use modelo\RecetaModel as RecetaModel;

require_once("../modelo/RecetaModel.php");

class BuscarRecetaRut{
    public $rut;

    public function __construct(){
        $this->rut = $_POST['rut'];
    }

    public function recetas(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->recetaRut($this->rut);
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}

$obj = new BuscarRecetaRut();
$obj->recetas();