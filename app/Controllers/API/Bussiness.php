<?php

namespace App\Controllers\API;

use App\Models\BussinessModel;
use CodeIgniter\RESTful\ResourceController;

class Bussiness extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new BussinessModel());
    }

    public function index()
    {
        $bussiness = $this->model->findAll();
        return $this->respond($bussiness);
    }

    public function create()
    {
        try {
            $bussiness = $this->request->getJSON();

            if ($this->model->insert($bussiness)) {
                $bussiness->id = $this->model->insertID();
                return $this->respondCreated($bussiness);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (\Exception $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function search($id = null)
    {
        try {
            if ($id == null)
                return $this->failValidationError('ID not valid.');

            $bussiness = $this->model->find($id);

            if ($bussiness == null)
                return $this->failNotFound('Id not found. ' . $id);

            return $this->respond($bussiness);
        } catch (\Throwable $th) {
            return $this->failServerError('An error ocurried' . $th);
        }
    }

    public function update($id = null)
    {
        try {
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
        try {
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
}
