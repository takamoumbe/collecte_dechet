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


    /*
     * --------------------------------------------------------------------
     * Function for mobile
     * --------------------------------------------------------------------
    */

    /*@---> 1 liste taches for user
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function listetaches($idUser){

        $TachesModel = new TachesModel();

        $data = $TachesModel->selectTacheForUser($idUser);

        return $this->respond($data);

    }

     /*@---> 2 terminer la tache
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function terminerTaches($id_tache){

        $TachesModel = new TachesModel();

        $data = [
            'etat' => 1
        ];

        if ($TachesModel->where('id_tache', $id_tache)->set($data)->update() === false) {
        
            $response = [
              'success' => false,
              'status'  => 500,
              'msg'     => 'La tache ne peut etre terminer.'
            ];
         return $this->respond($response);

        }else{

             $response = [
                  'success' => true,
                  'status'  => 200,
                  'msg'     => 'La tache est terminer.'
              ];
             return $this->respond($response);
        }

    }

    /*@---> 3 transferer la tache
     **
     *@Retrun = response
     **
     *@use  = 
    */

    public function transfererTaches($idUser, $idAgence){

        $TachesModel = new TachesModel();

        $dataTacheEffectuer = $TachesModel->tacheEffectuer($idUser);
        $count=0;

        for ($i=0; $i < sizeof($dataTacheEffectuer); $i++) { 
            
            $data = [
                'status_tache' => $idAgence
            ];

            if ($TachesModel->where('id_tache', $dataTacheEffectuer[$i]['id_tache'])->set($data)->update() === false) {
        
            }else{
                $count++;
            }
        }

        if ($count == sizeof($dataTacheEffectuer)) {
           $response = [
                  'success' => true,
                  'status'  => 200,
                  'msg'     => 'Le transfert est terminer.'
              ];
             return $this->respond($response);
        }else{
            $response = [
                  'success' => false,
                  'status'  => 500,
                  'msg'     => 'Le transfert a échouer.'
              ];
             return $this->respond($response);
        }
    }



}
