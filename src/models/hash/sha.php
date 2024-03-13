<?php

namespace Equipo4\Practica\models\hash;

class SHA
{


    public static function EncriptarSHA($clave)
    {
        $password = sha1($clave);

        return $password;
    }
}
