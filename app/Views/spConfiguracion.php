<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        font-size: 28px;
    }

    .div-principal {
        padding: 8px 16px 63px 16px;
    }

    @media (min-width: 768px) {
        .div-principal {
            padding: 16px 96px;
        }
    }

    .div-principal input {
        background: transparent;
        border: 1px solid lightgray;
        border-radius: 4px;
        padding: 8px;
    }

    .div-principal input:focus {
        outline: none;
        border-color: green;

    }

    .cont-tiempos {

        display: flex;
        gap: 50px;
    }

    .form-principal {
        margin-top: 20px;
        box-shadow: 0px 8px 16px 5px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 8px 16px 5px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 8px 16px 5px rgba(0, 0, 0, 0.25);
        padding: 10px;
        width: 300px;
        border-radius: 5px;
        margin-bottom: 40px;
    }

    .div-form {
        margin-left: 13px;

    }

    .p-leyenda {
        color: gray;
        font-size: 12px;
    }

    .b {
        margin-top: 20px;
        font-weight: bold;
        border-bottom: 1px solid green;
        display: inline-block;
    }
</style>

<body>
    <?php echo $vista ?>
    <div class="div-principal">
        <h1>Configuracion Del Dispositivo</h1>
        <div class='cont-tiempos'>
            <p>
                <?php echo "Tiempo De Ducha: " . $resultado['TiempoDucha']; ?>
            </p>
            <p>
                <?php echo "Tiempo De Espera: " . $resultado['TiempoEspera']; ?>
            </p>
            <p>
                <?php echo "Tiempo De Tolerancia: " . $resultado['TiempoTolerancia']; ?>
            </p>
        </div>
        <p class="b">Edita Aquí Las Configuarciones</p>
        <form action="<?php echo base_url(); ?>datosDispositivo" method="post" class="form-principal">
            <div class="div-form">
                <p>Duracion de ducha</p>
                <p class="p-leyenda">*Determina la duración total de la ducha.</p>
                <input type="number" name="tiempoDucha">
                <br>
                <p>Tiempo de espera</p>
                <p class="p-leyenda">*Una vez el tiempo de ducha se termina, habrá un tiempo de espera en el que el
                    usuario no se podra bañar.</p>
                <input type="number" name="tiempoEspera">
                <br>
                <p>Tiempo de tolerancia</p>
                <p class="p-leyenda">*Si el usuario sale de la ducha durante el baño, tendra el tiempo que usted
                    determine para volver.
                </p>
                <input type="number" name="tiempoTolerancia">
                <br><br>
                <input type="submit"><input type="hidden" name="idNodemcu" value="<?php echo $idNodemcu ?>">
                <br><br>
            </div>
        </form>
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
        }, 18);
    </script>
    <?php

    ?>
    <?php //echo base_url('/cargarPp'); ?>
</body>

</html>