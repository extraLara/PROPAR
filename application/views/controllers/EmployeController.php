<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeController extends CI_Controller {

	public function index(){
        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //Récupération des employes
        $recupAllEmploye = $this->EmployeModel->getAllEmployeSaufAdmin();

		//Création d'une variable qui sera envoyé dans la vue
		$data = array(
			'title' => "Accueil",
            'jquerySend' => "$(document).ready(function(){ $('#employe').addClass('active'); });",
            'allEmploye' => $recupAllEmploye
		);

		$this->load->view('Common/Header', $data);
		$this->load->view('Employe/index');
		$this->load->view('Common/Footer');
    }
    
    public function deleteEmploye($idEmploye){
        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //Récuparation de l'id employe
        $recupId = $idEmploye;

        //Suppression dans la base
        $this->EmployeModel->deleteEmployeByID($recupId);

        //Redirect
        redirect(base_url('Employe'));
    }

    public function addEmploye(){
        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //récupération des variables 
        $recupUsername = $this->input->post('username');
        $recupPassword = $this->input->post('password');
        $recupMail = $this->input->post('mail');
        $recupRole = $this->input->post('role');
        $recupNom = $this->input->post('nom');
        $recupPrenom = $this->input->post('prenom');

        //verification si le mail existe 
        if(count($this->EmployeModel->checkMailExistant($recupMail)) == 0){
            //insertion dans la base
            $this->EmployeModel->addPersonne($recupUsername ,$recupPassword ,$recupMail ,$recupRole ,$recupNom ,$recupPrenom);
        }else{
            echo "Le mail existe déjà dans la base";
        }
    }

	
}
