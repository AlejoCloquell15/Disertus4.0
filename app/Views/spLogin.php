<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #193b4a, #30675e);
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .login-box label {
            display: block;
            margin-bottom: 5px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #156b6b;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .login-box input[type="submit"]:hover {
            background-color: #134e4e;
        }

        .login-box a {
            color: #3498db;
            text-decoration: none;
        }

        .login-box a:hover {
            text-decoration: underline;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <?php if(isset($mail_incorrecto)): ?>
                <p style="color: red;"><?php echo $mail_incorrecto; ?></p>
            <?php endif; ?>
            <form action="<?php echo base_url();?>login" method="post">
                <label for="email">Correo:</label>
                <input type="text" id="email" name="email">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
                <input type="submit" value="Iniciar sesión">
            </form>
            <?php
            if(isset($validar)){
                foreach($validar as $val){
                    echo "<br>".$val;
                };
            }
            ?>
            <form action="<?php echo base_url();?>registrar">
                <input type="submit" value="Registrarse">
                <br>
                <p>¿Olvidaste tu contraseña? <a href="<?php echo base_url();?>cargarRecuperacion">Recupérala aquí</a></p>
            </form>
        </div>
    </div>
</body>
</html>