<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Introduce una nueva contraseña</p>
    <form action="<?php echo base_url();?>cambiar_password" method="post">
        <input type="password" name="password"><input type="text" value=" <?php echo $IdUsuario; ?>" name="IdUsuario" readonly>
        <br><br>
        <input type="submit" value="Cambiar">
    </form>
    <?php 
     if(isset($validar)){
        foreach($validar as $val){
            echo "<br>".$val;
        };
    }
    ?>
</body>
</html>