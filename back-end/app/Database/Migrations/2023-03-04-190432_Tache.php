<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tache extends Migration
{
    public function up()
    {
        $this->forge->addField([  
            'id_tache'          => [                                  
                'type'                  => 'INT',                          
                'auto_increment'        => true,                           
            ],                                            
            'id_dechet'         => [                                  
                'type'                  => 'INT'                          
            ],                                   
            'id_user'           => [                                 
                'type'                  => 'INT', 
            ],
            'date'              => [                                 
                'type'                  => 'TEXT', 
            ],
            'status_tache'      => [                   // ce genre masque le tuple lors de la suppression              
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

        $this->forge->addPrimaryKey('id_tache'); 
        $this->forge->addForeignKey('id_user', 'user', 'id_user');           
        $this->forge->addForeignKey('id_dechet', 'dechet', 'id_dechet');           
        $this->forge->createTable('tache');                            
    }  
    

    public function down()
    {
        $this->forge->dropTable('tache');
    }

}
