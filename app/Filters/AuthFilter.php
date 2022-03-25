<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        try 
        {
            $key = "secret";
            $headerD = $request->getServer('HTTP_AUTHORIZATION');

            if($headerD == null)
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'JWT not valid.');
            
            $arr = explode(' ', $headerD);
            $jwt = $arr[1];

            $j = preg_replace( "/<br>|\n/", "", $arr[1]);

            JWT::decode($j, new Key($key, 'HS256'));

        } catch (\Exception $e) 
        {
            return Services::response()->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Server error ' . $e);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

?>