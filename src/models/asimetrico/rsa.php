<?php

namespace Equipo4\Practica\models\asimetrico;

use Equipo4\Practica\models\DB;



class RSA extends DB
{

    public function __construct(private $string)
    {

        parent::__construct();
    }
    public static function GetPubKey()
    {
        $db = new DB();
        $valor = 0;
        $sql = $db->Connect()->prepare("SELECT * FROM clave WHERE encriptado = :valor ");
        $sql->bindParam(':valor', $valor);
        $sql->execute();
        $dato = $sql->fetch();
        //$dato['pubkey']
        return $dato;
    }

    public function Encrypt()
    {
        $pubkey = $this->GetPubKey();
        $clavep = $pubkey['pubkey'];
        $id = $pubkey['id'];

        if ($id === NULL) {
            
            $m = "<script>alert('Genere Nuevas Keys, Para Realizar el Cifrado');window.history.go(-1)</script>";
            return $m;
        } else {

            if (!openssl_public_encrypt($this->string, $dato_encriptado, $clavep)) {
                $m = "Error de Encriptación " . openssl_error_string();
            } else {
                $d = base64_encode($dato_encriptado);
                $sql = $this->Connect()->prepare("UPDATE clave SET encriptado= :encriptado WHERE id= :id");
                $sql->bindParam(':id', $id);
                $sql->bindParam(':encriptado', $d);
                $sql->execute();
                $m = "<script>alert('Realizó el cifrado correctamente');</script>";
                
            }
            return $m;
        }
        
    }

    public static function GetDataEncrypt($id)
    {
        $db = new DB();
        $sql = $db->Connect()->prepare("SELECT * FROM clave WHERE id = :id ");
        $sql->bindParam(':id', $id);
        $sql->execute();
        $dato = $sql->fetchAll();

        return $dato;
    }

    public static function Descrypt($string, $privkey, $id)
    {
        $datosCifrados = base64_decode($string);

        if (!openssl_private_decrypt( $datosCifrados, $descifrado, $privkey)) {
            $a = "Error al descifrar: " . openssl_error_string();
        } else {
             $a="<script>alert('Descrifado Correctamente');window.location='?view=rsa.php'</script>";
             
            $db=new DB();
            $sql = $db->Connect()->prepare("UPDATE clave SET string= :desencriptado WHERE id= :id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':desencriptado', $descifrado);
            $sql->execute();
        }

    
       

        return $a;
    }



    public static function GetAll()
    {
        $db = new DB();
        $sql = $db->Connect()->query("SELECT * FROM clave");
        $datos = $sql->fetchAll();

        return $datos;
    }
}
