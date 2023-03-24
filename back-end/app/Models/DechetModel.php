<?php

namespace App\Models;

use CodeIgniter\Model;

class DechetModel extends Model
{
   protected $DBGroup          = 'default';
   protected $table            = 'dechet';
   protected $primaryKey       = 'id_dechet';
   protected $useAutoIncrement = true;
   protected $insertID         = 0;
   protected $returnType       = 'array';
   protected $useSoftDeletes   = false;
   protected $protectFields    = true;
   protected $allowedFields    = [
      'id_dechet', 
      'type_dechet', 
      'quantite', 
      'description', 
      'photo', 
      'status_dechet',
      'id_client',
      'id_user',
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


   public function get_all_dechet() {
      $builder = $db->table('dechet');
      $builder->select('id_dechet, quantite, description, id_client, telephone, id_user, nom, prenom, status_dechet');
      // $builder->join('user', 'user.id_user = dechet.id_user');
      $builder->join('client', 'client.id_client = dechet.id_client');
      $query = $builder->get();
      return $query;
   }

   public function get_all_dechet_no() {
      $builder = $this->db->table('dechet');
      $builder->select('id_dechet, quantite, description, dechet.id_client, telephone, id_user, status_dechet');
      $builder->where('status_dechet', 0);
      $builder->join('client', 'client.id_client = dechet.id_client');
      $query = $builder->get();
      return $query->getResult();
   }

   public function get_one_dechet($id = null) {
      $builder = $db->table('dechet');
      $builder->select('id_dechet, quantite, description, id_client, telephone, id_user, nom, prenom, status_dechet');
      // $builder->join('user', 'user.id_user = dechet.id_user');
      $builder->join('client', 'client.id_client = dechet.id_client');
      $builder->where('id_dechet', $id);
      $query = $builder->get();
      return $query;
   }
}
