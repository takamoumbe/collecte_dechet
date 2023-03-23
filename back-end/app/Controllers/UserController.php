<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;


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
        $model = new UserModel();
        $data = [
            'nom'       => $this->request->getVar('nom'),
            'prenom'    => $this->request->getVar('prenom'),
            'login'     => $this->request->getVar('login'),
            'password'  => $this->request->getVar('password'),
            'email'     => $this->request->getVar('email'),
            'lieu'      => $this->request->getVar('lieu'),
            'type_user' => $this->request->getVar('type_user'),
            'created_at'=> date('d/m/Y h:i:s'),
            'status_user'=> 0,
        ];
        $model->insert($data);
        $response = ['status' => 201, 'error' => null];
        return $this->respondCreated($response);
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


    /*
     * --------------------------------------------------------------------
     * Function for mobile
     * --------------------------------------------------------------------
    */

    /*@---> 1 authentification
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function verif_pass($password1, $password2){
        if ($password1 == $password2) {
            return true;
        }else{
            return false;
        }
    }

    public function authentification(){

        $UserModel = new UserModel();

        $rules = [
            'login'         => [
                'rules'               => 'required'
            ],
            'password'      => [
                'rules'               => 'required|min_length[5]|max_length[255]'
            ]
        ];

        if ($this->validate($rules)) {

            $login          = $this->request->getVar('login'); 
            $password       = $this->request->getVar('password'); 
            $user           = $UserModel->where('login', $login)->first();

           if(is_null($user)) {

                $response = [
                    'success'       => false,
                    'status'        => 500,
                    'msg'           => 'Mot de passe ou login invalides.',
                    'token'         => "",
                    'type_user'     => "",
                    'id_user'       => 0,
                    'nom'           => "",
                    'prenom'        => "",
                    'login'         => "",
                    'password'      => ""
                ];

                return $this->respond($response);

           }else{

                if (!$this->verif_pass($password, $user['password'])) {
                    
                    $response = [
                        'success'       => false,
                        'status'        => 500,
                        'msg'           => 'Mot de passe ou login invalides.',
                        'token'         => "",
                        'type_user'     => "",
                        'id_user'       => 0,
                        'nom'           => "",
                        'prenom'        => "",
                        'login'         => "",
                        'password'      => ""
                     ];

                     return $this->respond($response);

                }else{

                    $response = [
                        'success'       => true,
                        'status'        => 200,
                        'msg'           => 'Login Succesful.',
                        'token'         => "qwertyuiop",
                        'type_user'     => $user['type_user'],
                        'id_user'       => $user['id_user'],
                        'nom'           => $user['nom'],
                        'prenom'        => $user['prenom'],
                        'login'         => $user['login'],
                        'password '     => $password 
                     ];
                     
                    return $this->respond($response);

                }
            }
        }else{

            $response = [
                'success'       => false,
                'status'        => 500,
                'msg'           => 'Mot de passe ou login invalides.',
                'token'         => "",
                'type_user'     => "",
                'id_user'       => 0,
                'nom'           => "",
                'prenom'        => "",
                'login'         => "",
                'password'      => ""
             ];

             return $this->respond($response);
        }
    } 


    /*@---> 2 liste des agences
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function listeAgences(){

        $UserModel = new UserModel();

        $data  =  $UserModel->where(['status_user' => 0, 'type_user' => 'agence'])->findAll();
        $data_final  = array();

        foreach ($data as $key) {

            $data_inter = [
                'id_agence'     => $key['id_user'],
                'nom_agence'    => $key['nom'],
                'email_agence'  => $key['email'],
                'lieu_agence'   => $key['lieu'],
                'status_agence' => $key['status_user'],
            ];

            array_push($data_final, $data_inter);

        }

        return $this->respond($data_final);
    }
    
}
