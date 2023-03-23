<?php

namespace App\Models;

use CodeIgniter\Model;

class TachesModel extends Model
{ 
    protected $DBGroup          = 'default';
    protected $table            = 'tache';
    protected $primaryKey       = 'id_tache';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_tache',
        'id_dechet',
        'id_user',
        'date',
        'etat',
        'status_tache',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

<<<<<<< HEAD
    /*
     * --------------------------------------------------------------------
     * Function for mobile
     * --------------------------------------------------------------------
    */

    public function selectTacheForUser($idUser){

        // data
        $data_final = array();


        $buider1 = $this->db->table('tache');
        $buider1->where('etat', 0);
        $buider1->where('id_user', $idUser);
        $buider1->select('*');
        $query1 = $buider1->get();
        $data1 = $query1->getResultArray();

        
        for ($i=0; $i < sizeof($data1); $i++) { 

            $data  = $data1[$i]['id_dechet'];
            $array =  array();
            $array =  explode(',', $data, 20);
            

            $data_inter = [
                'nbre_dechet'   => sizeof($array),
                'date'          => $data1[$i]['date'],
                'etat'          => $data1[$i]['etat'],
                'status_tache'  => $data1[$i]['status_tache'],
                'created_at'    => $data1[$i]['created_at'],
                'updated_at'    => $data1[$i]['updated_at'],
                'deleted_at'    => $data1[$i]['deleted_at']
            ];

            array_push($data_final, $data_inter);
        }


        return $data_final;

    }

    public function tacheEffectuer($idUser){
        // data
        $data_final = array();


        $buider1 = $this->db->table('tache');
        $buider1->where('etat', 1);
        $buider1->where('id_user', $idUser);
        $buider1->select('*');
        $query1 = $buider1->get();
        $data1 = $query1->getResultArray();

        
        for ($i=0; $i < sizeof($data1); $i++) { 

            $data  = $data1[$i]['id_dechet'];
            $array =  array();
            $array =  explode(',', $data, 20);
            

            $data_inter = [
                'id_tache'      => $data1[$i]['id_tache'],
                'nbre_dechet'   => sizeof($array),
                'date'          => $data1[$i]['date'],
                'etat'          => $data1[$i]['etat'],
                'status_tache'  => $data1[$i]['status_tache'],
                'created_at'    => $data1[$i]['created_at'],
                'updated_at'    => $data1[$i]['updated_at'],
                'deleted_at'    => $data1[$i]['deleted_at']
            ];

            array_push($data_final, $data_inter);
        }


        return $data_final;
=======



    public function get_all_tache() {
        $builder = $db->table('tache');
        $builder->select('id_tache, id_dechet, status_tache, date, id_tache, id_user, nom, prenom');
        $builder->join('user', 'user.id_user = depot.id_user');
        $query = $builder->get();
        return $query;
    }


    public function get_one_tache($id = null) {
        $builder = $db->table('tache');
        $builder->select('id_tache, id_dechet, status_tache, date, id_tache, id_user, nom, prenom');
        $builder->join('user', 'user.id_user = depot.id_user');
        $builder->where('id_depot', $id);
        $query = $builder->get();
        return $query;
>>>>>>> 6033a349d12ce683c1ff737c9f21db261400f52b
    }
}
