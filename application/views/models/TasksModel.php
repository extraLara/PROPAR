<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TasksModel extends CI_Model {

    public function getAllOperations($idUser){
        //Création de la requete
        $this->db->select('tasks.id_task as id_task, tasks.label as label, tasks.description as description, tasks.date_begin as date_begin, tasks.date_end as date_end, employee.name as name, employee.firstname as firstname');
        $this->db->from('tasks, employee');
        $this->db->where('tasks.id_employee = employee.id_employee');
        $this->db->where('tasks.id_employee', $idUser);
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function getAllOperationsPublic(){
        //Création de la requete
        $this->db->select('tasks.id_task as id_task, tasks.label as label, tasks.description as description, tasks.date_begin as date_begin, tasks.date_end as date_end, employee.name as name, employee.firstname as firstname');
        $this->db->from('tasks, employee');
        $this->db->where('tasks.id_employee = employee.id_employee');
        $this->db->order_by('tasks.label', 'ASC');
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function addOperation($recupLabel, $recupDescription, $recupEmployeID, $recupTypeID, $recupCustomerID){
        //Création du tableau
        $data = array(
            'label' => $recupLabel,
            'description' => $recupDescription,
            'date_begin' => date('Y/m/d'),
            'date_end' => null,
            'date_progress' => null,
            'id_type' => $recupTypeID,
            'id_customer' => $recupCustomerID,
            'id_employee' => $recupEmployeID
        );

        //insertion dans la base
        $this->db->insert('tasks', $data);
    }

    public function closeOperation($idOperation){
        $this->db->query('UPDATE tasks SET date_end = "'.date('Y/m/d').'" WHERE id_task = '.$idOperation);
    }

    public function verifOperationRole($idUser){
        //Création de la requete
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('id_employee', $idUser);
        $this->db->where('date_end IS NULL');
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }

    public function getChiffreAffaire(){
        //Création de la requete
        $this->db->select('SUM(type.price) AS somme');
        $this->db->from('type, tasks');
        $this->db->where('type.id_type = tasks.id_type');
        $this->db->where('tasks.date_end IS NOT NULL');
        //Retourne le resultat;
        return $this->db->get()->result_array();
    }
}