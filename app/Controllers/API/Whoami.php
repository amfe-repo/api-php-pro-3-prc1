<?php

namespace App\Controllers\API;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\RESTful\ResourceController;

class Whoami extends ResourceController
{
    public function index()
    {
        try 
        {
            $key = "secret";

            $data = $this->request->getJSON();
            
            $user = JWT::decode($data->token, new Key($key, 'HS256'));

            return $this->respond($user->data);
        } 
        catch (\Exception $th) 
        {
            return $this->failServerError('An error ocurried ');
        }
    }
}