<?php

use Equipo4\Practica\models\simetrico\AES;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $dato = AES::Get($id);
}

if (isset($_POST['des'])) {
    $cifrado = $_POST['cifrado'];
    $key = $_POST['clave'];
    
    $AES=new AES($cifrado,$key);
    
    $valor =$AES->Decrypt();
    
    if ($valor === False) {
        echo "<script>alert('Palabra Clave Incorrecta');window.history.go(-1)</script>";
    } else {
        $update = AES::Update($valor, $id);
        echo "<script>alert('Decifrado Correctamente');window.location='?view=aes.php'</script>";
    }
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
                <label for="exampleInputEmail1" class="form-label">Cifrado</label>
                <input type="text" value="<?php echo $dato[0]['encriptado']; ?>" class="form-control" aria-describedby="emailHelp" disabled>
                <input type="hidden" name="cifrado" value="<?php echo $dato[0]['encriptado']; ?>" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra Clave para Descifrar</label>
                <input type="text" name="clave" class="form-control" aria-describedby="emailHelp" required>
            </div>

            <button type="submit" name="des" class="btn btn-primary">Encriptar</button>

        </form>
    </div>
</body>

</html>