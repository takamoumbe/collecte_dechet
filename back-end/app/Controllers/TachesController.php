<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\TachesModel;

class TachesController extends ResourceController{
    
    public function list() {
        $model = new TachesModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
   

    public function show($id = null) {
        $model = new TachesModel();
        $data = $model->getWhere(['id_tache' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucune donnée trouvé avec l\'identifiant : '.$id);
        }
    }
    

    
    public function create()  {
        $model = new TachesModel();
        $times = date('d-m-Y');
        $dechet = $this->request->getVar('id_dechet');
        $variable = '';
        for ($i=0; $i < count($dechet); $i++) { 
            $variable = ','.$dechet[$i];
        }


        $data = [
            'id_dechet'     => $variable,
            'id_user'       => $this->request->getVar('id_user'),
            'date'          =>  $times,
            'etat'          => 'inactif',
            'status_tache'  => 0,
            'created_at'    => $times,
        ];
        $model->insert($data);
        $response = ['status' => 201, 'error' => null];
        return $this->respondCreated($response);
    }


   
    public function update($id = null) {
        $model = new TachesModel();
        
        $dechet = $this->request->getVar('id_dechet');
        $variable = '';
        for ($i=0; $i < count($dechet); $i++) { 
            $variable = ','.$dechet[$i];
        }

        $data = [
            'id_dechet'     => $variable,
            'id_user'       => $this->request->getVar('id_user'),
            'date'          => date('d/m/Y'),
            'etat'          => 'inactif',
            'status_tache'  => 0,
            'created_at'    => date('d/m/Y'),
        ];
        $model->update($id, $data);
        $response = ['status' => 200, 'error' => null];
        return $this->respond($response);
    }

}


