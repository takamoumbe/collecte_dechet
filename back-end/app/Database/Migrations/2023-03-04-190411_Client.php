<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration {
    public function up()
    {
        $this->forge->addField([  
            'id_client'         => [                                  
                'type'                  => 'INT',                          
                'auto_increment'        => true,                           
            ],                                            
            'telephone'         => [                                  
                'type'                  => 'TEXT'                          
            ],                                   
            'status_client'     => [                                 
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

        $this->forge->addPrimaryKey('id_client'); 
        $this->forge->createTable('client');                            
    }  
    

    public function down()
    {
        $this->forge->dropTable('client');
    }

}
