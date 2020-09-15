<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index(){
		//Appel du model #TasksModel
		$this->load->model('TasksModel');
		//Appel du model #EmployeModel
		$this->load->model('EmployeModel');

		//Récupération du chiffre d'affaire
        $recupChiffreAffaire = $this->TasksModel->getChiffreAffaire();
        
        //Verification, pour savoir si je suis connecte
        if($this->session->userdata('logged_in') == true){
		    //Récupération des inforamtions de l'utilisatuer
            $getInfo = $this->EmployeModel->getInfoByID($this->session->userdata('id_employee'))[0];
            //Création d'une variable
		    $nomPrenom = $getInfo['name'].' '.$getInfo['firstname'];
        }else{
            //Sinon je mets nomPrenom a vide
            $nomPrenom = "";
        }


		//Création d'une variable qui sera envoyé dans la vue
		$data = array(
			'title' => "Accueil",
			'jquerySend' => "$(document).ready(function(){ $('#home').addClass('active'); });",
			'chiffreAffaire' => $recupChiffreAffaire,
			'nomPrenom' => $nomPrenom
		);

		$this->load->view('Common/Header', $data);
		$this->load->view('Home/index');
		$this->load->view('Common/Footer');
	}

	
}
