<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {

    $("#add").click(function( event ) {
        $.post("<?php echo base_url('CustomersController/addCustomers');?>",{
            mail: $("#mailEnvoi").val(),
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
                    <h1 class="text-center">Listes des Clients</h1>
                    <br><br></section>
                </div>
            </div>
            <br><br>
        <div class="row">
            <div class='col-md-12 text-center'>
                <a href="<?php echo base_url('Customers/add');?>" data-toggle="modal" data-target="#addCustomers" class="btn btn-primary" style="background-color:#5f7981; color:white; border:none">Ajouter un client</a>
            </div>
        </div>
        <br>
        <div classs="row pt-4">
            <div class="col-md-12 text-center">
                <table class="table table-striped">
                    <tr style="background-color:#5f7981; color:white; ">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        foreach($allCustomers as $row){
                            echo '<tr style="background-color:#d0a88c;">';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['firstname'].'</td>';
                                echo '<td>'.$row['mail'].'</td>';
                                echo '<td><a href="'.base_url('CustomersController/deleteCustomer/'.$row['id_customer']).'" style="color:white"><i class="fa fa-trash"></i></a></td>';
                             echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCustomers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#d0a88c">
        <h5 class="modal-title" id="exampleModalLabel"><b>Ajouter un client</b></h5>
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mail</label>
                        <input type="mail" class="form-control" id="mailEnvoi">
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