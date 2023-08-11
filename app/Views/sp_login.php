<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="<?php echo base_url();?>login" method="post">
        Ingrese su correo
        <input type="text" name='email'>
        <br>
        Ingrese su contraseña
        <input type="text" name='password'>
        <br>
        <input type="submit" value='Login'>
    </form>
    <?php if(isset($validar)){
            foreach($validar as $val){
                echo "<br>".$val;
            };
        }
        if(isset($mail_incorrecto)){
            echo $mail_incorrecto;
        }
        ?>
       <form action="<?php echo base_url();?>registrar">
       <input type="submit" value="Registrate Aqui">
       <br>
       <p>Si haz olvidado tu contraseña haz click</p><a href="<?php echo base_url();?>cargarRecuperacion">aqui para recuperarla</a></p>
    </form>
</body>
</html>