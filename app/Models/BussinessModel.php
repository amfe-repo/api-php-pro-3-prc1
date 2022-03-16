<?php

namespace App\Models;

use CodeIgniter\Model;

class Bussiness extends Model{

protected $table = 'Bussiness';
protected $primaryKey = 'IdBussiness';

protected $returnType = 'array';
protected $allowedFields = ['Name','Description','EmailToReply'];

protected $validationRules = [

    'Name' => 'required|alpha_space|min_lenght[3]|max_lenght[40]',
    'Description' => 'required|alpha_space|min_lenght[3]|max_lenght[120]',
    'EmailToReply' => 'required|alpha_space|min_lenght[3]|max_lenght[40]'
 
];



}

?>
