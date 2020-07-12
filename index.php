<?php 
  session_start();
  unset( $_SESSION['page']);
  require_once "./src/partials/_utiles.php";
  $_SESSION['url']= getUrl();
  
  $chemin=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
  $_SESSION['chemin']=$chemin; 

  //affiche_tab($_SERVER);
 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>ODC - JQUERY/PHP/MYSQL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">

    <noscript>
        VEUILLEZ ACTIVER VOTRE JavaScripts
    </noscript>
  </head>
  <body>      
  <div class="container-fluid">
    <div  class="display-4 text-center mb-4">ODC - JQUERY/PHP/MYSQL</div>   
 
    <div class="row" >
      <div class="col-md-6" > 
        <div class="row" id="tableau" > 
          <table class="table  table-inverse table-responsive" id="users">
            <thead >
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nat</th>
                <th colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="bd_users">              
            </tbody>
          </table>
        </div>

        <div class="row" >
          <div class="col-md-8">
            <div class="form-inline text-center my-4"> 
              <label for="nb_elt" class="mr-2">Afficher par</label>
              <input class="form-control col-sm-6" type="number" name="nb_elt" id="nb_elt" min="1" max="10">
            </div> 
          </div>
          <div class="col-md-4 mt-4" id="suiv"><button>Suivant >></button></div>
      </div>
      </div>
      <div id="info" class="col-md-6"></div>
    </div>
  </div>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTHedqa4Y_YCg1cBIuUMTuckKRs8uaLg" ></script>
  <script type="text/javascript" src="./asset/js/jquery.googlemap.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="./asset/js/script.js"></script>
  </body>
</html>
