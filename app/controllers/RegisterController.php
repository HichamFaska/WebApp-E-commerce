<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;

class RegisterController
{

    public function registerUser()
    {

        $user = new User();
        $request = new Request();
        $body = $request->getBody();
        if ($this->isValidPasswordSignUp($body)) {
            $user->setters($body);
        }
/*          if ($this->isValidname($user)) {
            return false;
        }
        if ($this->isValidEmailSignUp($user)) {
            
            throw new \Exception("Email is not correct");
        }  */
        
        $user->save();
        $this->startSession($user);
    }

    private function isValidname(object $user): bool
    {
        $pattern = "/^(.*?)\s([\wáâàãçéêíóôõúüÁÂÀÃÇÉÊÍÓÔÕÚÜ]+\-?'?\w*\.?)$/u";

        if (!preg_match($pattern, $user->getFirstname())) {
            throw new \Exception("firstname is not correct");
        } else if (!preg_match($pattern, $user->getLastname())) {
            throw new \Exception("lastname is not correct");
        }


        return true;
    }


    private function isValidEmailSignUp(object $user): bool
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $object = $user->find();
        if (is_null($object)) {
            return true;
        } else {
            return false;
        }
    }

    private function isValidPasswordSignUp(array $body): bool
    {
        if ($body['password'] === $body['confirmPassword']) {
            return true;
        }
        throw new \Exception("passwords are not matching");
    }

    private function startSession($user)
    {
        session_start();
        session_regenerate_id(true);
        $_SESSION['email']  = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
        $_SESSION['logged_in'] = true;
    }
}
