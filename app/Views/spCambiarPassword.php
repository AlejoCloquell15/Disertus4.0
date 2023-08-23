<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
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
            text-align: center;
        }

        .form-box p {
            margin-bottom: 15px;
        }

        .form-box input[type="password"] {
            width: 90%;
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
            <h2>Cambiar Contraseña</h2>
            <p>Introduce una nueva contraseña.</p>
            <form action="<?php echo base_url();?>cambiarPassword" method="post">
                <input type="password" name="password" placeholder="Nueva Contraseña">
                <input type="hidden" value="<?php echo $IdUsuario; ?>" name="IdUsuario" readonly>
                <input type="submit" value="Cambiar">
            </form>
            <?php if(isset($validar)): ?>
                <?php foreach($validar as $val): ?>
                    <p><?php echo $val; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
