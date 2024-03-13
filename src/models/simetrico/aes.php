<?php

namespace Equipo4\Practica\models\simetrico;

use Equipo4\Practica\models\DB;

class AES extends DB
{




    public function __construct(private  $string, private  $key, private $id = null)
    {
        parent::__construct();

        if ($id === null) {
            $this->id = uniqid();
        } else {
            $this->id = $id;
        }
    }

    public function Encrypt()
    {

        // $metodo_encrip = "AES-128-ECB";

        $encriptado = openssl_encrypt($this->string, 'AES-128-ECB', $this->key);

        return $encriptado;
    }

    public function Decrypt()
    {
        // $metodo_encrip = "AES-128-ECB";
        $desencriptado = openssl_decrypt($this->string, 'AES-128-ECB', $this->key);

        return $desencriptado;
    }

    public function Save($encriptado)
    {
        $sql = $this->Connect()->prepare("INSERT INTO aes (id,clave,encriptado) VALUES (:id,:clave,:encriptado)");
        $sql->bindParam(':id', $this->id);

        $sql->bindParam(':clave', $this->key);
        $sql->bindParam(':encriptado', $encriptado);
        $sql->execute();

        return $sql;
    }

    public static function Update($string,$id){
        $db=new DB();
        $sql=$db->Connect()->prepare("UPDATE aes SET string=:string WHERE id=:id");
        $sql->bindParam(':id',$id);
        $sql->bindParam(':string',$string);
        $sql->execute();

        return $sql;
    }

    public static function Get($id){
        $db=new DB();
        $sql=$db->Connect()->prepare("SELECT * FROM aes WHERE id=:id");
        $sql->bindParam(':id',$id);
        $sql->execute();
        $dato=$sql->fetchAll();

        return $dato;

    }

    public static function GetAll()
    {
        $db = new DB();
        $sql = $db->Connect()->query("SELECT * FROM aes");
        $datos = $sql->fetchAll();

        return $datos;
    }


}
