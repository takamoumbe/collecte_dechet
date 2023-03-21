<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ClientModel;

class ClientController extends ResourceController{

    public function list() {
        $model = new ClientModel();
        $data = $model->findAll();
        return $this->respond($data);
    }
   
    

    public function show($id = null) {
        $model = new ClientModel();
        $data = $model->getWhere(['id_client' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Aucun client trouvé avec l\'identifiant : '.$id);
        }
    }
   
    

    public function create() {
        helper(['form']);
        $rules = ['telephone' => 'required|numeric|is_unique[client.telephone]'];

        if($this->validate($rules)){
            $model = new ClientModel();

            $data = [
                'telephone'     => $this->request->getVar('telephone'),
                'status_client' => 0,
                'created_at'    => date('d/m/Y h:i:s'),
            ];
            $model->insert($data);
            $response = ['status' => 201, 'error' => false];
            return $this->respondCreated($response);
        }else{
            $response = ['status' => 201, 'error' => false];
            return $this->respondCreated($response);
        }        
    }
   
    

    public function update($id = null) {
        $model = new ClientModel();
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
