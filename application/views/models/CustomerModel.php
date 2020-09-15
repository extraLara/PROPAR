<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {

    public function getAllCustomers(){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('customer');
        
        //Retourne les resultats
        return $this->db->get()->result_array();
    }
    public function addCustomers($recupMail ,$recupNom ,$recupPrenom){
            //Création de la requete
            $data = array(
                'name' => $recupNom,
                'firstname' => $recupPrenom,
                'mail' => $recupMail
            );
        
        //insertion dans la base
        $this->db->insert('customer', $data);
    
    }
    public function deleteCustomerByID($recupId){
        //Création de la requete
        $this->db->query('DELETE FROM customer WHERE id_customer = '.$recupId);
    }

    public function checkMailExistant($mailRecup){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('mail', $mailRecup);
        
        //Retourne les resultats
        return $this->db->get()->result_array();
    }
    
}