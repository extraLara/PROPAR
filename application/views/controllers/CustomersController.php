<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomersController extends CI_Controller {

	public function index(){
        //Appel du model #CustomerModel
        $this->load->model('CustomerModel');

        //Récupération des clients
        $recupAllCustomer= $this->CustomerModel->getAllCustomers();

		//Création d'une variable qui sera envoyé dans la vue
		$data = array(
			'title' => "Accueil",
            'jquerySend' => "$(document).ready(function(){ $('#employe').addClass('active'); });",
            'allCustomers' => $recupAllCustomer
		);

		$this->load->view('Common/Header', $data);
		$this->load->view('Customer/index');
		$this->load->view('Common/Footer');
    }
    
    public function deleteCustomer($idCustomer){
        //Appel du model #EmployeModel
        $this->load->model('CustomerModel');

        //Récuparation de l'id employe
        $recupId = $idCustomer;

        //Suppression dans la base
        $this->CustomerModel->deleteCustomerByID($recupId);

        //Redirect
        redirect(base_url('Customers'));
    }

    public function addCustomers(){
        //Appel du model #EmployeModel
        $this->load->model('CustomerModel');

        //récupération des variables 
        $recupMail = $this->input->post('mail');
        $recupNom = $this->input->post('nom');
        $recupPrenom = $this->input->post('prenom');

        //verification si le mail existe 
        if(count($this->CustomerModel->checkMailExistant($recupMail)) == 0){
            //insertion dans la base
            $this->CustomerModel->addCustomers( $recupMail ,$recupNom ,$recupPrenom);
        }else{
            echo "Le mail existe déjà dans la base";
        }

    }

	
}
