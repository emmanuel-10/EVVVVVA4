<?php

namespace controllers;

use modelo\RecetaModel as RecetaModel;

require_once("../modelo/RecetaModel.php");

class BuscarRecetaFecha{
    public $fecha;

    public function __construct(){
        $this->fecha = $_POST['fecha'];
    }

    public function recetas(){
        session_start();
        if (isset($_SESSION['usuario'])) {
            $modelo = new RecetaModel();
            $arr = $modelo->recetaFecha($this->fecha);
            echo json_encode($arr);
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}

$obj = new BuscarRecetaFecha();
$obj->recetas();