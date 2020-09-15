<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--mon CSS-->
    <style rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"></style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <title><?php echo $title;?></title>
    <style>
      .navbar {
        background-color:#c89f86;
        color:#62767e;
        font-family:'Another Typewriter';
      }
    </style>
    <script>
      //Selon la page je passe en active le nav-link
      <?php echo $jquerySend;?>
    </script>
  </head>
  <body style="background-image: url('https://image.freepik.com/free-vector/earth-tone-patterned-background_53876-89932.jpg')">

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('');?>"><img src="<?php echo base_url('assets/img/logo.png');?>" width="25%" alt="Propar"></a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" style="font-family:'Cooper';font-size:25px;color:white" id="home" href="<?php echo base_url('');?>">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
        <?php 
          if($this->session->userdata('logged_in') == true){
              echo '
              
             
              <li class="nav-item">
                <a class="nav-link text-right" style="font-family:Circe"   href="'.base_url('LoginController/logout').'">Déconnexion</a>
              </li>';
          }else{
              echo '     
             
              <li class="nav-item ">
                <a class="nav-link text-right" style="font-family:Circe" id="connexion" href="'.base_url('Login').'">Connexion</a>
              </li>';
          }
        ?>
        </ul>
    </div>
</nav>