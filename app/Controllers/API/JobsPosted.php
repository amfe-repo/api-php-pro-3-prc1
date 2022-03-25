<?php

namespace App\Controllers\API;

use App\Models\JobsPostedModel;
use CodeIgniter\RESTful\ResourceController;

//use App\Models\JobsPostedModels;


class JobsPosted extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new JobsPostedModel());
    }

    public function index()
    {
        $jobsposted = $this->model->findAll();
        return $this->respond($jobsposted);
    }


    public function create()
    {
        try {
            $jobsposted = $this->request->getJSON();

            if ($this->model->insert($jobsposted)) {

                $jobsposted->id = $this->model->insertID();
                return $this->respondCreated($jobsposted);
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

            $jobsposted = $this->model->find($id);

            if ($jobsposted == null)
                return $this->failNotFound('Id no encontrado' . $id);

            return $this->respond($jobsposted);
        } catch (\Throwable $th) {

            return $this->failServerError('An error ocurried.');
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

    public function searchJobs($id = null)
    {
        try 
        {

            if ($id != null)
            {
                $jobsposted = $this->model->find($id);

                if ($jobsposted == null)
                    return $this->failNotFound('Id no encontrado' . $id);
            }
          
            $jobsposted = $this->model->jobsWithInfo($id);
            
            return $this->respond($jobsposted);
            
        } catch (\Exception $e) {

            return $this->failServerError('An error ocurried. ' . $e);
        }
    }
}
