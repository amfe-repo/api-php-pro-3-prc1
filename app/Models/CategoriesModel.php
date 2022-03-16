<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'IdCategory';

    protected $returnType = 'array';
    protected $allowedFields = ['Name'];

    protected $validationRules = [
        'Name' => 'required|alpha_space|min_lenght[3]|max_lenght[40]'
    ];

    protected $validationMessage = [
        'Name' => [
            'valid_name' => 'Debe ingresar una categoria.'
        ]
    ];
}
?>