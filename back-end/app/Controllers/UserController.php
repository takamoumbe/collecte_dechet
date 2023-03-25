<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use \Firebase\JWT\JWT;  

class UserController extends ResourceController{


    public $model;
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


    /*@---> enregistrer un charger de mission
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function addChargerMission(){
        $UserModel = new UserModel();

        $rules = [
            'nom'           => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]'
            ],
            'login2'        => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]'
            ],
            'prenom'        => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]'
            ],
            'email'         => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]|valid_email|is_unique[user.email]'
            ],
            'password'      => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]|is_unique[user.password]'
            ]
        ];

        if ($this->validate($rules)) {

            $data = [
                "nom"           => $this->request->getVar('nom'),
                "prenom"        => $this->request->getVar('prenom'),
                "login"         => $this->request->getVar('login2'),
                "email"         => $this->request->getVar('email'),
                "password"      => $this->request->getVar('password'),
                "type_user"     => "collecteur",
                "created_at"    => date("Y-m-d H:m:s"),
                "updated_at"    => date("Y-m-d H:m:s"),
                "status_user"   => 0,
            ];

            $UserModel->save($data);

            $response = [
                "success" => true,
                "status"  => 200,
                "msg"     => "Insertion reussir"
            ];

            return $this->respond($response);

        }else{

            $response = [
                "success" => false,
                "status"  => 500,
                "msg"     => $this->validator->getErrors(),
            ];

            return $this->respond($response);

        }
    }


    /*@---> enregistrer une agence
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function addAgence(){
        $UserModel = new UserModel();

        $rules = [
            'nom_agence'        => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]'
            ],
            'lieu_agence'       => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]'
            ],
            'email_agence'      => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]|valid_email|is_unique[user.email]'
            ],
            'password_agence'   => [
                'rules'               => 'trim|required|min_length[5]|max_length[255]|is_unique[user.password]'
            ]
        ];


        if ($this->validate($rules)) {

            $data = [
                "nom"           => $this->request->getVar('nom_agence'),
                "lieu"          => $this->request->getVar('lieu_agence'),
                "email"         => $this->request->getVar('email_agence'),
                "password"      => $this->request->getVar('password_agence'),
                "type_user"     => "entrepot",
                "created_at"    => date("Y-m-d H:m:s"),
                "updated_at"    => date("Y-m-d H:m:s"),
                "status_user"   => 0,
            ];

            $UserModel->save($data);

            $response = [
                "success" => true,
                "status"  => 200,
                "msg"     => "Insertion reussir"
            ];

            return $this->respond($response);

        }else{

            $response = [
                "success" => false,
                "status"  => 500,
                "msg"     => $this->validator->getErrors(),
            ];

            return $this->respond($response);

        }
    }

    /*@---> liste charger de mission
     **
     *@Retrun = response
     **
     *@use  = 
    */

     public function listeCollecteurSelect2(){

        $chaine = $this->request->getVar('searchTerm');
        $data   = $this->model->get_collecteur_search($chaine);
        $data_final = array();

        for ($i=0; $i < sizeof($data); $i++) { 
           $data_inter = [
                "id"   => $data[$i]['id_user'], 
                "text" => $data[$i]['nom'].' | '.$data[$i]['prenom']
           ];

           array_push($data_final, $data_inter);
        }

        return $this->respond($data_final);
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
                     ];

                     return $this->respond($response);

                }else{

                    $key = getenv('JWT_SECRET');
                    $iat = time(); // current timestamp value
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "Issuer of the JWT",
                        "aud" => "Audience that the JWT",
                        "sub" => "Subject of the JWT",
                        "iat" => $iat, //Time the JWT issued at
                        "exp" => $exp, // Expiration time of token
                        "email" => $user['email'],
                    );
                      
                    $token = JWT::encode($payload, $key, 'HS256');

                    $response = [
                        'success'       => true,
                        'status'        => 200,
                        'msg'           => 'Login Succesful.',
                        'token'         => $token,
                        'type_user'     => $user['type_user'],
                        'id_user'       => $user['id_user'],
                        'nom'           => $user['nom'],
                        'prenom'        => $user['prenom'],
                        'login'         => $user['login'],
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

        $donnees = [
            'count'     => sizeof($data_final),
            'allAgence' => $data_final,
        ];

        return $this->respond($donnees);
    }
    

}
