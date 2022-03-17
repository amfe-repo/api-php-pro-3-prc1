<?php

namespace App\Models;

use CodeIgniter\Model;

class EntitiesModel extends Model
{

    protected $table = 'Entities';
    protected $primaryKey = 'IdEntitie';

    protected $returnType = 'array';
    protected $allowedFields = ['Name', 'Password', 'LastName', 'DateBirthday', 'Email', 'City', 'Profession', 'IdRole'];

    protected $validationRules = 
    [
        'Name' => 'required|alpha_space|min_length[3]|max_length[40]',
        'Password' => 'required|alpha_space|min_length[3]|max_length[60]',
        'LastName' => 'required|alpha_space|min_length[3]|max_length[40]',
        'DateBirthday' => 'required',
        'Email' => 'required|valid_email|min_length[3]|max_length[60]',
        'City' => 'required|alpha_space|min_length[3]|max_length[50]',
        'Profession' => 'required|alpha_space|max_length[40]',
        'IdRole' => 'required|numeric|max_length[1]'

    ];

    protected $validationMessage = 
    [
        'Email' => 
        [
            'valid_email' => 'Debe ingresar un correo electrónico válido.'
        ]
    ];

    protected $skipValidation = false;
}

