<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
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

        .form-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .form-box label {
            display: block;
            margin-bottom: 5px;
        }

        .form-box input[type="text"],
        .form-box input[type="password"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-box input[type="submit"] {
            width: 90%;
            padding: 8px;
            margin-top: 10px;
            margin-left: 14px;
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

        .form-box p {
            margin-top: 10px;
        }

        .form-box a {
            color: #3498db;
            text-decoration: none;
        }

        .form-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Registrar Usuario</h2>
            <form action="<?php echo base_url();?>ingresarDatos" method="post">
                <label for="mail">Ingrese mail:</label>
                <input type="text" id="mail" name="mail" required>
                <label for="password">Ingrese contraseña:</label>
                <input type="password" id="password" name="password" required>
                <label for="nombre">Ingrese Nombre de usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="mac">Ingrese la identificacion del dispositivo:</label>
                <input type="text" id="mac" name="mac" required>
                <label for="nombreDispositivo">Ingrese un nombre a su dispositivo:</label>
                <input type="text" id="nombreDispositivo" name="nombreDispositivo" required>
                <label for="codigoNodemcu">Ingrese el codigo obtenido del servidor web:</label>
                <input type="text" id="codigoNodemcu" name="codigoNodemcu" required>
                <input type="submit" value="Ingresar">
                <?php if(isset($validar)): ?>
                    <?php foreach($validar as $val): ?>
                        <p><?php echo $val; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if(isset($mensaje)): ?> 
                    <p><?php echo $mensaje; ?></p>
                <?php endif; ?>
                <?php if(isset($mensaje2)): ?> 
                    <p><?php echo $mensaje2; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
