<?php

namespace Services\Validator;

use Services\Validator;

use Services\Validator\Picture;


require '../services/Validator.php';

require '../services/Validator/Picture.php';

class Estate extends Validator
{

    private $title;
    private $description;
    private $client;
    private $category;
    private $type;
    private $address;
    private $city;
    private $postcode;
    private $construction;
    private $exposure;
    private $price;
    private $charge;
    private $surface;
    private $subdivision;
    private $land;
    private $floor;
    private $room;
    private $bedroom;
    private $bathroom;
    private $toilet;
    private $kitchen;
    private $heating;
    private $parking;
    private $garage;
    private $basement;
    private $diagenergy;
    private $energyclass;
    private $ges;
    private $periode;
    private $files = [];


    private $errors = 0;
    protected $msgerror = [];


    public function __construct($form, $files = null)
    {
        $this->title = $form['title'];
        $this->description = $form['description'];
        $this->client = $form['client'];
        $this->category = !empty($form['category']);
        $this->type = !empty($form['type']);
        $this->address = $form['address'];
        $this->city = $form['city'];
        $this->postcode = $form['postcode'];
        $this->construction = $form['construction'];
        $this->exposure = !empty($form['exposure']);
        $this->price = $form['price'];
        $this->charge = $form['charge'];
        $this->surface = $form['surface'];
        $this->subdivision = isset($form['subdivision']) ? (bool)$form['subdivision'] : null;
        $this->land = $form['land'];
        $this->floor = $form['floor'];
        $this->room = $form['room'];
        $this->bedroom = $form['bedroom'];
        $this->bathroom = $form['bathroom'];
        $this->toilet = $form['toilet'];
        $this->kitchen = !empty($form['kitchen']);
        $this->heating = !empty($form['heating']);
        $this->parking = !empty($form['parking']);
        $this->garage = $form['garage'];
        $this->basement = isset($form['basement']) ? (bool)$form['basement'] : null;
        $this->diagenergy = isset($form['diagenergy']) ? (bool)$form['diagenergy'] : null;
        $this->energyclass = !empty($form['energyclass']);
        $this->ges = !empty($form['ges']);
        $this->periode = $form['periode'];
        $this->files = $files;
    }

    public function getMsgerror()
    {
        return $this->msgerror;
    }


    public function validateTitle()
    {
        if (!$this->notEmpty($this->title)) {
            $this->errors++;
            $this->msgerror['title'] = "le titre est obligatoire";
        }

        if (!$this->strlenLowerLength($this->title, 100)) {
            $this->errors++;
            $this->msgerror['title'] = "le titre peut contenir 100 caractères maximum";

        }
    }

    public function validateDescription()
    {
        if (!$this->notEmpty($this->description)) {
            $this->errors++;
            $this->msgerror['description'] = "la description est obligatoire";
        }
    }

    public function validateClient()
    {
        if (!$this->notDiffer($this->client, 0)) {
            $this->errors++;
            $this->msgerror['client'] = "veuillez sélectionner un client";
        }
    }

    public function validateCategory()
    {
        if (!$this->notEmpty($this->category)) {
            $this->errors++;
            $this->msgerror['category'] = "veuillez sélectionner un champ";
        }
    }

    public function validateType()
    {
        if (!$this->notEmpty($this->type)) {
            $this->errors++;
            $this->msgerror['type'] = "veuillez sélectionner un champ";
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
        if (!$this->strlenLowerLength($this->city, 25)) {
            $this->errors++;
            $this->msgerror['city'] = "l'adresse peut contenir 25 caractères maximum";
        }
    }

    public function validatePostcode()
    {

        if (!$this->strlenMaxLength($this->postcode, 5)) {
            $this->errors++;
            $this->msgerror['postcode'] = "le code postal doit contenir 5 chiffres minimum";
        }
        if (!$this->numeric($this->postcode)) {
            $this->errors++;
            $this->msgerror['postcode'] = "le code postal doit être composé de chiffres";
        }
        if (!$this->notEmpty($this->postcode)) {
            $this->errors++;
            $this->msgerror['postcode'] = "le code postal est obligatoire";
        }
    }

    public function validateConstruction()
    {
        if (!$this->notEmpty($this->construction)) {
            $this->errors++;
            $this->msgerror['construction'] = "veuillez renseigner une année";
        }
        try {
        } catch (\Exception $e) {
            $this->errors++;
            $this->msgerror['construction'] = "veuillez renseigner une année";
        }
    }

    public function validateExposure()
    {
        if (!$this->notEmpty($this->exposure)) {
            $this->errors++;
            $this->msgerror['exposure'] = "veuillez sélectionner un champ";
        }
    }

    public function validatePrice()
    {
        if (!$this->numeric($this->price)) {
            $this->errors++;
            $this->msgerror['price'] = "le prix doit être composé de chiffres";
        }

        if (!$this->notEmpty($this->price)) {
            $this->errors++;
            $this->msgerror['price'] = "veuillez renseigner le prix";
        }
        if (!$this->minZero($this->price)) {
            $this->errors++;
            $this->msgerror['price'] = "le prix mininmum est 0";
        }
    }

    public function validateCharge()
    {
        if (!$this->numeric($this->charge)) {
            $this->errors++;

            $this->msgerror['charge'] = "veuillez renseigner le montant des charges - il doit être composé de chiffres";

        }

        if (!$this->minZero($this->charge)) {
            $this->errors++;
            $this->msgerror['charge'] = "le montant minimum est 0";
        }
    }

    public function validateSurface()
    {
        if (!$this->numeric($this->surface)) {
            $this->errors++;
            $this->msgerror['surface'] = "la surface doit être composé de chiffres";
        }

        if (!$this->notEmpty($this->surface)) {
            $this->errors++;
            $this->msgerror['surface'] = "veuillez renseigner la surface";
        }
        if (!$this->minZero($this->surface)) {
            $this->errors++;
            $this->msgerror['surface'] = "la surface minimum est 0";
        }
    }

    public function validateSubdivision()
    {

        if (!$this->boolean($this->subdivision)) {
            $this->errors++;
            $this->msgerror['subdivision'] = "veuillez sélectionner un champ";
        }
    }

    public function validateLand()
    {
        if (!$this->numeric($this->land)) {
            $this->errors++;
            $this->msgerror['land'] = "veuillez renseigner la surface du terrain - il doit être composé de chiffres";
        }

        if (!$this->minZero($this->land)) {
            $this->errors++;
            $this->msgerror['land'] = "la surface minimum est 0";
        }
    }

    public function validateFloor()
    {
        if (!$this->numeric($this->floor)) {
            $this->errors++;

            $this->msgerror['floor'] = "veuillez renseigner le numéro ou le nombre d'étages - il doit être composé de chiffres";

        }

        if (!$this->minZero($this->floor)) {
            $this->errors++;
            $this->msgerror['floor'] = "veuillez remplir le champ étage (à partir de 0)";
        }
    }

    public function validateRoom()
    {
        if (!$this->numeric($this->room)) {
            $this->errors++;

            $this->msgerror['room'] = "veuillez renseignez le nombre de pièces - il doit être composé de chiffres";

        }


        if (!$this->minZero($this->room)) {
            $this->errors++;
            $this->msgerror['room'] = "le nombre de pièces minimum est 0";
        }
    }

    public function validateBedroom()
    {
        if (!$this->numeric($this->bedroom)) {
            $this->errors++;
            $this->msgerror['bedroom'] = "veuillez renseigner le nombre de chambres (à partir de 0)";
        }


        if (!$this->minZero($this->bedroom)) {
            $this->errors++;
            $this->msgerror['bedroom'] = "le nombre de chambres minimum est 0";
        }
    }

    public function validateBathroom()
    {
        if (!$this->numeric($this->bathroom)) {
            $this->errors++;

            $this->msgerror['bathroom'] = "veuillez renseigner le nombre de salle de bain - il doit être composé de chiffres";

        }


        if (!$this->minZero($this->bathroom)) {
            $this->errors++;
            $this->msgerror['bathroom'] = "le nombre minimum est 0";
        }
    }

    public function validateToilet()
    {
        if (!$this->numeric($this->toilet)) {
            $this->errors++;

            $this->msgerror['toilet'] = "veuillez renseigner le nombre de toilettes - il doit être composé de chiffres";

        }


        if (!$this->minZero($this->toilet)) {
            $this->errors++;
            $this->msgerror['toilet'] = "le nombre minimum est 0";
        }
    }

    public function validateKitchen()
    {
        if (!$this->notEmpty($this->kitchen)) {
            $this->errors++;
            $this->msgerror['kitchen'] = "veuillez sélectionner un champ";
        }
    }

    public function validateHeating()
    {
        if (!$this->notEmpty($this->heating)) {
            $this->errors++;
            $this->msgerror['heating'] = "veuillez sélectionner un champ ou plusieurs champs";
        }
    }

    public function validateParking()
    {
        if (!$this->notEmpty($this->parking)) {
            $this->errors++;
            $this->msgerror['parking'] = "veuillez sélectionner un champ";
        }
    }

    public function validateGarage()
    {
        if (!$this->numeric($this->garage)) {
            $this->errors++;
            $this->msgerror['garage'] = "veuillez renseigner le nbre de garages - il doit être composé de chiffres";
        }

        if (!$this->minZero($this->garage)) {
            $this->errors++;
            $this->msgerror['garage'] = "le nombre minimum est 0";
        }
    }

    public function validateBasement()
    {

        if (!$this->boolean($this->basement)) {
            $this->errors++;
            $this->msgerror['basement'] = "veuillez sélectionner un champ";
        }
    }

    public function validateDiagenergy()
    {

        if (!$this->boolean($this->diagenergy)) {
            $this->errors++;
            $this->msgerror['diagenergy'] = "veuillez sélectionner un champ";
        }
    }

    public function validateEnergyclass()
    {
        if (!$this->notEmpty($this->energyclass)) {
            $this->errors++;
            $this->msgerror['energyclass'] = "veuillez sélectionner un champ";
        }
    }

    public function validateGes()
    {
        if (!$this->notEmpty($this->ges)) {
            $this->errors++;
            $this->msgerror['ges'] = "veuillez sélectionner un champ";
        }
    }

    public function validatePeriode()
    {
        if (!$this->notEmpty($this->periode)) {
            $this->errors++;
            $this->msgerror['periode'] = "veuillez renseigner une date";
        }
        try {
            //print_r(new \DateTime($this->periode . '-01-01'));
        } catch (\Exception $e) {
            $this->errors++;
            $this->msgerror['periode'] = "veuillez renseigner une date";
        }
    }


    public function validate()
    {

        $this->validateTitle();
        $this->validateDescription();
        $this->validateClient();
        $this->validateCategory();
        $this->validateType();
        $this->validateAddress();
        $this->validateCity();
        $this->validatePostcode();
        $this->validateConstruction();
        $this->validateExposure();
        $this->validatePrice();
        $this->validateCharge();
        $this->validateSurface();
        $this->validateSubdivision();
        $this->validateLand();
        $this->validateFloor();
        $this->validateRoom();
        $this->validateBedroom();
        $this->validateBathroom();
        $this->validateToilet();
        $this->validateKitchen();
        $this->validateHeating();
        $this->validateParking();
        $this->validateGarage();
        $this->validateBasement();
        $this->validateDiagenergy();
        $this->validateEnergyclass();
        $this->validateGes();
        $this->validatePeriode();

        if ($this->files != null) {


            if ($this->errors != 0) {
                $this->msgerror = array_merge($this->msgerror, array('picture' => 'veuillez re-sélectionner une photo'));
                $this->errors++;
            }
            if ($this->files['error'] == 4) {
                $this->msgerror = array_merge($this->msgerror, array('picture' => 'veuillez sélectionner une photo'));
                $this->errors++;
            }
            if ($this->files['error'] == 0) {
                $picture = new Picture($this->files);
                $msgErrorPicture = $picture->validate();

                if ($msgErrorPicture !== true) {
                    $this->msgerror = array_merge($this->msgerror, $msgErrorPicture);
                    $this->errors++;
                }
            }
        }


        if ($this->errors === 0) {
            return true;
        }
    }
}
