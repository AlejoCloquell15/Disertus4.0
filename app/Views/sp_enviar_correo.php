<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Introduce el mail con el que te has registrado en Disertus, te enviaremos un codigo a tu correo
        con el cual podras cambiar tu contraseña
    </p>
    <form action="<?php echo base_url();?>enviar_correo" method="post">
        <input type="text" name="correo">
        <input type="submit" value="enviar_correo">
    </form>
    <?php 
    if(isset($mensaje)){
        echo $mensaje;
    }
    ?>
</body>
</html>