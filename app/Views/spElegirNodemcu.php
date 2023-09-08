<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            /* Eliminar el margen predeterminado del cuerpo del documento */
        }

        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            grid-auto-rows: minmax(100px, auto);
            margin-left: 110px;
            /* Ajusta el margen izquierdo para separar los grids */
            margin-right: 180px;
            /* Ajusta el margen derecho para separar los grids */
            margin-top: 50px;
            /* Ajusta el margen superior para separar los grids */
            margin-bottom: 50px;
            align-items: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centrar verticalmente */
            justify-content: center;
            /* Centrar horizontalmente */
            width: 268px;
            height: 223px;
        }

        h1 {
            margin-top: 40px;
            /* Eliminar el margen superior para acercar el título al contenido */
            margin-left: 110px;
            font-size: 25px;
            /* Aumentar el tamaño de fuente */
            color: #193b4a;
            /* Centrar el título horizontalmente */
        }

        .submit {
            min-width: 100%;
            min-height: 100%;
            border: 1px solid #ccc;
            border-radius: 17px;
            transition: all 0.5s;
        }

        .submit:hover {
            transform: scale(1.05);
            border: 1px solid #00000050;
            box-shadow: 0px 0px 15px -5px rgb(0, 75, 73);
            -webkit-box-shadow: 0px 0px 15px -5px rgb(0, 75, 73);
            -moz-box-shadow: 0px 0px 15px -5px rgb(0, 75, 73);
            cursor: pointer;
        }



        .form-nodemcu {
            height: 10px;
            width: 30px;
            margin-left: 580px;
            margin-top: 40px;
            border-radius: none;
        }

        .form-titulo {
            display: flex;
        }

        .boton-agregar {
            background-color: #1b6b6b;
            border: none;
            border-radius: 4px;
            width: 100px;
            font-weight: 600;
            height: 45px;
            margin-left: -40px;
            color: #fff;
            transition: background-color 250ms ease-in-out;
        }

        .boton-agregar:hover {
            cursor: pointer;
            background-color: rgb(0, 75, 73);
        }
    </style>
</head>

<body>
    <?php echo $vista ?>
    <div class="form-titulo">
        <h1>Selecciona Un Dispositivo para trabajar</h1>
        <form action="<?php echo base_url(); ?>/agregarNodemcu" method="post" class="form-nodemcu">
            <input type="hidden" value="<?php echo $idUser ?>">
            <button class="boton-agregar">Agregar</button>
        </form>
    </div>
    <div class="container">
        <?php
        if (isset($resultado)) {
            foreach ($resultado as $res) {
                echo "<form class='form' action='" . base_url() . "cargarSpConf' method='post'>
                <input type='hidden' value='" . $res->IdNodemcu . "' name='idUser'>
                <button class='submit'><i class='fas fa-paper-plane'></i>" . $res->Nombre . "</button>
            </form>";
            }
        }
        ?>
    </div>
    <script type="text/javascript">
        setTimeout(function () {
            $.ajax({
                url: '<?php echo base_url('/cargarPp'); ?>',
                success: function () {
                    window.location.href = '<?php echo base_url('/cargarPp'); ?>';
                },
                error: function (xhr, status, error) {
                    console.log('Error al cargar la página: ' + error);
                }
            });
        }, 1800000);
    </script>
</body>

</html>