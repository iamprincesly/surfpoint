<?php
namespace App\Core\Middlewares; 

/**
 * Class Middleware
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Middlewares;
 */
abstract class Middleware 
{
    abstract public function execute();
}