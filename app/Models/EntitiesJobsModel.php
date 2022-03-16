<?php

namespace App\Models;

use CodeIgniter\Model;

class EntitiesJobs extends Model{

    protected $table = 'EntitiesJobs';
    protected $primaryKey = 'IdEntitieJob';
    
    protected $allowedFields = ['IdEntitie','IdJobPosted'];


}

?>
