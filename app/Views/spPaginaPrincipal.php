<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url();?>cargarNodemcu" method="post">
    <p>Toca aqui para comezar</p>
    <br><br>
    <input type="submit">
    </form>
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
<?php 
    
    ?>
    <?php //echo base_url('/cargarPp'); ?>
</body>
</html>