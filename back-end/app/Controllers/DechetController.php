<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourcePresenter;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\DechetModel;
use App\Models\ClientModel;


class DechetController extends ResourcePresenter{
     
    use ResponseTrait;


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

            // insertion du dechet
            $type_dechet = $this->request->getVar('type_dechet');
            $description = $this->request->getVar('description');
            $contact     = $this->request->getVar('contact');

            // insertion des information du client
            $data = [
                'telephone'     => $contact,
                'status_client' => 0,
                'created_at'    => date("Y-m-d H:m:s"),
                'updated_at'    => date("Y-m-d H:m:s")
            ];

            $ClientModel->save($data);

            $id_client = $ClientModel->insertId();

            // insertion des dechet

            $data = [
                'type_dechet'   => $type_dechet,
                'quantite'      => 0,
                'description'   => $description,
                'status_dechet' => 0,
                'id_client'     => $id_client,
                'id_user'       => 0,
                'created_at'    => date("Y-m-d H:m:s"),
                'updated_at'    => date("Y-m-d H:m:s")
            ];

            $DechetModel->save($data);

            $response = [
                'status'    => 200,
                'success'   => true,
                'msg'       => 'Dechet envoyer '
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
