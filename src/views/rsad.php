<?php

use Equipo4\Practica\models\asimetrico\RSA;
//$priv=$_POST['priv'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $dato = RSA::GetDataEncrypt($id);
}
if (isset($_POST['des'])) {
    $id = $_POST['id'];
    
     $f = RSA::Descrypt($dato[0]['encriptado'], $dato[0]['privkey'], $id);
    echo $f;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar AES</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Desencriptar AES</h1>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="id" value="<?php echo $dato[0]['id']; ?>" class="form-control" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Cifrado</label>
                <input type="text" value="<?php echo $dato[0]['encriptado']; ?>" class="form-control" aria-describedby="emailHelp" disabled>
                <input type="hidden" name="cifrado" value="<?php echo $dato[0]['encriptado']; ?>" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Clave Privada para Descifrar</label>
                <input type="text" name="priv" value="<?php echo $dato[0]['privkey']; ?>" class="form-control" aria-describedby="emailHelp">
            </div>

            <button type="submit" name="des" class="btn btn-primary">Descifrar</button>

        </form>
    </div>
</body>

</html>