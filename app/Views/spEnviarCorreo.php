<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #193b4a, #30675e);
            font-family: Arial, sans-serif;
            color: #3A3A3A;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .h2 {
            padding: 20px;
            width: 400px;
            align: center !important;
        }

        .form-box p {
            margin-bottom: 15px;
        }

        .form-box input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-box input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: #156b6b;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-box input[type="submit"]:hover {
            background-color: #134e4e;
        }

        .form-box .message {
            margin-top: 15px;
            color: #f39c12;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
        <h2 class="h2">Recuperación de Contraseña</h2>
            <p>Introduce el correo con el que te has registrado en Disertus.<br>Te enviaremos un código a tu correo con el cual podrás cambiar tu contraseña.</p>
            <form action="<?php echo base_url();?>enviarCorreo" method="post">
                <input type="text" name="correo" placeholder="Correo registrado">
                <input type="submit" value="Enviar Código">
            </form>
            <?php if(isset($mensaje)): ?>
                <p class="message"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
