<?php
namespace App\Core\Exception;

use Exception;

/**
 * Class NotFoundException
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Exception;
 */
class NotFoundException extends Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}