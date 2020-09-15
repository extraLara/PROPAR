<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperationsController extends CI_Controller {

	public function index(){
        //Appel du model #TasksModel
        $this->load->model('TasksModel');

        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //Appel du model #CustomerModel
        $this->load->model('CustomerModel');

        //Appel du model #TypeModel
        $this->load->model('TypeModel');

        if($this->session->userdata('logged_in') == false){
            //Récupération des operations
            $recupAllTasks = $this->TasksModel->getAllOperationsPublic();
            //Mets a zero
            $nomPrenomFormate = "";
        }else{
            //Récupération des operations
            $recupAllTasks = $this->TasksModel->getAllOperations($this->session->userdata('id_employee'));

            //Récupération des employes
            //$recupAllEmployes = $this->EmployeModel->getAllEmployeSaufAdmin();
            $nomPrenom = $this->EmployeModel->getInfoByID($this->session->userdata('id_employee'))[0];
            $nomPrenomFormate = $nomPrenom['name'].' '.$nomPrenom['firstname'];
        }
 

        //Récupértion des types
        $recupAllTypes = $this->TypeModel->getAllTypes();

        //Récupértion des customer
        $recupAllCustomers = $this->CustomerModel->getAllCustomers();

		//Création d'une variable qui sera envoyé dans la vue
		$data = array(
			'title' => "Accueil",
            'jquerySend' => "$(document).ready(function(){ $('#operation').addClass('active'); });",
            'allOperations' => $recupAllTasks,
            //'allEmploye' => $recupAllEmployes,
            'employeEnCours' => $nomPrenomFormate,
            'allType' => $recupAllTypes,
            'allCustomer' => $recupAllCustomers
        );

		$this->load->view('Common/Header', $data);
		$this->load->view('Operations/index');
		$this->load->view('Common/Footer');
    }
    
    public function addOperation(){
        //Appel du model #TasksModel
        $this->load->model('TasksModel');
        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //Récupération des variables
        $recupLabel = $this->input->post('label');
        $recupDescription = $this->input->post('description');
        $recupEmployeID = $this->input->post('employeID');
        $recupTypeID = $this->input->post('typeID');
        $recupCustomerID = $this->input->post('customerID');

        //recupération toutes les operations de la personne
        $recupAllOpe = $this->TasksModel->verifOperationRole($recupEmployeID);

        //Récupération du role de la personne
        $recupRolePersonne = $this->EmployeModel->getInfoByID($recupEmployeID)[0]['role'];

        //Cette varaible va me permettre d'inserer
        $insert = true;

        if($recupRolePersonne == 3){
            if(count($recupAllOpe) == 1){
                $insert = false;
            }
        }

        if($recupRolePersonne == 2){
            if(count($recupAllOpe) == 3){
                $insert = false;
            }
        }

        if($recupRolePersonne == 1){
            if(count($recupAllOpe) == 5){
                $insert = false;
            }
        }

        if($insert == true){
            //Insertion dans la base
            $this->TasksModel->addOperation($recupLabel, $recupDescription, $recupEmployeID, $recupTypeID, $recupCustomerID);
        }else{
            echo "Impossible de dépasser";
        }
    }

    public function finOperation($idOperationURL){
        //Appel du model #TasksModel
        $this->load->model('TasksModel');

        //Récupératon de l'id operation
        $recupIDOperation = $idOperationURL;

        //Mise a jours de l'operation
        $this->TasksModel->closeOperation($recupIDOperation);

        //Redirection sur la meme page
        redirect(base_url('Operations'));
    }

	
}
