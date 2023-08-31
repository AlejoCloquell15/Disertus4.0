<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,300;1,400&display=swap" rel="stylesheet">
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #EBEBEB; /* Cambiar el color de fondo a blanco */
    }

    header {
        background: rgb(0,75,73);
        background: linear-gradient(86deg, rgba(0,75,73,1) 11%, rgba(9,118,121,1) 58%, rgba(0,177,149,1) 100%);
        color: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 20px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Hacer la sombra un poco más suave */
    }

    header a {
        color: #ffffff;
        text-decoration: none;
        margin-right: 20px; /* Mayor espacio entre los íconos y el texto */
        font-size: 18px; /* Reducir el tamaño de fuente */
        transition: color 0.3s ease-in-out;
    }


    nav {
        background: rgb(0,75,73);
        background: linear-gradient(180deg, rgba(0,75,73,1) 11%, rgba(9,118,121,1) 58%, rgba(0,136,115,1) 100%);
        color: #ffffff;
        position: fixed;
        top: 52,5px;
        left: 0;
        width: 35px;
        height: calc(100vh - 70px); /* Ocupar todo el espacio vertical disponible */
        display: flex;
        flex-direction: column;
        align-items: center; /* Centrar los elementos verticalmente */
        justify-content: center; /* Centrar los elementos horizontalmente */
        padding: 10px;
        shadow: none;
    }

    nav a {
        color: #ffffff;
        text-decoration: none;
        margin: 20px 0 ;
        padding: 10px ;
        width: 100%; /* Los enlaces ocupan todo el ancho del nav */
        text-align: center; /* Centrar el texto horizontalmente */
        transition: background-color 0.3s ease-in-out;
    }

    .i-1{
        margin-top: -40px;
    }

    nav a:hover {
        background-color: #134e4e;
        color: #ff9900;
        font-size: 18px;
        transition: background-color 0.5s ease-in-out; /* Aumentar la duración de la transición en el hover */
        transition: 0.5s ease-in-out; /* Aumentar la duración de la transición en el hover */
    }

    nav i{
        font-size: 20px;
    }

    nav i:hover{
        color: #ff9900;
    }

    .nav-class{
        margin-left: 0px !important;
    }

    .content {
        margin: 0 220px;
        padding: 40px;
        background-color: #EBEBEB;
        
    }

    h1 {
        margin-top: 0; /* Eliminar el margen superior para acercar el título al contenido */
        font-size: 28px; /* Aumentar el tamaño de fuente */
        color: #193b4a;
        text-align: center; /* Centrar el título horizontalmente */
        margin-bottom: 20px; /* Agregar un margen inferior para separar del contenido siguiente */
    }

    /* Cambios en el tamaño de los íconos del header */
    .header-icons i {
        font-size: 27px;
        margin-left: -8px;
        margin-right: 5px;
    }

    /* Cambios en el tamaño de los íconos del nav */
    .nav-icons i {
        font-size: 20px;
    }

    .disertus {
        font-size: 20px;
        color: #ffffff;
        margin: 0;
        margin-left: -5px;
        margin-top: 2px;
        font-family: 'Poppins';
    }

    .header-icons {
        display: flex;
        align-items: center;
    }

    .i-cerrar-session:hover{
        color: #ff9900;
        transform: scale(1.4);
    }

    .i-cerrar-session{
        transition: 0.4s ease-in-out;
    }

    </style>
    <title>Bienvenido </title>
</head>
<body>
    <header style='position:sticky;top:0;'>
        <div class="header-icons" > 
            <a class="disertus">DISERTUS</a>
        </div>
        <a class="i-cerrar-session" href="<?php echo base_url();?>cerrarSession"><i class="bi bi-box-arrow-right"></i></a>
    </header>
    <div class="nav-class">
    <nav>
        <a href="<?php echo base_url();?>cargarNodemcu" class="i-1" title="Configuracion"><i class="bi bi-gear"></i></a>
        <a href="#" title="Datos De Uso"><i class="bi bi-bar-chart"></i></a>
        <a href="#" title="Sobre Nostros"><i class="bi bi-people-fill"></i></a>
        <a href="#" title="Manual Del Dispositivo"><i class="bi bi-wrench"></i></a>
        <a href="#" title="Informacion Del Usuario"><i class="bi bi-person-circle"></i></a>
        <a href="#" title="Cerrar Sesion"><i class="bi bi-box-arrow-right"></i></a>
    </nav>
    </div>
    <div class="content">
        <h1>¡Bienvenido <?php echo $Nombre ?>!</h1>
        <script type="text/javascript">
            setTimeout(function() {
                $.ajax({
                    url:  '<?php echo base_url('/cargarPp'); ?>',
                    success: function() {
                        window.location.href = '<?php echo base_url('/cargarPp'); ?>';
                    },
                    error: function(xhr, status, error) {
                        console.log('Error al cargar la página: ' + error);
                    }
                });
            }, 1800000);
        </script>
    </div>
</body>
</html>
