<?php


namespace Services\Validator;

use Services\ValidatorContact;


require '../services/ValidatorContact.php';


class Contact extends ValidatorContact
{

    private $name;
    private $firstname;
    private $phone;
    private $email;

    private $errors = 0;
    protected $msgerror = [];


    public function __construct($formContact)
    {
        $this->name = $formContact['name'];
        $this->firstname = $formContact['firstname'];
        $this->phone = $formContact['phone'];
        $this->email = ($formContact['email']);
        
    }

    public function getMsgerror()
    {
        return $this->msgerror;
    }


    public function validateName()
    {
        if (!$this->notEmpty($this->name)) {
            $this->errors++;
            $this->msgerror['name'] = "le nom est obligatoire";
        }

        if (!$this->strlenLowerLength($this->name, 45)) {
            $this->errors++;
            $this->msgerror['name'] = "le nom peut contenir 45 caractères maximum";

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
        if (!$this->emailRegex($this->email)) {
            $this->errors++;
            $this->msgerror['email'] = "le format de l'email est invalide";
        }
        if (!$this->notEmpty($this->email)) {
            $this->errors++;
            $this->msgerror['email'] = "l'email est obligatoire";
        }

        
    }

    public function validate()
    {

        $this->validateName();
        $this->validateFirstname();
        $this->validatePhone();
        $this->validateEmail();


        if ($this->errors != 0) {
            $this->msgerror;
            $this->errors++;
        }
        
        if ($this->errors === 0) {
            return true;
        }
    }
}
