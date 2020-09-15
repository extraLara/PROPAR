<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index(){
		//Création d'une variable qui sera envoyé dans la vue
		$data = array(
            'title' => "Connexion",
            'jquerySend' => "$(document).ready(function(){ $('#connexion').addClass('active'); });"
		);

		$this->load->view('Common/Header', $data);
		$this->load->view('Login/index');
		$this->load->view('Common/Footer');
    }
    
    public function connexion(){
        //Appel du model #EmployeModel
        $this->load->model('EmployeModel');

        //Récupération des variables
        $recupUserName = $this->input->post('username');
        $recupPassword = md5($this->input->post('password'));

        //Verirication dans la base
        $verification = $this->EmployeModel->connexion($recupUserName, $recupPassword);

        if(count($verification) == 0){
            echo "Error";
        }else{
            //Mise en session des variables
            $newdata = array(
                'id_employee'  => $verification[0]['id_employee'],
                'role'     => $verification[0]['role'],
                'logged_in' => TRUE
            );
            //Creation dans la session
            $this->session->set_userdata($newdata);
        }
    }

    public function logout(){
        //suppression des variables de sessions
        $this->session->sess_destroy();
        //redirection sur la page de connexion
        redirect(base_url('Login'));
    }

	
}
