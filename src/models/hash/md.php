<?php

namespace Equipo4\Practica\models\hash;

use Equipo4\Practica\models\DB;
use PDOException;

class MD extends DB
{
    public function __construct() {
        parent::__construct();
        

    }

    public static function EncriptarMD($clave)
    {
        $password = md5($clave);
        
        return $password;
        
    }

   
}



