<?php

namespace App\Controllers\API;

use App\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;

class Categories extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new CategoriesModel());
    }

    public function index()
    {
        $categories = $this->model->findAll();
        return $this->respond($categories);
    }

    public function create()
    {
        try 
        {
            $categorie = $this->request->getJSON();

            if ($this->model->insert($categorie)) 
            {
                $categorie->id = $this->model->insertID();
                return $this->respondCreated($categorie);
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

    public function search($id = null)
    {
        try 
        {
            if($id == null)
                return $this->failValidationError('ID not valid.');
            
            $categorie = $this->model->find($id);

            if($categorie == null)
                return $this->failNotFound('Id not found. ' . $id);
            
            return $this->respond($categorie);
        } 
        catch (\Throwable $th) 
        {
            return $this->failServerError('An error ocurried' . $th);
        }

    }

    public function update($id = null)
    {
        try 
        {
            if($id == null)
                return $this->failValidationError('ID not valid.');
            

            if($this->model->find($id) == null)
                return $this->failNotFound('Id not found. ' . $id);
            
            $data = $this->request->getJSON();

            if ($this->model->update($id, $data)) 
            {
                $data->id = $id;
                return $this->respondUpdated($data);
            }
            else
            {
                return $this->failValidationError($this->model->validation->listErrors());
            }

        } 
        catch (\Throwable $th) 
        {
            return $this->failServerError('An error ocurried' . $th);
        }

    }

    public function delete($id = null)
    {
        try 
        {
            if($id == null)
                return $this->failValidationError('ID not valid.');
            

            $categorie = $this->model->find($id);

            if($categorie == null)
                return $this->failNotFound('Id not found. ' . $id);
            

            if ($this->model->delete($id)) 
            {
                return $this->respondDeleted($categorie);
            }
            else
            {
                return $this->failValidationError($this->model->validation->listErrors());
            }

        } 
        catch (\Throwable $th) 
        {
            return $this->failServerError('An error ocurried' . $th);
        }

    }

}
