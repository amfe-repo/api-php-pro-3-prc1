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
        'IdRole' => 'required|integer|max_length[1]|is_valid_role',

    ];

    protected $validationMessage = 
    [
        'Email' => 
        [
            'valid_email' => 'Debe ingresar un correo electrónico válido.'
        ]
    ];

    protected $skipValidation = false;

    public function entitieWithRole($idEntitie = null)
    {
        $tableBuilder = $this->db->table($this->table);
        $tableBuilder->select("Entities.idEntitie, Entities.Name AS Username, Entities.Password, Entities.LastName, Entities.DateBirthday, Entities.Email, Entities.City, Entities.Profession, Roles.Name AS Rolename, Roles.Description");

        $tableBuilder->join('Roles', 'Entities.idRole = Roles.idRole');
        $tableBuilder->where('Entities.idEntitie', $idEntitie);

        $query = $tableBuilder->get();
        return $query->getResult();
    }
}

