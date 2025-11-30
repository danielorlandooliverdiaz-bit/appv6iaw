<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/app/controllers/indexController.php');

//Recupero de la BD todas las criaturas a través del controlador
$creatures = indexAction();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>RolePlayingGame</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

       

   </head>

    <body>

        <!-- Navigation -->
          <nav class="navbar navbar-light navbar-fixed-top navbar-expand-md bg-faded" role="navigation" style="background-color: #e3f2fd;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php"> <img src="assets/img/small-logo.png" alt="" ></a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto ">
                    <li class="nav-item active">
                      <a type="button" class="btn btn-info " href="app/views/insert.php">Crear una criatura</a>
                    </li>
                  </ul>
                    
                </div>
              </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Heading Row -->
            <div class="row">
                <div class="col-md-8">
                    <img class="img-responsive img-rounded" src="assets/img/main-logo.jpg" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h1>Comunidad de usuarios de películas</h1>
                    <p>La maratón comienza aquí, en tu navegador</p>
                    <a class="btn btn-primary btn-lg" href="http://cla.heroes-online.com/es-ES">Juega ahora!</a> 
                </div>
                </div>
            </div>
            <!-- /.row -->

            <hr>

                    
            
            <!-- Content Row -->
            <?php for ($i = 0; $i < sizeof($creatures); $i+=3) { ?>
              <!--   <div class="card-group">   -->
              <div class="row"> 
                <?php
                for ($j = $i; $j < ($i + 3); $j++) {
                   if (isset($creatures[$j])) {
                       
                        echo $creatures[$j]->creature2HTML();
                    }
                }
                ?>
                   </div> 
                    <!-- /.row -->
             <?php } ?>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; A. F. 2017</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

    </body>

</html>
