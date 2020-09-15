<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    //Récupération du role de la personne connecte
    $recupRole = 0;
    //Je regarde si je suis connecte
    if($this->session->userdata('logged_in') == true){
        $recupRole = $this->session->userdata('role');
    }
?>

<script>
$(document).ready(function() {

    $("#add").click(function( event ) {
        $.post("<?php echo base_url('OperationsController/addOperation');?>",{
            label: $("#nomEnvoi").val(),
            description: $("#prenomEnvoi").val(),
            employeID: <?php echo $this->session->userdata('id_employee');?>,
            typeID: $("#typeEnvoi").val(),
            customerID: $("#clientEnvoi").val(),
        },
        function(data, status){
            if(data == "Impossible de dépasser"){
                alert("Impossible de dépasser");
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
                    <h1 class="text-center">Listes des Opérations</h1>
                    <br><br></section>
                </div>
            </div>
            <br><br>
        <div class="row">
            <div class="col-md-12 text-center">
            <?php
                if($recupRole > 0){
                    echo '<a href="#" data-toggle="modal" data-target="#addOperation" class="btn btn-primary" style="background-color:#5f7981; color:white; border:none">Ajouter une opération</a>';
                }
            ?>

            </div>
        </div>
        <br>
        <div classs="row pt-4">
            <div class="col-md-12 text-center">
                <table class="table table-striped" >
                    <tr style="background-color:#5f7981; color:white; ">
                        <th>Label</th>
                        <th>Description</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Attribué à</th>
                    </tr>
                    <?php
                        foreach($allOperations as $row){
                            echo '<tr style="background-color:#d0a88c;">';
                                echo '<td>'.$row['label'].'</td>';
                                echo '<td>'.$row['description'].'</td>';
                                echo '<td>'.$row['date_begin'].'</td>';
                                if($recupRole > 0){
                                    if($row['date_end'] == ""){
                                        echo '<td><a href="'.base_url('OperationsController/finOperation/'.$row['id_task']).'" style="color:white"><i class="fa fa-check"></i> Terminer l\'opération</a></td>';
                                    }else{
                                        echo '<td>'.$row['date_end'].'</td>';
                                    }
                                }else{
                                    echo '<td>'.$row['date_end'].'</td>';
                                }
                                
                                echo '<td>'.$row['name'].' '.$row['firstname'].'</td>';
                             echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addOperation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header "style="background-color:#d0a88c">
        <h5 class="modal-title " id="exampleModalLabel" ><b>Ajouter une opération</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Label</label>
                        <input type="text" class="form-control" id="nomEnvoi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" id="prenomEnvoi">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Employe</label>
                        <!--<select id="employeEnvoi" class="form-control">-->
                            <?php
                                //foreach($allEmploye as $row){
                                //    echo '<option value="'.$row['id_employee'].'">'.$row['name'].' '.$row['firstname'].'</option>';
                                //}
                                echo "<input type='text' disabled class='form-control' value='".$employeEnCours."'>";
                            ?>
                        <!--</select>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Type</label>
                        <select id="typeEnvoi" class="form-control">
                            <?php
                                foreach($allType as $row){
                                    echo '<option value="'.$row['id_type'].'">'.$row['label'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Client</label>
                        <select id="clientEnvoi" class="form-control">
                            <?php
                                foreach($allCustomer as $row){
                                    echo '<option value="'.$row['id_customer'].'">'.$row['name'].' '.$row['firstname'].'</option>';
                                }
                            ?>
                        </select>
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