<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourcePresenter;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\DechetModel;
use App\Models\ClientModel;


class DechetController extends ResourcePresenter{
    
    use ResponseTrait;

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



    /*
     * --------------------------------------------------------------------
     * Function for mobile
     * --------------------------------------------------------------------
    */

    /*@---> 1 send dechet
     **
     *@Retrun = response
     **
     *@use  = 
    */
    public function sendDechet(){

        $DechetModel = new DechetModel();
        $ClientModel = new ClientModel();

        $rules = [
            'type_dechet'      => [
                'rules'               => 'required'
            ],
            'description'      => [
                'rules'               => 'required'
            ],
            'contact'          => [
                'rules'               => 'required'
            ]
        ];


        if($this->validate($rules)){

            
            /*====================== IMPORT PHOTO ======================*/
            $photo = $this->request->getFile('image');
            $profile_photo = $photo->getName();
            // Renaming file before upload
            $temp_photo = explode(".",$profile_photo);
            $new_photo_name = 'Dechet'.date("Y-m-d H:m:s").round(microtime(true)) . '.' . end($temp_photo);
            $photo->move("photoDechet", $new_photo_name);

            // insertion des information du client

            // insertion du dechet
            $type_dechet = $this->request->getVar('type_dechet');
            $description = $this->request->getVar('description');
            $contact     = $this->request->getVar('contact');


            $response = [
                'status'    => 200,
                'success'   => true,
                'msg'       => 'Dechet envoyer '.$new_photo_name
             ];
              return $this->respond($response);

        }else{
             $response = [
                'status'    => 500,
                'success'   => false,
                'msg'       => 'Informations Invalides '
             ];
              return $this->respond($response);
        }

    }

}
