<?php

namespace App\Controllers\API;

use App\Models\EntitiesModel;
use CodeIgniter\RESTful\ResourceController;

class Entities extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new EntitiesModel());
    }

    public function index()
    {
        $entities = $this->model->findAll();
        return $this->respond($entities);
    }

    public function create()
    {
        try 
        {
            $entitie = $this->request->getJSON();

            if ($this->model->insert($entitie)) 
            {
                $entitie->id = $this->model->insertID();
                return $this->respondCreated($entitie);
            }
            else
            {
                return $this->failValidationError($this->model->validation->listErrors());
            }

        } catch (\Exception $th) 
        {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function put_method()
    {
        echo "Este es el metodo put";

    }

    public function delete_method()
    {
        echo "Este es el metodo delete";

    }



}
