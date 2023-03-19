<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\DepotModel;

class DepotController extends ResourceController{
    
    public function list() {
        $model = new DepotModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
   

    public function show($id = null) {
        $model = new DepotModel();
        $data = $model->getWhere(['id_depot' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucune donnée trouvé avec l\'identifiant : '.$id);
        }
    }
    

    
    public function create()  {
        $model = new DepotModel();
        $times = date('d/m/Y');
        $data = [
            'date'          => date('d/m/Y'),
            'id_tache'      => $this->request->getVar('id_tache'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_depot'  => 0,
            'created_at'    => $times,
        ];
        $model->insert($data);
        $response = ['status' => 201, 'error' => null];
        return $this->respondCreated($response);
    }


   
    public function update($id = null) {
        $model = new DepotModel();
        $data = [
            'date'          => date('d/m/Y h:i:s'),
            'id_tache'      => $this->request->getVar('id_tache'),
            'id_user'       => $this->request->getVar('id_user'),
            'status_depot'  => 0,
            'updated_at'    => date('d/m/Y h:i:s'),
        ];
        $model->update($id, $data);
        $response = ['status' => 200, 'error' => null];
        return $this->respond($response);
    }

}
