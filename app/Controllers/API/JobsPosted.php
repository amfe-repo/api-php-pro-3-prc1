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
}
