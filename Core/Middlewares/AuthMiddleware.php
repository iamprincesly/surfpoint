<?php
namespace App\Core\Middlewares;

use App\Core\Application;
use App\Core\Exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Middlewares;
 */
class AuthMiddleware extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}