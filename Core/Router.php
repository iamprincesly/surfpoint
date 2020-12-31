<?php
namespace App\Core;

use App\Core\Exception\NotFoundException;

/**
 * Class Router
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
class Router 
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    
    /**
     * Router constructor
     *
     * @param  \app\core\Request $request
     * @param  \app\core\Response $response
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        
        // Render 404 Page
        if ($callback === false) {
            // return $this->renderView('errors/404');
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }

        if (is_array($callback)) {
            
            /** @var \App\Core\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }
 
}