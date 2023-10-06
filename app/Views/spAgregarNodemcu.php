<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 200px;
    }
</style>

<body>
    <form action="<?php echo base_url(); ?>agregarNodemcu" method="post">
        <p>Aqui va la identificación de la nodemcu</p>
        <input type="text" name="idNodemcu">
        <p>Añade el tiempo de ducha</p>
        <input type="number" name="tiempoDucha">
        <p>Añade el tiempo de espera</p>
        <input type="number" name="tiempoEspera">
        <p>Añade el tiempo de espera</p>
        <input type="number" name="tiempoTolerancia">
        <p>Agregale un nombre a tu dispositivo</p>
        <input type="text" name="nombre">
        <button>Agregar</button>
    </form>
</body>

</html>