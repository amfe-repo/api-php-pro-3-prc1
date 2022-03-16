<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleJob extends Model
{

    protected $table = 'ScheduleJob';
    protected $primaryKey = 'IdSchedule';

    protected $returntype = 'array';
    protected $allowedFields = ['Schedule'];

    protected $validationRules = [
        'Schedule' => 'required|alpha_space|min_lenght[3]|max_lenght[25]'
    ];

    protected $validationMessage = [
        'Schedule' => [
            'valid_schedule' => 'Debe ingresar un horario'
        ]
    ];

    protected $skipValidation = false;
}
?>