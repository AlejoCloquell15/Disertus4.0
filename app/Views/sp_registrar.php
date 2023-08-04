<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $validation = \Config\Services::validation(); ?>
    <h2>Registrar Usuario</h2>
    <br>
    <form action="<?php echo base_url();?>ingresar_datos" method="post">
        Ingrese mail
        <br>
        <input type="text" name="mail"><br>
        <br>
        Ingrese contraseña
        <br>
        <input type="text" name="password">
        <br><br>
        Ingrese Nombre de usuario
        <br>
        <input type="text" name="nombre">
        <br><br>
        Ingrese la identificacion del dispositivo obtenida del servidor web (respetar numeros y mayusculas)
        <br>
        <input type="text" name="mac">
        <br><br>
        Ingrese un nombre a su dispositivo
        <br>
        <input type="text" name="nombre" required>
        <br><br>
        Ingrese el codigo obtenido del servidor web
        <br>
        <input type="text" name="codigo_nodemcu">
        <br><br>
        <input type="submit" value="ingresar">
        <?php
        if(isset($validar)){
            foreach($validar as $val){
                echo "<br>".$val;
            };
        }
        if(isset($mensaje)){ 
             echo "<br>".$mensaje;
        }
        if(isset($mensaje2)){ 
            echo "<br>".$mensaje2;
       }
        ?>
    </form>
</body>
</html>