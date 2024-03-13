<?php

// use Equipo4\Practica\models\hash\SHA;
    // $SHA = SHA::EncriptarSHA($palabra);
// error_reporting(0);

if (isset($_POST['palabra'])) {
    $palabra = $_POST['palabra'];
    $SHA=sha1($palabra);



} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptado SHA1</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Algoritmo SHA1</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra a Cifrar</label>
                <input type="text" name="palabra" class="form-control" aria-describedby="emailHelp">
            </div>

            <button type="submit" name="sha" class="btn btn-primary">Encriptar</button>
        </form>

        <?php if (isset($_POST['sha']) && strlen($_POST['palabra'] >= 0)) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Palabra Cifrada</label>
                <input type="text" value="<?php echo $palabra ?>" class="form-control" aria-describedby="emailHelp" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cifrado</label>
                <input type="text" value="<?php echo $SHA ?>" class="form-control" aria-describedby="emailHelp" disabled>
            </div>
        <?php } else if (isset($_POST['sha']) && strlen($_POST['palabra'] <= 0)) {
        } ?>
    </div>
</body>

</html>