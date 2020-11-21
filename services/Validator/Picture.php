<?php

namespace Services\Validator;

use Services\ValidatorPicture;



require '../services/ValidatorPicture.php';



class Picture extends ValidatorPicture
{
    const EXTENSIONALLOWED = array('.jpg', '.jpeg', '.png');

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
        
            
            
        
    }
/*
    public function getMsgerrorPicture()
    {
        return $this->msgerrorPicture;
    }

    public function validateEmptyPicture()
    {

        if (!$this->notEmpty($this->files)) {
            $this->errorsPicture++;
            $this->msgerrorPicture['picture'] = "veuillez sélectionner une photo";
        }
    }




*/
    public function validateExtension()
    {
        if (!$this->extension($this->extension, self::EXTENSIONALLOWED)) {
            $this->errors++;
            $this->msgerror['picture'] = "extension acceptée : .jpg .jpeg et .png";
        }
    }
/*
    public function validateSize()
    {
        $this->size = ($_FILES['picture']['size']);
        $this->maxSize = 700000;
        

        if (!$this->size($this->size, $this->maxSize)) {
            $this->errorsPicture++;
            $this->msgerrorPicture['picture'] = "taille de fichier supérieure à la taille maximum autorisée";
        }
    }

    public function validateType()
    {
        
        $this->type = array('image/jpg', 'image/jpeg', 'image/png');
        
        if (!$this->type($this->fileType, $this->type)) {
            $this->errorsPicture++;
            $this->msgerrorPicture['picture'] = "le contenu ne correspond pas à l'extension du fichier";
        }
    }
*/



    public function validate()
    {
        $this->validateExtension();
        /*
        echo '<pre>';
        print_r($this);
        die();

        $this->validateType();
        $this->validateSize();
        $this->validateExtension();
 */

        if (!$this->errors == 0) {
            return $this->msgerror;
        }
        return true;
     
    }
}

