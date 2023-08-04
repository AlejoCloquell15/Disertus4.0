<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($resultado)){
       foreach($resultado as $res){
            echo "<br><form action='".base_url()."cargarSpConf' method='post'>
                <input type='hidden' value='".$res->IdNodemcu."' name='idUser'>
                <input type='submit' value='".$res->Nombre."'>
            </form>";
        }
    }
    ?>
</body>
</html>