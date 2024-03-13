<?php

use Equipo4\Practica\models\simetrico\AES;

if (isset( $_POST['palabra'])) {

    $cadena = $_POST['palabra'];
    $clave = $_POST['clave'];

    $AES = new AES($cadena, $clave);
    
    $valor = $AES->Encrypt();
    
    $AES->Save($valor);

     header('Location:?view=aes.php');
    
}
$dato = AES::GetAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptado AES</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Algoritmo AES</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra a Cifrar</label>
                <input type="text" name="palabra" maxlength="50" class="form-control" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra Clave</label>
                <input type="text" name="clave" maxlength="50" class="form-control"  aria-describedby="emailHelp" required>
            </div>

            <button type="submit" name="aes" class="btn btn-primary">Encriptar</button>

        </form>
    </div>
   
    <div class="container"> 
       
        <h5 class="text-center">Encriptados</h5>

        <table class="table">
            <thead>
                <!-- <th>Id</th> -->
                <th>Palabra Encriptada</th>
                <!-- <th>Clave</th> -->
                <th>Encriptación</th>
                <th>Desencriptar</th>
            </thead>

            <?php foreach ($dato as $value) {

            ?>
                <tbody>
                    <!-- <td><?php echo $value['id'] ?></td> -->
                    <td><?php echo $value['string'] ?></td>
                    <!-- <td><?php echo $value['clave'] ?></td> -->
                    <td><?php echo $value['encriptado'] ?></td>
                    <td>
                        <?php if(strlen($value['string'] )>1){ ?>
                        
                        <?php }else{ ?>
                            <a href="?view=aesd.php&id=<?php echo $value['id'] ?>" class="btn btn-warning">Desencriptar</a>
                        <?php } ?>
                    </td>
                </tbody>
            <?php  } ?>
        </table>
    </div>
    
</body>

</html>