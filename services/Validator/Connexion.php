<?php


namespace Services\Validator;

use services\Validator;
use model\Admin;



class Connexion extends Validator
{

    private $login;
    private $password;

    private $errors = 0;
    protected $msgerror = [];


    public function __construct($formConnexion)
    {
        $this->login = $formConnexion['login'];
        $this->password = $formConnexion['password'];
    }

    public function getMsgerror()
    {
        return $this->msgerror;
    }


    public function validateLogin()
    {

        if (!$this->notEmpty($this->login)) {
            $this->errors++;
            $this->msgerror['login'] = "veuillez remplir le login";
        }
    }

    public function validatePassword()
    {

        if (!$this->notEmpty($this->password)) {
            $this->errors++;
            $this->msgerror['password'] = "veuillez remplir le champ mot de passe";
        }
    }

    public function validate()
    {

        $this->validateLogin();
        $this->validatePassword();


        if ($this->errors != 0) {
            $this->msgerror;
            $this->errors++;
        }

        if ($this->errors === 0) {

            return true;
        }
    }
}
