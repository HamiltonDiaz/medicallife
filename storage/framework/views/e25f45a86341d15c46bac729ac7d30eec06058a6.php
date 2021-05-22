<!doctype html5>
<html lang="es">
  <head>
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <title><?php echo e(__('Medical Life')); ?></title>        

    
    <!-- Fonts -->
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="<?php echo e(asset('css/styles.css')); ?> " rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <title>Contactenos</title>
  </head>
  <body>
    
        <p>
            Hola soy  <strong> <?php echo e($nombre); ?> </strong>y me estoy contactando con ustedes desde <a href="www.medicallife.com.co">www.medicallife.com.co</a> y estoy interesado en
            <strong class="text-success"><?php echo e($asunto); ?></strong>.
        </p>
        <ul>
          <li class="btn btn-success">Descripción: <?php echo e($descripcion); ?> </li>
          <li>Teléfono: <?php echo e($telefono); ?> </li>
          <li>Email: <?php echo e($email); ?> </li>
        </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
  </body>
</html><?php /**PATH D:\GoogleDrive\Repositorios\medicallife\resources\views/emails/contactenos.blade.php ENDPATH**/ ?>