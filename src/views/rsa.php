<?php

use Equipo4\Practica\models\asimetrico\Keys;
use Equipo4\Practica\models\asimetrico\RSA;




if(isset($_POST['rsa'])){
    $string=$_POST['palabra'];
    $Getpubkey=RSA::GetPubKey();
    $ins=new RSA ($string);
    error_reporting(0);
    echo ''.$ins->Encrypt().'';

}
$dato=RSA::GetAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    
  
    
</head>
<body>
<div class="container">
        <h1 class="text-center">Algoritmo RSA</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra a Cifrar</label>
                <input type="text" name="palabra" class="form-control" maxlength="25" aria-describedby="emailHelp" required>
            </div>

            <button type="submit" name="rsa" class="btn btn-primary">Cifrar</button>
            <!-- <button type="submit" name="clave"  class="btn btn-warning">Generar Claves</button> -->
        </form>
      
    </div>

    <div class="container">
        <h5 class="text-center">Encriptados</h5>

        <div class="table-responsive">
        <table class="table  table-bordered border-dark">
            <thead>
                <th>Palabra Encriptada</th>
                <th>Llave Privada</th>
                <th>Encriptación</th>
                <th>Desencriptar</th>
            </thead>

            <?php foreach ($dato as $value) {

            ?>
                <tbody>
                    <td><?php echo $value['string'] ?></td>
                    <td><?php echo $value['privkey'] ?></td>
                  
                    <td><?php echo $value['encriptado'] ?></td>
                    <td>
                        <?php if(strlen($value['string'] )>=1 ){ ?>
                        
                        <?php }elseif($value['encriptado']==0){ ?>
                            
                        <?php }else{ ?>
                        <a href="?view=rsad.php&id=<?php echo $value['id'] ?>" class="btn btn-warning">Desencriptar</a>
                        <?php }?>
                    </td>
                </tbody>
            <?php  } ?>
        </table>
        </div>
    </div>

</body>
</html>