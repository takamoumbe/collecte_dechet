<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserController extends ResourceController{


    private $model;
    public function __construct() {
        $this->model = new UserModel();
    }



    public function list_charge() {
        $data = $this->model->where(['type_user' => 'charger'])->findAll();
        return $this->respond($data);
    }



    public function list_agence() {
        $data = $this->model->where(['type_user' => 'agence'])->findAll();
        return $this->respond($data);
    }



    public function show($id = null){
        $data = $this->model->where('id_user', $id)->first();
        return $this->respond($data);
    }



    public function create()  {
        helper(['form', 'url']);
        $rules = $this->validate([
            'email' => 'required|valid_email|is_unique[user.email]'
        ]);

        if (!$rules) {
            $data = ['status' => 500, 'error' => 'email'];
            return $this->respond($data);
        } 
        else {
            $data = [
                'nom'       => $this->request->getVar('nom'),
                'prenom'    => $this->request->getVar('prenom'),
                'login'     => $this->request->getVar('login'),
                'password'  => $this->request->getVar('password'),
                'email'     => $this->request->getVar('email'),
                'lieu'      => $this->request->getVar('lieu'),
                'type_user' => $this->request->getVar('type_user'),
                'created_at'=> date('Y-m-d H:i:s'),
                'status_user'=> 0,
            ];

            $result = $this->model->insert($data);
            if ($result) {
                $response = ['status' => 200, 'error' => false];
            } else {
                $response = ['status' => 500, 'error' => true];
            }
            return $this->respond($data);
        }
    }



    public function update($id = null) {
        $data = [
            'nom'       => $this->request->getVar('nom'),
            'prenom'    => $this->request->getVar('prenom'),
            'login'     => $this->request->getVar('login'),
            'password'  => $this->request->getVar('password'),
            'email'     => $this->request->getVar('email'),
            'lieu'      => $this->request->getVar('lieu'),
            'type_user' => $this->request->getVar('type_user'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        
        $result = $this->model->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function desable($id = null) {
        $data = [
            'update_at'     => date('Y-m-d H:i:s'),
            'status_user'   => 1,
        ];
        
        $result = $this->model->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }



    public function enable($id = null) {
        $data = [
            'update_at'     => date('Y-m-d H:i:s'),
            'status_user'   => 0,
        ];
        
        $result = $this->model->update($id, $data);
        if ($result) {
            $response = ['status' => 200, 'error' => false];
        } else {
            $response = ['status' => 500, 'error' => true];
        }
        return $this->respond($response);
    }
}
