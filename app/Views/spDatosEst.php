<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .gran-contenedor {
        margin-left: 100px;
    }

    .cont-prin {
        margin-top: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<?php echo $vista ?>
<div class="gran-contenedor">

    <body>
        <h1>Datos por dispositivo</h1>
        <form action="<?php echo base_url('/filtro/' . $idNodemcu); ?>" method="post">
            <select name="opcion">
                <option value="Total">Total</option>
                <option value="Dia">Dia</option>
                <option value="Mes">Mes</option>
                <option value="Año">Año</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <div class="cont-prin">
            <?php if (isset($consulta)) {
                if ($consulta == null) {
                    echo "Este dispositivo aun no tiene datos.";
                } else {
                    // Variable para rastrear el IdNodemcu actual
                    foreach ($consulta as $con) {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>IdNodemcu</th>";
                        echo "<th>Caudal</th>";
                        echo "<th>Fecha</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $con->IdNodemcu . "</td>";
                        echo "<td>" . $con->caudal . "</td>";
                        if (isset($con->Fecha)) {
                            echo "<td>" . $con->Fecha . "</td>";
                        } else {
                            echo "<td>-</td>";
                        }
                        echo "</tr>";
                        echo "</table>";
                    }
                }
            }
            ?>
        </div>
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
</body>

</html>