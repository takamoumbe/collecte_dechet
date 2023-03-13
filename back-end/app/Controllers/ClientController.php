<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DechetModel;

class ClientController extends ResourceController{

    
    public function list() {
        $model = new DechetModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
   
    

    public function show($id = null) {
        $model = new DechetModel();
        $data = $model->getWhere(['id_client' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucune donnée trouvé avec l\'identifiant : '.$id);
        }
    }
    

    
    public function create()  {
        $model = new DechetModel();
        $data = [
            'telephone'     => $this->request->getVar('telephone'),
            'status_client' => 0,
            'created_at'    => date('d/m/Y h:i:s'),
        ];
        $model->insert($data);
        $response = ['status' => 201, 'error' => null];
        return $this->respondCreated($response);
    }


   
    public function update($id = null) {
        $model = new DechetModel();
        $input = $this->request->getRawInput();
        $data = [
            'telephone'     => $this->request->getVar('telephone'),
            'update_at'     => date('d/m/Y h:i:s'),
            'status_client' => 0,
        ];
        $model->update($id, $data);
        $response = ['status' => 200, 'error' => null];
        return $this->respond($response);
    }
}
