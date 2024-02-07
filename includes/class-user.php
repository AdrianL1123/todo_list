<?php

/* 
    class encapsulation
    - public
    - protected
    - private
*/

class User
{
    private $name;
    public $email;
    public $role;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name . "'s email is " . $this->getEmail();
    }

    private function getEmail() {
        return $this->email;
    }

    public function isAdmin() {

    }

    public function isEditor() {

    }

    public function isUser() {

    }

}