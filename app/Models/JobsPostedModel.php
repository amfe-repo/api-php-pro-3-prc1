<?php

namespace App\Models;

use CodeIgniter\Model;

class JobsPostedModel extends Model
{

    protected $table = 'JobsPosted';
    protected $primaryKey = 'IdJob';

    protected $returnType = 'array';
    protected $allowedFields = ['Description', 'IdSchedule', 'Position', 'UrlWebSite', 'Ubication', 'IdBussiness'];

    protected $validationRules = [
        'Description' => 'required|min_length[3]|max_length[120]',
        'Position' => 'required|min_length[3]|max_length[40]',
        'UrlWebSite' => 'required|valid_email|min_length[3]|max_length[80]',
        'Ubication' => 'required|min_length[3]|max_length[40]'
    ];

    protected $validationMessage = [
        'Description' => [
            'valid_description' => 'Debe ingresar un descripcion'
        ]

    ];

    protected $skipValidation = false;
}

?>