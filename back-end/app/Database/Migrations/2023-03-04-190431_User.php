<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([  
            'id_user'               => [                                  
                'type'                  => 'INT',                          
                'auto_increment'        => true,                           
            ],                                            
            'nom'                   => [                                  
                'type'                  => 'TEXT'                          
            ], 
            'prenom'                => [                                  
                'type'                  => 'TEXT'                          
            ],
            'login'                 => [                                  
                'type'                  => 'TEXT'                          
            ],
            'email'                 => [                                  
                'type'                  => 'TEXT'                          
            ], 
            'lieu'                  => [                                  
                'type'                  => 'TEXT'                          
            ], 
            'type_user'             => [                                  
                'type'                  => 'TEXT'                          
            ],                                   
            'status_user'           => [                                 
                'type'                  => 'INT', 
            ], 
            'created_at'            => [                                          
                'type'                  => 'TIMESTAMP'                         
            ],                                             
            'updated_at'            => [                                  
                'type'                  => 'TIMESTAMP'                         
            ],                                             
            'deleted_at'            => [                                  
                'type'                  => 'TIMESTAMP'                         
            ],                                             
        ]); 

        $this->forge->addPrimaryKey('id_user'); 
        $this->forge->createTable('user');                            
    }  
    

    public function down()
    {
         this->forge->dropTable('user');
    }
}
