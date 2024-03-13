<?php

namespace Equipo4\Practica\models\asimetrico;
use Equipo4\Practica\models\DB;
use PDOException;

require '../DB.php';

class Keys extends DB{

     public function __construct() {
        parent::__construct();
    }

    public static function GenerateKeys()
    {
        // Generar un par de claves (clave pública y clave privada)
        $config = array(
            "private_key_bits" => 512, /* 2048 */
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        $privkey = openssl_pkey_new($config);

        // Extraer la clave pública del par de claves
        $data = openssl_pkey_get_details($privkey);
        $pubkey = $data["key"];

        // Obtener la clave privada en formato PEM
        openssl_pkey_export($privkey, $privateKeyPEM);
        $db=new DB();
        $encriptado=0;
        $id=uniqid();
       
        try {
            $sql =$db->Connect()->prepare("INSERT INTO clave (id,pubkey,privkey,encriptado) VALUES (:id,:pubkey,:privkey,:encriptado)");
            $sql->bindParam(':id',$id);
            $sql->bindParam(':pubkey',$pubkey);
            $sql->bindParam(':privkey', $privateKeyPEM);
            $sql->bindParam(':encriptado',$encriptado);
            $sql->execute();
            $m= "Generó Keys Nuevas";
        }catch (PDOException $e){
            $m= "Error: " .$e->getMessage();
        }

        return $m;
    }
}
$key=new Keys();
for ($i=0; $i <=1; $i++) { 
    $m=$key->GenerateKeys();
}
var_dump($m);