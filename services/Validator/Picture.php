<?php

namespace Services\Validator;

use services\ValidatorPicture;


class Picture extends ValidatorPicture
{
    const EXTENSIONALLOWED = array('.jpg', '.jpeg', '.png');
    const TYPEMIME = array('image/jpg', 'image/jpeg', 'image/png');
    const MAXSIZE = 700000;

    private $type;
    private $extension;
    private $size;

    private $errors = 0;
    protected $msgerror = [];



    public function __construct($files)
    {

        $this->type = $files['type'];

        $this->extension = strtolower(strrchr($files['name'], "."));

        $this->size = $files['size'];
        $this->files = $files;
    }

    public function validateExtension()
    {
        if (!$this->extension($this->extension, self::EXTENSIONALLOWED)) {
            $this->errors++;
            $this->msgerror['picture'] = "extension acceptée : .jpg .jpeg et .png";
        }
    }

    public function validateMaxSize()
    {

        if (!$this->lessThan($this->size, self::MAXSIZE)) {
            $this->errors++;
            $this->msgerror['picture'] = "taille de fichier supérieure à la taille maximum autorisée";
        }
    }

    public function validateType()
    {

        if (!$this->extension($this->type, self::TYPEMIME)) {
            $this->errors++;
            $this->msgerror['picture'] = "le contenu ne correspond pas à l'extension du fichier";
        }
    }


    public function validate()
    {

        $this->validateMaxSize();
        $this->validateExtension();
        $this->validateType();

        if (!$this->errors == 0) {
            return $this->msgerror;
        }
        return true;
    }
}
