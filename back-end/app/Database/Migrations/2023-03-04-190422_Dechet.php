<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dechet extends Migration
{
     public function up()
    {
        $this->forge->addField([  
            'id_dechet'         => [                                  
                'type'                  => 'INT',                          
                'auto_increment'        => true,                           
            ],                                            
            'quantite'          => [                                  
                'type'                  => 'INT'                          
            ], 
            'type_dechet'       => [                                 
                'type'                  => 'TEXT', 
            ],                                  
            'description'       => [                                 
                'type'                  => 'TEXT', 
            ],
            'status_dechet'     => [                                 
                'type'                  => 'INT', 
            ],
            'id_client'         => [                                 
                'type'                  => 'INT', 
            ],
            'id_user'           => [                                 
                'type'                  => 'INT', 
            ], 
            'created_at'        => [                                          
                'type'                  => 'TEXT'                         
            ],                                             
            'updated_at'        => [                                  
                'type'                  => 'TEXT'                         
            ],                                             
            'deleted_at'        => [                                  
                'type'                  => 'TEXT'                         
            ],                                             
         ]); 

        $this->forge->addPrimaryKey('id_dechet'); 
        $this->forge->addForeignKey('id_client', 'client', 'id_client');                        
        $this->forge->addForeignKey('id_user', 'user', 'id_user');           
        $this->forge->createTable('dechet');                            
    }  
    

    public function down()
    {
        $this->forge->dropTable('dechet');
    }
    
}
