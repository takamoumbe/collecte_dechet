<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\TachesModel;

class TachesController extends ResourceController{
    
    private $tache;

    public function __construct() {
        $this->tache   = new TachesModel();
    }


    public function list() {
        $data = $this->tache->get_all_tache();
        return $this->respond($data);
    }


   

    public function show($id = null) {
        $data = $this->tache->get_one_tache($id);
        return $this->respond($data);
    }
    

    
    public function add_user_tache()  {
        $data = [
            'id_dechet'     => $this->request->getVar('id_dechet'),
            'id_user'       => $this->request->getVar('id_user'),
            'date'          => $this->request->getVar('id_user'),
            'status_tache'  => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        
        $result = $this->tache->insert($data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respondCreated($response);
    }


   
    public function remove_user_tache($id = null) {
        $result = $this->tache->delete(['id_tache' => $id]);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }


   
    public function update($id = null) {
        $data = [
            'id_dechet'     => $this->request->getVar('id_dechet'),
            'id_user'       => $this->request->getVar('id_user'),
            'date'          => $this->request->getVar('id_user'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->tache->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function desable($id = null) {
        $data = [
            'status_tache'  => 0,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->tache->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function enable($id = null) {
        $data = [
            'status_tache'  => 1,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->tache->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }

}


