<?php
namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\ContactForm;

/**
 * Class SiteController
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Controllers;
 */
class SiteController extends Controller
{
    public function home()
    {
        $params =[
            'name' => 'Surfpoint'
        ];
        return $this->view('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        return $this->view('contact', ['contact' => $contact]);
    }
}