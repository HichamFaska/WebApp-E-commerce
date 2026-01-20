<?php

namespace app\models;

class User extends BaseModelUser
{
    private ?int $id = null;

    private string $firstname;

    private string $lastname;

    private string $email;

    private string $password;

    private string $role = 'user';




    /*Get the value of firstname*/
    public function getFirstname()
    {
        return $this->firstname;
    }

    /*Set the value of firstname*/
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /*Get the value of lastname*/
    public function getLastname()
    {
        return $this->lastname;
    }

    /*Set the value of lastname*/
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /*Get the value of email*/
    public function getEmail()
    {
        return $this->email;
    }

    /*Set the value of email*/
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /*Get the value of password*/
    public function getPassword()
    {
        return $this->password;
    }

    /*Set the value of password*/
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /*Get the value of role*/
    public function getRole()
    {
        return $this->role;
    }

    /*Set the value of role*/
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }



    /*Get the value of id*/
    public function getId()
    {
        return $this->id;
    }

    /*Set the value of id*/
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getFullname() {
        echo $this->getFirstname() . $this->getLastname();
    }

    public function setters($body)
    {
        if (isset($body['firstname'])) {
            $this->setFirstname($body['firstname']);
        }
        if (isset($body['lastname'])) {
            $this->setLastname($body['lastname']);
        }
        $this->setEmail($body['email']);
        $this->setPassword($body['password']);

        if (isset($body['role'])) {
            $this->setRole($body['role']);
        }
    }
}
