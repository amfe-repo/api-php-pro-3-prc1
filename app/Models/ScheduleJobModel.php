<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleJobModel extends Model
{

    protected $table = 'ScheduleJob';
    protected $primaryKey = 'IdSchedule';

    protected $returntype = 'array';
    protected $allowedFields = ['Schedule'];

    protected $validationRules = [
        'Schedule' => 'required|alpha_space|min_length[3]|max_length[25]'
    ];

    protected $validationMessage = [
        'Schedule' => [
            'valid_schedule' => 'Debe ingresar un horario'
        ]
    ];

    protected $skipValidation = false;
}
?>