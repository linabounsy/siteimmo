<?php


namespace Services\Validator;

use services\ValidatorContact;
use model\Admin;



class Client extends ValidatorContact
{

    private $lastname;
    private $firstname;
    private $phone;
    private $email;
    private $address;
    private $city;
    private $postcode;

    private $errors = 0;
    protected $msgerror = [];


    public function __construct($formClient)
    {
        $this->lastname = $formClient['lastname'];
        $this->firstname = $formClient['firstname'];
        $this->phone = $formClient['phone'];
        $this->email = $formClient['email'];
        $this->address = $formClient['address'];
        $this->city = $formClient['city'];
        $this->postcode = $formClient['postcode'];
    }

    public function getMsgerror()
    {
        return $this->msgerror;
    }


    public function validateLastname()
    {
        if (!$this->notEmpty($this->lastname)) {
            $this->errors++;
            $this->msgerror['lastname'] = "le nom est obligatoire";
        }

        if (!$this->strlenLowerLength($this->lastname, 45)) {
            $this->errors++;
            $this->msgerror['lastname'] = "le nom peut contenir 45 caractères maximum";
        }
    }

    public function validateFirstname()
    {
        if (!$this->notEmpty($this->firstname)) {
            $this->errors++;
            $this->msgerror['firstname'] = "le prénom est obligatoire";
        }

        if (!$this->strlenLowerLength($this->firstname, 45)) {
            $this->errors++;
            $this->msgerror['firstname'] = "le prénom peut contenir 45 caractères maximum";
        }
    }


    public function validatePhone()
    {
        if (!$this->strlenLowerLengthPhone($this->phone, 10)) {
            $this->errors++;
            $this->msgerror['phone'] = "le télephone doit être composé de 10 chiffres";
        }
        if (!$this->numeric($this->phone)) {
            $this->errors++;
            $this->msgerror['phone'] = "le téléphone doit être composé de chiffres";
        }

        if (!$this->notEmpty($this->phone)) {
            $this->errors++;
            $this->msgerror['phone'] = "veuillez renseigner le numéro de téléphone";
        }
    }

    public function validateEmail()
    {
        $admin = new Admin;
        if (!$this->emailRegex($this->email)) {
            $this->errors++;
            $this->msgerror['email'] = "le format de l'email est invalide";
        }
        if (!$this->notEmpty($this->email)) {
            $this->errors++;
            $this->msgerror['email'] = "l'email est obligatoire";
        }

        if ($_GET['action'] == 'editclient') {
            if ($admin->checkEmailBis($this->email, $_GET['id'])) {
                $this->errors++;
                $this->msgerror['email'] = "un autre client utilise déjà cet email";
            }
        } elseif ($admin->checkEmail($this->email)) {
            $this->errors++;
            $this->msgerror['email'] = "cet email existe déjà";
        }
    }


    public function validateAddress()
    {
        if (!$this->notEmpty($this->address)) {
            $this->errors++;
            $this->msgerror['address'] = "l'adresse est obligatoire";
        }

        if (!$this->strlenLowerLength($this->address, 255)) {
            $this->errors++;
            $this->msgerror['address'] = "l'adresse peut contenir 255 caractères maximum";
        }
    }

    public function validateCity()
    {
        if (!$this->notEmpty($this->city)) {
            $this->errors++;
            $this->msgerror['city'] = "la ville est obligatoire";
        }

        if (!$this->strlenLowerLength($this->address, 55)) {
            $this->errors++;
            $this->msgerror['city'] = "la villepeut contenir 55 caractères maximum";
        }
    }

    public function validatePostcode()
    {
        if (!$this->strlenLowerLengthPhone($this->postcode, 5)) {
            $this->errors++;
            $this->msgerror['postcode'] = "le code postal doit être composé de 5 chiffres";
        }
        if (!$this->numeric($this->postcode)) {
            $this->errors++;
            $this->msgerror['postcode'] = "le code postal doit être composé de chiffres";
        }

        if (!$this->notEmpty($this->postcode)) {
            $this->errors++;
            $this->msgerror['postcode'] = "veuillez renseigner le code postal";
        }
    }

    public function validate()
    {

        $this->validateLastname();
        $this->validateFirstname();
        $this->validatePhone();
        $this->validateEmail();
        $this->validateAddress();
        $this->validatePostcode();
        $this->validateCity();




        if ($this->errors === 0) {
            return true;
        }


        $this->msgerror;
        $this->errors++;
        return false;
    }
}
