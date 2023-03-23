<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Depot extends Migration
{
   public function up()
    {
        $this->forge->addField([  
            'id_depot'          => [                                  
                'type'                  => 'INT',                          
                'auto_increment'        => true,                           
            ],                                            
            'date'              => [                                  
                'type'                  => 'TEXT'                          
            ],                                   
            'status_depot'      => [                                 
                'type'                  => 'INT', 
            ], 
            'id_tache'          => [                                  
                'type'                  => 'INT'                          
            ],
            'id_user'           => [                                  
                'type'                  => 'INT'                          
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

        $this->forge->addPrimaryKey('id_depot'); 
        $this->forge->addForeignKey('id_tache', 'tache', 'id_tache');                        
        $this->forge->addForeignKey('id_user', 'user', 'id_user');                        
        $this->forge->createTable('depot');                            
    }  
    

    public function down()
    {
        $this->forge->dropTable('depot');
    }
}
