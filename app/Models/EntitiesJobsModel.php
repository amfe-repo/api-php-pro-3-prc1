<?php

namespace App\Models;

use CodeIgniter\Model;

class EntitiesJobsModel extends Model{

    protected $table = 'EntitiesJobs';
    protected $primaryKey = 'IdEntitieJob';
    
    protected $allowedFields = ['IdEntitie','IdJobPosted'];


}

?>
