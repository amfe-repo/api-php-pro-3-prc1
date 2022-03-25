<?php

namespace App\Models;

use CodeIgniter\Model;

class BussinessModel extends Model{

protected $table = 'Bussiness';
protected $primaryKey = 'IdBussiness';

protected $returnType = 'array';
protected $allowedFields = ['Name','Description','EmailToReply'];

protected $validationRules = [

    'Name' => 'required|alpha_space|min_length[3]|max_length[40]',
    'Description' => 'required|min_length[3]|max_length[120]',
    'EmailToReply' => 'required|valid_email|min_length[3]|max_length[40]'
 
];



}

?>
