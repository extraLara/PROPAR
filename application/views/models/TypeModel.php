<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeModel extends CI_Model {
    
    public function getAllTypes(){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('type');
        
        //Retourne les resultats
        return $this->db->get()->result_array();
    }
}