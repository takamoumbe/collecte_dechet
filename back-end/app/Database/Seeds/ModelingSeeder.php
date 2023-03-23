<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use App\Models\ClientModel;
use App\Models\DechetModel;
use App\Models\DepotModel;
use App\Models\TachesModel;

class ModelingSeeder extends Seeder {

    function Charge_mission(){
        $user = new UserModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 149; $i++) { 
            $user->save(
                [
                    'nom'           =>    $faker->firstName,
                    'prenom'        =>    $faker->lastName,
                    'login'         =>    $faker->userName,
                    'password'      =>    $faker->password,
                    'email'         =>    $faker->email,
                    'type_user'     =>    'charger',
                    'status_user'   =>    rand(0, 1),
                    'created_at'    =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    function Agence(){
        $user = new UserModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 18; $i++) { 
            $user->save(
                [
                    'nom'           =>    $faker->company,
                    'password'      =>    $faker->password,
                    'email'         =>    $faker->companyEmail,
                    'type_user'     =>    'agence',
                    'status_user'   =>    rand(0, 1),
                    'created_at'    =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    function Clients(){
        $client = new ClientModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 207; $i++) { 
            $client->save(
                [
                    'telephone'       =>    '237'.rand(650000000, 690000000),
                    'status_client'   =>    rand(0, 1),
                    'created_at'    =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    function Dechets(){
        $dechet = new DechetModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 347; $i++) { 
            $dechet->save(
                [
                    'type_dechet'       =>    $faker->randomElement($array = ['Plastiques', 'Organiques', 'Cassables', 'Electroniques']),
                    'quantite'          =>    rand(10, 5000),
                    'description'       =>    $faker->text($maxNbChars = rand(50, 200)),
                    'status_dechet'     =>    0,
                    'id_client'         =>    rand(1, 207),
                    'id_user'           =>    rand(1, 167),
                    'status_client'     =>    rand(0, 1),
                    'created_at'    =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    function Depots(){
        $depots = new DepotModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 207; $i++) { 
            $depots->save(
                [
                    'date'           =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s'),
                    'status_depot'   =>    rand(0, 1),
                    'id_tache'       =>    rand(1, 647),
                    'id_user'        =>    rand(1, 148),
                    'created_at'    =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }

    function Taches(){
        $depots = new TachesModel;
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 647; $i++) { 
            $depots->save(
                [
                    'id_dechet'      =>    rand(1, 347),
                    'id_user'        =>    rand(1, 148),
                    'date'           =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s'),
                    'status_tache'   =>    rand(0, 1),
                    'created_at'     =>    $faker->dateTimeBetween('+0 days', '+1 month')->format('Y-m-d H:i:s')
                ]
            );
        }
    }




    public function run() {
        $this->Charge_mission();
        $this->Agence();
        $this->clients();
        $this->Dechets();
        $this->Taches();
        $this->Depots();
    }
}
