<?php
namespace App\Core;

use App\Core\Middlewares\Middleware;

/**
 * Class Controller
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
class Controller 
{
    public string $layout = 'master';
    public string $action = '';

    /**
     * @var \App\Core\Middlewares\Middleware
     */
    protected array $middlewares = [];
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function view($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function middleware(Middleware $middleware) {
        $this->middleware[] = $middleware;
    }
    
    /**
     * Middlewares getter
     *
     * @return \App\Core\Middlewares\Middleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}