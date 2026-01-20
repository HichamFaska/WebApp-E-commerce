<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class siteController extends Controller
{

    public function home()
    {

        $params = [
            'name' => "Aymane"
        ];

        return $this->render('home', $params);
    }


    public function contactView()
    {
        return $this->render('/contact');
    }


    public function handleContact(Request $request)
    {

        $body = $request->getBody();

    }
}
