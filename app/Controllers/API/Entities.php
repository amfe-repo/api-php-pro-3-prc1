<?php

namespace App\Controllers\API;

use App\Models\EntitiesModel;
use App\Models\RolesEntitiesModel;
use App\Models\RolesModel;
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
        try {
            $entitie = $this->request->getJSON();
            
            if ($this->model->insert($entitie)) {
                $entitie->id = $this->model->insertID();
                return $this->respondCreated($entitie);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (\Exception $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function search($id = null)
    {
        try 
        {
            if ($id == null)
                return $this->failValidationError('ID not valid.');

            $entitie = $this->model->find($id);

            if ($entitie == null)
                return $this->failNotFound('Id not found. ' . $id);

            return $this->respond($entitie);
        } catch (\Throwable $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function update($id = null)
    {
        try 
        {
            if ($id == null)
                return $this->failValidationError('ID not valid.');


            if ($this->model->find($id) == null)
                return $this->failNotFound('Id not found. ' . $id);

            $data = $this->request->getJSON();

            if ($this->model->update($id, $data)) {
                $data->id = $id;
                return $this->respondUpdated($data);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (\Throwable $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function delete($id = null)
    {
        try 
        {
            if ($id == null)
                return $this->failValidationError('ID not valid.');


            $client = $this->model->find($id);

            if ($client == null)
                return $this->failNotFound('Id not found. ' . $id);


            if ($this->model->delete($id)) {
                return $this->respondDeleted($client);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (\Throwable $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function searchRole($id = null)
    {
        try 
        {
            if ($id == null)
                return $this->failValidationError('ID not valid.');

            $entitie = $this->model->find($id);

            if ($entitie == null)
                return $this->failNotFound('Id not found. ' . $id);

            $entitie = $this->model->entitieWithRole($id);
            
            return $this->respond($entitie);
        } catch (\Throwable $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }
}
