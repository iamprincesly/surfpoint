<?php
namespace App\Controllers;

use App\Models\User;
use App\Core\Request;
use App\Core\Response;
use App\Core\Controller;
use App\Core\Application;
use App\Models\LoginForm;
use App\Core\Middlewares\AuthMiddleware;

/**
 * Class AuthController
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Controllers;
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');

        return $this->view('auth/login', ['model' => $loginForm]);
    }

    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {
            
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Your account has been created successfully');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->view('auth/register', ['model' => $user]);
        }
        $this->setLayout('auth');
        return $this->view('auth/register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        return $response->redirect('/');
    }

    public function profile()
    {
        return $this->view('auth/profile');
    }
}