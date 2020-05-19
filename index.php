<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>User Access</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/big-wallpaper.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="transparent" class="container">
    <div class="row">
        <div class="mx-auto">
        <form  class="myform form" class="p-3 mb-2 bg-light text-dark" action="" method="post" name="formulario_acceso">
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <h1>Biblioteca</h1>
                </div>
            </div>
            <div class="form-group">
                <label for="username"></label><input placeholder='user' class='form-control' name="username" type="text" id="username" size="30" />
            </div>
            <div class="form-group">
                <label for="password"></label><input placeholder='password' class='form-control' name="password" type="password" id="password" size="30" />
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center mb-3">
                <input class="button1" type="submit" name="acceso" value="Ingresar"/>
                </div>
            </div>
        </form></div>
    </div>

</div>
</body>
  <?php
  //si esta presionando el input con el nombre submit
      if(isset($_POST['acceso']))
      {
        //llama al archivo php
        require("codigoAcceso.php");
      }
  ?>
</html>