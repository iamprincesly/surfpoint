<?php
namespace App\Core; 

/**
 * Class Response
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
class Response 
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}