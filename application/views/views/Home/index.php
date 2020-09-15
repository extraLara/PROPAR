<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    //Récupération du role de la personne connecte
	$recupRole = 0;
	//Par défaut j'affiche ce message
	$textLog = "<br><br><section><h2>Merci de vous connecter</h2><br><br><a type='button' role='button' href=".base_url('Login')." class='btn btn-primary' style='background-color:#c19b82; border:none; color:white; border:-radius:25px'>Connectez-vous</a></section>";
    //Je regarde si je suis connecte
    if($this->session->userdata('logged_in') == true){
		$recupRole = $this->session->userdata('role');
		//si je suis connectée alors j'affiche Bonjour $NomPrenom
		$textLog =  "Bonjour, <b>".$nomPrenom."</b> ! ";
	}
	
?>

<script>
$( document ).ready(function() {
    $("#card1").hide().fadeIn(1000);
	$("#card2").hide().fadeIn(1500);
	$("#card3").hide().fadeIn(2000);
});
</script>


<section style="background-color:#64958f; color:white">
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
			 <?php echo $textLog;?>  
			</div>
		</div>
	</div>
	<br>
</section>
<?php
//Si je suis connecte alors j'affiche 
	if($recupRole > 0){
		echo '<br>
				<div class="row">
					<div class="col-md-12 text-center">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalChiffreAffaire"  style="background-color:#65747a; border:none" >Chiffre d\'affaire</button>

					</div>
				</div>
			</div>';
	}
?>

<br><br>
<div class="container">
	<div class="row">
		<?php
			//Si mon role est egal a 1 alors c'est que jsuis expert
			//Donc j'affiche les card supplementaires
			if($recupRole == 1){
				echo '<div class="col-md-4"> 
					<div class="card" id="card1" style="border:none">
						<!-- Card image -->
						<img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/19/11/19/office-1209640_960_720.jpg" alt="Card image cap">
		
						<!-- Card content -->
						<div class="card-body" style="background-color: #edcfa9; border-bottom-left-radius:25px; border-bottom-right-radius:25px">
							<!-- Title -->
							<h4 class="card-title"><a>Gérer les personnes</a></h4>
							<!-- Text -->
							<p class="card-text"></p>
							<!-- Button -->
							<a href="'.base_url('Employe').'" class="btn btn-primary text-center" style="border-radius:25px;color:white; background-color: #64958f; border:none">Gérer</a>
						</div>
					</div>
				</div>
				<div class="col-md-4"> 
					<div class="card" id="card2" style="border:none">
						<!-- Card image -->
						<img class="card-img-top" src="https://cdn.pixabay.com/photo/2014/05/02/21/50/home-office-336378_960_720.jpg" alt="Card image cap">

						<!-- Card content -->
						<div class="card-body" style="background-color: #edcfa9; border-bottom-left-radius:25px; border-bottom-right-radius:25px">
							<!-- Title -->
							<h4 class="card-title"><a>Gérer listes Clients</a></h4>
							<!-- Text -->
							<p class="card-text"></p>
							<!-- Button -->
							<a href="'.base_url('Customers').'" class="btn btn-primary text-center"  style="border-radius:25px;color:white; background-color: #64958f; border:none">Gérer</a>
						</div>
					</div>
				</div>';
			}

		?>
		<div class="col-md-4"> 
                <div class="card" id="card3" style="border:none"> 
                        <!-- Card image -->
                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2018/03/17/10/51/bulletin-board-3233653_960_720.jpg" alt="Card image cap">

                        <!-- Card content -->
                        <div class="card-body" style="background-color: #edcfa9; border-bottom-left-radius:25px; border-bottom-right-radius:25px">
                            <!-- Title -->
                            <h4 class="card-title"><a>Liste des opérations</a></h4>
                            <!-- Text -->
                            <p class="card-text"></p>
                            <!-- Button -->
                            <a href="<?php echo base_url('Operations');?>" class="btn btn-primary text-center" style="border-radius:25px;color:white; background-color: #64958f; border:none">Gérer</a>
                        </div>
                    </div>
        </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalChiffreAffaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalChiffreA"><b>Chiffre d'affaires</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <?php
		  if($this->session->userdata('role') == 1){
			$recupChiffreAffaire = $chiffreAffaire[0]['somme'];
	
			$chiffreAffaireFormat = 0;
	
			if($recupChiffreAffaire > 0){
				$chiffreAffaireFormat = $recupChiffreAffaire;
			}
	
			echo '<br><br><p class="text-center">&nbsp;&nbsp;Le chiffre d\'affaire est de : <b>'.$chiffreAffaireFormat.' €</b></p>';	
		}else{
			echo '<p>Vous n\'êtes pas expert pour voir le chiffre d\'affaire.</p>';	
		}

	  ?>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#c6a087; border:none">Fermer</button>
      </div>
    </div>
  </div>
</div>
