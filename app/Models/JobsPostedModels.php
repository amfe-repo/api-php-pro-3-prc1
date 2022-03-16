<?php

namespace App\Models;

use CodeIgniter\Model;

class JobsPosted extends Model
{

    protected $table = 'JobsPosted';
    protected $primaryKey = 'IdJob';

    protected $returnType = 'array';
    protected $allowedFields = ['Description', 'IdSchedule', 'Position', 'UrlWebSite', 'Ubication', 'IdBussiness'];

    protected $validationRules = [
        'Description' => 'required|alpha_space|min_lenght[3]|max_lenght[120]',
        'Position' => 'required|alpha_space|min_lenght[3]|max_lenght[40]',
        'UrlWebSite' => 'required|alpha_space|min_lenght[3]|max_lenght[80]',
        'Ubication' => 'required|alpha_space|min_lenght[3]|max_lenght[40]'
    ];

    protected $validationMessage = [
        'Description' => [
            'valid_description' => 'Debe ingresar un descripcion'
        ]

    ];

    protected $skipValidation = false;
}

?>