<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;


class DechetController extends ResourceController{
    
    
    public function list() {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
   

    public function show($id = null) {
        $model = new UserModel();
        $data = $model->getWhere(['id_dechet' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucune donnée trouvé avec l\'identifiant : '.$id);
        }
    }
    

    
    public function create()  {
        $model = new UserModel();
        $type_dechet = $this->request->getVar('telephone');
        $variable = '';

        for ($i=0; $i < count($type_dechet); $i++) { 
            $variable = ','.$type_dechet[$i];
        }

        $data = [
            'type_dechet'   => $variable,
            'quantite'      => $this->request->getVar('quantite'),
            'description'   => $this->request->getVar('description'),
            'id_client'     => $this->request->getVar('id_client'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_dechet' => 0,
            'created_at'    => date('d/m/Y h:i:s'),
        ];
        $model->insert($data);
        $response = ['status' => 201, 'error' => null];
        return $this->respondCreated($response);
    }


   
    public function update($id = null) {
        $model = new UserModel();
        $type_dechet = $this->request->getVar('telephone');
        $variable = '';

        for ($i=0; $i < count($type_dechet); $i++) { 
            $variable = ','.$type_dechet[$i];
        }

        $data = [
            'type_dechet'   => $variable,
            'quantite'      => $this->request->getVar('quantite'),
            'description'   => $this->request->getVar('description'),
            'id_client'     => $this->request->getVar('id_client'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_dechet' => 0,
            'created_at'    => date('d/m/Y h:i:s'),
        ];
        $model->update($id, $data);
        $response = ['status' => 200, 'error' => null];
        return $this->respond($response);
    }

}
