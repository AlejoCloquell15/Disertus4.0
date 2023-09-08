<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Disertus!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    

    <style {csp-style-nonce}>
 /* Estilo para el cuerpo de la página */
body {
  background-color: #0D9484; /* Color de fondo verde turquesa */
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

/* Estilo para el encabezado */
header {
  background-color: #fff; /* Color de fondo blanco */
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Sombreado suave */
}

/* Estilo para el texto "Disertus" en el encabezado */
#logo {
  font-family: 'Times New Roman', serif; /* Fuente de letra formal */
  font-size: 24px;
  font-weight: bold;
  margin: 0;
  padding-top: 10px; /* Mover hacia arriba */
}

/* Estilo para el menú desplegable a la izquierda */
#menu {
  width: 200px; /* Ancho del menú */
  background-color: #fff; /* Color de fondo blanco */
  position: fixed;
  left: 0;
  top: 80px; /* Ajusta la distancia desde la parte superior */
  padding: 20px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Sombreado en el lado derecho */
}

/* Estilo para el rectángulo del menú */
#menu-rectangle {
  border: 2px solid #0D9484; /* Borde con color verde turquesa */
  padding: 10px; /* Espaciado dentro del rectángulo */
}

/* Estilo para los elementos del menú */
#menu ul {
  list-style: none;
  padding: 0;
}

#menu ul li {
  padding: 10px 0; /* Separación vertical en elementos de menú */
  color: #333; /* Color de texto oscuro */
  font-family: Arial, sans-serif; /* Fuente de letra estándar */
  font-size: 16px;
}

/* Estilo para el contenido principal */
#main-content {
  margin-left: 200px; /* Dejar espacio para el menú desplegable */
  padding: 20px;
}

/* Estilo para enlaces dentro del menú */
#menu a {
  text-decoration: none;
  color: #333; /* Color de enlace oscuro */
}

/* Estilo para enlaces al pasar el mouse */
#menu a:hover {
  color: #0D9484; /* Color verde turquesa al pasar el mouse */
}
: #fff; /* Color de fondo blanco */
 


    </style>
</head>
<body>


<header>

    <div class="menu">
        <ul>
            <li class="logo">
                
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="<?php echo base_url (); ?>cargarLogin">Login</a></li>
            <li class="menu-item hidden"><a href="<?php echo base_url (); ?>menu">Menu</a></li>
            <li class="menu-item hidden"><a href="<?php echo base_url (); ?>nosotros">Nosortos</a></li>
            <li class="menu-item hidden"><a href="<?php echo base_url (); ?>ComoFunciona">Dispositivos</a>
                   
            </li>
        </ul>
    </div>

    <div class="heroe">

        <center><h1>Bienvenido a Disertus</h1><center>

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css"
</head>
</html>

    </div>

</header>



<section>

    

</section>

<div class="further">

    <section>

    

    </section>

</div>


<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>


</footer>


<script>
function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

</body>
</html>
