<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ClientModel;

class ClientController extends ResourceController{


    private $client;

    public function __construct() {
        $this->client = new ClientModel();
    }


    public function list() {
        $data = $this->client->findAll();
        return $this->respond($data);
    }



    public function show($id = null) {
        $data = $this->client->where('id_client', $id)->first();
        return $this->respond($data);
    }



    public function create() {
        helper(['form', 'url']);
        $rules = ['telephone' => 'required|numeric|is_unique[client.telephone]'];

        if($this->validate($rules)){
            $data = [
                'telephone'     => $this->request->getVar('telephone'),
                'status_client' => 0,
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            $result = $this->client->insert($data);
            if ($result) {
                $response = ['status' => 200, 'error' => false];
            } else {
                $response = ['status' => 500, 'error' => true];
            }
        }
        else{
            $data = ['status' => 400, 'error' => true];
            return $this->respond($data);
        }        
    }



    public function update($id = null) {
        $input = $this->request->getRawInput();
        $data = [
            'telephone'     => $this->request->getVar('telephone'),
            'update_at'     => date('Y-m-d H:i:s'),
        ];

        $result = $this->client->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($data);
    }



    public function desable($id = null) {
        $data = [
            'update_at'     => date('Y-m-d H:i:s'),
            'status_client' => 1,
        ];
        
        $result = $this->client->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($data);
    }



    public function enable($id = null) {
        $data = [
            'update_at'     => date('Y-m-d H:i:s'),
            'status_client' => 0,
        ];
        $this->client->update($id, $data);
        $data = ['status' => 200, 'error' => null];
        return $this->respond($data);
    }
}
