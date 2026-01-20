<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use Exception;

class AuthController extends Controller{


    public function login(){
        return $this->render('login');
    }

    public function register(Request $request){

        if($request->getMethod()==='post'){
            $register = new RegisterController();
            try {
                $register->registerUser();
                $role = $_SESSION['role'];
                return $this->render("$role-dashboard");
            } catch (Exception $e) {
                $e->getMessage();
            }
            
        }else{
            return $this->render('register');
        }
        
        
    }
}