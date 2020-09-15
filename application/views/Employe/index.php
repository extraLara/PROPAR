<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {

    $("#add").click(function( event ) {
        $.post("<?php echo base_url('EmployeController/addEmploye');?>",{
            username: $("#loginEnvoi").val(),
            password: $("#passwordEnvoi").val(),
            mail: $("#mailEnvoi").val(),
            role: $("#roleEnvoi").val(),
            nom: $("#nomEnvoi").val(),
            prenom: $("#prenomEnvoi").val()
        },
        function(data, status){
            if(data == "Le mail existe déjà dans la base"){
                alert(data);
            }else{
                location.reload();
            }
        });
        event.preventDefault();
    });

});
</script>

<div class="py-5">
    <div class="container">
    <div class="row">
            <div class='col-md-12 text-center'>
                <section  style="background-color:#5f7981; color:white; border:none; border-radius:25px; font-family:'Bernard MT'">
                <br><br>
                    <h1 class="text-center">Listes des Employés</h1>
                    <br><br></section>
                </div>
            </div>
            <br><br>
        <div class="row">
            <div class='col-md-12 text-center'>
                <a href="<?php echo base_url('Employe/add');?>" data-toggle="modal" data-target="#addPersonne" class="btn btn-primary" style="background-color:#5f7981; color:white; border:none">Ajouter une personne</a>
            </div>
        </div>
        <br>
        <div classs="row pt-4">
            <div class="col-md-12 text-center">
                <table class="table table-striped">
                    <tr style="background-color:#5f7981; color:white;">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Role</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        foreach($allEmploye as $row){
                            echo '<tr style="background-color:#d0a88c;">';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['firstname'].'</td>';
                                echo '<td>'.$row['mail'].'</td>';
                                echo '<td>'.$row['role'].'</td>';
                                echo '<td><a href="'.base_url('EmployeController/deleteEmploye/'.$row['id_employee']).'" style="color:white"><i class="fa fa-trash"></i></a></td>';
                             echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPersonne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#d0a88c">
        <h5 class="modal-title" id="exampleModalLabel"><b>Ajouter un employé</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" id="nomEnvoi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" class="form-control" id="prenomEnvoi">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mail</label>
                        <input type="mail" class="form-control" id="mailEnvoi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select id="roleEnvoi" class="form-control">
                            <option value="1">Expert</option>
                            <option value="2">Sénior</option>
                            <option value="3">Apprenti</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control" id="loginEnvoi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" id="passwordEnvoi">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#5f7981; color:white; border:none;">Fermer</button>
        <button type="button" id="add" class="btn btn-primary" style="background-color:#d0a88c;border:none">Ajouter</button>
      </div>
    </div>
  </div>
</div>
<!--navbar-->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center" >
    <li class="page-item disabled" >
      <a class="page-link" href="#" tabindex="-1" style="border:none">Précédent</a>
    </li>
    <li class="page-item"><a class="page-link" style="border:none; background-color:#5f7981; color:white" href="#">1</a></li>
    <li class="page-item"><a class="page-link" style="border:none; background-color:#5f7981; color:white" href="#">2</a></li>
    <li class="page-item"><a class="page-link" style="border:none; background-color:#5f7981; color:white" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" style="border:none; color:grey"  href="#">Suivant</a>
    </li>
  </ul>
</nav>