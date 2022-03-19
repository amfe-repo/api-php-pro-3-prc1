<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model{

protected $table = 'Roles';
protected $primaryKey = 'IdRole';

protected $returntype = 'array';
protected $allowedFields = ['Name','Description'];

protected $validationRules = [
'Name' => 'required|alpha_space|min_length[3]|max_length[40]',
'Description' => 'required|min_length[3]|max_length[40]'
];

protected $validationMessage = [
'Name' => [
    'valid_name' => 'Debe ingresar el nombre de un rol.'
]

];

protected $skipValidation = true;

}
?>