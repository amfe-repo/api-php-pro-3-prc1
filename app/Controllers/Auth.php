<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\EntitiesModel;
use Firebase\JWT\JWT;

class Auth extends BaseController
{
    use ResponseTrait;

    public function login()
    {
        try {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new EntitiesModel();
            $where = ['Email' => $email, 'Password' => $password];

            $validate = $model->where($where)->first();

            if($validate == null)
                return $this->failNotFound('User not valid.');

            return $this->respond(["Token"=> $this->generateJWT($model->entitieWithRole($validate['IdEntitie']))]);

        } catch (\Exception $e) {
            return $this->failServerError('Error de servidor' . $e);
        }
    }

    protected function generateJWT($data)
    {
        $key = "secret";
        $time = time();
        $payload = 
        [
            'data' => $data,
            'aud' => base_url(),
            'iat' => $time,
            'exp' => $time + 500
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;

    }
}
