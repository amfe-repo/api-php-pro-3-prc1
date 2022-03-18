<?php

namespace App\Controllers\API;

use App\Models\ScheduleJobModel;
use CodeIgniter\RESTful\ResourceController;

class ScheduleJob extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new ScheduleJobModel());
    }

    public function index()
    {
        $schedulejob = $this->model->findAll();
        return $this->respond($schedulejob);
    }

    public function create()
    {
        try {
            $schedulejob = $this->request->getJSON();

            if ($this->model->insert($schedulejob)) {
                $schedulejob->id = $this->model->insertID();
                return $this->respondCreated($schedulejob);
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

            $schedulejob = $this->model->find($id);

            if ($schedulejob == null)
                return $this->failNotFound('Id not found. ' . $id);

            return $this->respond($schedulejob);
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
