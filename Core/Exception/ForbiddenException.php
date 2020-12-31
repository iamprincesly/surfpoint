<?php
namespace App\Core\Exception;

use Exception;

/**
 * Class ForbiddenException
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Exception;
 */
class ForbiddenException extends Exception
{
    protected $message = 'You dont\'t have permission to access this page';
    protected $code = 403;
}