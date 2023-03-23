<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DechetModel;


class DechetController extends ResourceController{


    private $dechet;

    public function __construct() {
        $this->dechet   = new DechetModel();
    }



    public function list() {
        $data = $this->dechet->get_all_dechet();
        return $this->respond($data);
    }



    public function show($id = null) {
        $data = $this->dechet->get_one_dechet($id);
        return $this->respond($data);
    }
    

    
    public function create()  {
        $data = [
            'type_dechet'   => $this->request->getVar('type_dechet'),
            'quantite'      => $this->request->getVar('quantite'),
            'description'   => $this->request->getVar('description'),
            'id_client'     => $this->request->getVar('id_client'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_dechet' => 0,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        
        $result = $this->dechet->insert($data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respondCreated($response);
    }



    public function update($id = null) {
        $data = [
            'type_dechet'   => $variable,
            'quantite'      => $this->request->getVar('quantite'),
            'description'   => $this->request->getVar('description'),
            'id_client'     => $this->request->getVar('id_client'),
            'id_user'       => $this->request->getVar('id_user'),
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



    public function desable($id = null) {
        $data = [
            'status_dechet' => 0,
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
            'status_dechet' => 1,
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
