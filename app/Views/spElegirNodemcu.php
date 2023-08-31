<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0; /* Eliminar el margen predeterminado del cuerpo del documento */
        }

        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            grid-auto-rows: minmax(100px, auto);
            margin-left: 110px; /* Ajusta el margen izquierdo para separar los grids */
            margin-right: 180px; /* Ajusta el margen derecho para separar los grids */
            margin-top: 50px; /* Ajusta el margen superior para separar los grids */
            margin-bottom: 50px;
            align-items: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrar verticalmente */
            justify-content: center; /* Centrar horizontalmente */
            width: 268px;
            height: 223px;
        }

        h1 {
        margin-top: 40px; /* Eliminar el margen superior para acercar el título al contenido */
        margin-left: 110px;
        font-size: 25px; /* Aumentar el tamaño de fuente */
        color: #193b4a; /* Centrar el título horizontalmente */ 
    }

    .submit{
        min-width: 100%;
        min-height: 100%;
        border: 1px solid #ccc;
        border-radius: 17px;
        transition: transform 0.5s;
    }
    
    .submit:hover{
        transform: scale(1.1);
    }

    button{
        min-width: 100%;
        min-height: 100%;
        border: 1px solid #ccc;
        border-radius: 17px;
        background: rgb(0,85,103);
background: linear-gradient(90deg, rgba(0,85,103,1) 0%, rgba(0,159,181,1) 100%, rgba(0,212,255,1) 100%);
        transition: transform 0.5s;
    }
    </style>
</head>
<body>
    <?php echo $vista?>
    <h1>Selecciona Un Dispositivo para trabajar</h1>
    <div class="container">
    <?php 
    if(isset($resultado)){
       foreach($resultado as $res){
            echo "<form class='form' action='".base_url()."cargarSpConf' method='post'>
                <input type='hidden' value='".$res->IdNodemcu."' name='idUser'>
                <button class='submit'><i class='fas fa-paper-plane'></i>".$res->Nombre."'</button>
            </form>";
        }
    }
    ?>
    </div>
</body>
</html>