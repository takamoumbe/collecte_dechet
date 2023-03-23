<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DepotModel;

class DepotController extends ResourceController{


    private $depot;

    public function __construct() {
        $this->depot   = new DechetModel();
    }


    
    public function list() {
        $data = $this->depot->get_all_depot();
        return $this->respond($data);
    }
    
    

    
    public function show($id = null) {
        $data = $this->depot->get_one_depot($id);
        return $this->respond($data);
    }
    
    

    
    public function create()  {
        $data = [
            'date'          => date('d/m/Y'),
            'id_tache'      => $this->request->getVar('id_tache'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_depot'  => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        
        $result = $this->depot->insert($data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respondCreated($response);
    }
    
    

    
    public function update($id = null) {
        $model = new DepotModel();
        $data = [
            'date'          => $this->request->getVar('date'),
            'id_tache'      => $this->request->getVar('id_tache'),
            'id_user'       => $this->request->getVar('id_user'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->depot->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function desable($id = null) {
        $data = [
            'status_depot'  => 1,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->dechet->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function enable($id = null) {
        $data = [
            'status_depot'  => 0,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $result = $this->dechet->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }

}
