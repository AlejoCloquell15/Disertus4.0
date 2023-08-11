<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php ?>
    <p>Pulsa en "Enviar Codigo" y enviaremos uno a tu correo, introducelo aqui. Tienes 1 minuto hasta que expire.</p>
    <p>Si es necesario pulsa nuevemente el boton y reenviaremos el codigo</p>
    <br>
    <form action="<?php echo base_url();?>enviar_codigo" method="post">
    <input type="number" name="codigo_usuario">
    <input type="text" value="<?php if(isset($IdUsuario)){echo $IdUsuario;}?>" name="id_usuario" readonly>
    <br><br>
    <input type="submit" value="Enviar nuevo codigo" name="boton_codigo">
    <input type="submit" value="Verificar" name="boton_verificar">
    </form>
    <?php if(isset($Mensaje)){
        echo "<br>".$Mensaje;
    }?>
    <p></p>
</body>
</html>