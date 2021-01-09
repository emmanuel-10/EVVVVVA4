<?php
namespace modelo;

class Conexion{

    public static $user="uj88dolyb2vl1pua";
    public static $pass="BPi71n4vRdio5y6XUCMY";
    public static $URL="mysql:host=bsqzvvsytf4jhw3nvzn1-mysql.services.clever-cloud.com;dbname=bsqzvvsytf4jhw3nvzn1";

    //public static $user="root";
    //public static $pass="";
    //public static $URL="mysql:host=local;dbname=bpiebayo5nwaww024tgx";
    
    public static function conector(){
        try{  
            return new \PDO(Conexion::$URL,Conexion::$user,Conexion::$pass);
        }catch(\PDOException $e){  
            return null;
        }
    }

}