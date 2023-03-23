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
        'deleted_at',
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
    }
}
