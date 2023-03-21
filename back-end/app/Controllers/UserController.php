<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
include 'sweet.php';

class UserController extends ResourceController{

    public function list() {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }


    public function show($id = null) {
        $model = new UserModel();
        $data = $model->getWhere(['id_users' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucune donnée trouvé avec l\'identifiant : '.$id);
        }
    }
    

    
    public function create()  {
        helper(['form', 'url']);
        $rules = $this->validate([
            'email' => 'required|valid_email|is_unique[user.email]'
        ]);

        if (!$rules) {
            $response = ['error' => true, 'message' => 'email failed'];
            echo json_encode($response)
        } 
        else {
            $model = new UserModel();
            $data = [
                'nom'       => $this->request->getVar('nom'),
                'prenom'    => $this->request->getVar('prenom'),
                'password'  => $this->request->getVar('password'),
                'email'     => $this->request->getVar('email'),
                'lieu'      => $this->request->getVar('lieu'),
                'type_user' => $this->request->getVar('type_user'),
                'created_at'=> date('d/m/Y h:i:s'),
                'status_user'=> 0,
            ];
            $model->insert($data);
            $response = ['error' => false, 'message' => 'good'];
            echo json_encode($response)
            return $this->respondCreated($response);
        }
    }



    public function update($id = null) {
        $model = new UserModel();
        $data = [
            'nom'       => $this->request->getVar('nom'),
            'prenom'    => $this->request->getVar('prenom'),
            'login'     => $this->request->getVar('login'),
            'password'  => $this->request->getVar('password'),
            'email'     => $this->request->getVar('email'),
            'lieu'      => $this->request->getVar('lieu'),
            'type_user' => $this->request->getVar('type_user'),
            'update_at' => date('d/m/Y h:i:s'),
            'status_user'=> 0,
        ];
        $model->update($id, $data);
        $response = ['status' => 200, 'error' => null];
        return $this->respond($response);
    }

}
