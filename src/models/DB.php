<?php

namespace Equipo4\Practica\models;

use PDO;
use PDOException;

class DB {
    private string $host;
    private string $db;
    private string $usuario;
    private string $clave;
    public function __construct() {
        $this->host= 'localhost';
        $this->db='peliculas';
        $this->usuario='root';
        $this->clave='';

    }

    public function Connect(){
       
        try{
            $connection='mysql:host=' . $this->host . ';dbname=' . $this->db;
            $options=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               
            ];
            
            $conexion=new PDO($connection,$this->usuario,$this->clave,$options);
    
            return $conexion;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }

}
$db=new DB();
$db->Connect();