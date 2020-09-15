<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeModel extends CI_Model {

    public function connexion($username, $password){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('login', $username);
        $this->db->where('password', $password);

        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function getAllEmployeSaufAdmin(){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('role > 1');
        
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function deleteEmployeByID($idEmploye){
        //Création de la requete
        $this->db->query('DELETE FROM employee WHERE id_employee = '.$idEmploye);
    }

    public function addPersonne($recupUsername ,$recupPassword ,$recupMail ,$recupRole ,$recupNom ,$recupPrenom){
        //Création de la requete
        $data = array(
            'name' => $recupNom,
            'firstname' => $recupPrenom,
            'login' => $recupUsername,
            'password' => md5($recupPassword),
            'mail' => $recupMail,
            'role' => $recupRole
        );

        //insertion dans la base
        $this->db->insert('employee', $data);
    }

    public function getInfoByID($idUser){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id_employee = '.$idUser);
        
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function checkMailExistant($mailRecup){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('mail', $mailRecup);
        
        //Retourne les resultats
        return $this->db->get()->result_array();
    }

}