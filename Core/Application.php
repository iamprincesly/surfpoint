<?php
namespace App\Core; 

use App\Core\Database\Database;

/**
 * Class Application
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
class Application 
{
    public static string $ROOT_DIR;

    public string $layout = 'master';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $database;
    public ?UserModel $user;
    public View $view;

    public static Application $app;
    public ?Controller $controller = null;
    public function __construct($routePath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $routePath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->database = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('errors/403', ['exception' => $e]);
        }
    }
    
    /**
     * Controller getter
     *
     * @param  \app\core\Controller $controller
     * @return $contoller
     */
    public function getController(Controller $controller)
    {
        return $this->controller;
    }

    /**
     * Controller setter
     *
     * @param  \app\core\Controller $controller
     * @return void
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }
    
    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}