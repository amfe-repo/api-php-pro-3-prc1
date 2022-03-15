<?php

namespace App\Models;

use CodeIgniter\Model;

class Entities extends Model
{

    protected $table = 'Entities';
    protected $primaryKey = 'IdEntitie';

    protected $returnType = 'array';
    protected $allowedFields = ['Name', 'Password', 'LastName', 'DateBirthday', 'Email', 'City', 'Profession', 'IdRole'];

    /*
protected $useTimestamps = true;
protected $createdField = 
*/



    protected $validationRules = [
        'Name' => 'required|alpha_space|min_lenght[3]|max_lenght[40]',
        'Password' => 'required|alpha_space|min_lenght[3]|max_lenght[60]',
        'LastName' => 'required|alpha_space|min_lenght[3]|max_lenght[40]',
        'DateBirthday' => 'required|alpha_space|',
        'Email' => 'required|alpha_space|min_lenght[3]|max_lenght[60]',
        'City' => 'required|alpha_space|min_lenght[3]|max_lenght[50]',
        'Profession' => 'required|alpha_space|max_lenght[40]',

    ];

    protected $validationMessage = [
        'Email' => [
            'valid_emial' => 'Debe ingresar un correo electrónico válido.'
        ]
    ];

    protected $skipValidation = false;
}
