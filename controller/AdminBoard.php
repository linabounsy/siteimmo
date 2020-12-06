<?php

namespace Controller;

use DateTime;
use Exception;
use Model\Admin;
use Model\RealEstateAdvert;

use Services\Validator\Estate;
use Services\Validator\Picture;

require_once '../model/Admin.php';
require_once '../model/RealEstateAdvert.php';
require_once '../services/Validator/Estate.php';

class AdminBoard
{
    public function adminConnexion()
    {
        $admin = new Admin;

        if (isset($_POST['login']) && ($_POST['password'])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if (!empty($login) && !empty($password)) {
                $user = $admin->adminConnexion($login);
                header('Location: index.php?action=indexadmin');
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        require('../template_base/connexionadmin.php');
    }

    public function indexAdmin()
    {
        /*
        if (!Session::isAuth()) {
            header('Location: index.php');
            exit();
        }
        */
        $realEstateAdvert = new RealEstateAdvert;

        $estates = $realEstateAdvert->getEstatesAdmin();

        $estates = $realEstateAdvert->getEstatesAdminIndex();


        require('../template_base/admin.php');
    }



    public function indexAdminEstates()
    {
        /*
        if (!Session::isAuth()) {
            header('Location: index.php');
            exit();
        }
        */
        $realEstateAdvert = new RealEstateAdvert;
        $estates = $realEstateAdvert->getEstatesAdmin();
        $clients = $realEstateAdvert->getClients();
        require('../template_base/adminallrealestate.php');
    }



    public function displayClients() // affiche la liste des clients
    {
        $admin = new Admin;
        $realEstateAdvert = new RealEstateAdvert;
        $allClients = $admin->getClients();


        require('../template_base/client.php');
    }

    public function modifyClient() // recup la fiche client et amene à la page pour modifier
    {

        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin = new Admin;
            $client = $admin->getClient($_GET['id']);
        } else {
            throw new Exception('aucun identifiant de client envoyé');
        }

        require('../template_base/editclient.php');
    }

    public function editClient()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin = new Admin;
            $client = $admin->modifyClient($_GET['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['postcode'], $_POST['city']);
        }
        header('Location: index.php?action=displayclient&client.php');
    }

    public function insertNewClient() // ajouter un client
    {
        $admin = new Admin;
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['postcode'], $_POST['city'])) {
            $admin->addClient($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['postcode'], $_POST['city']);
            header('Location: index.php?action=displayclient&client.php');
        }

        require('../template_base/newclient.php');
    }

    public function deleteClient()
    {
        $admin = new Admin;
        $deleteClient = $admin->deleteClient($_GET['id']);

        $admin->deleteClient($_GET['id']);

        header('Location: index.php?action=displayclient&client.php');
    }


    public function addAdvert() // ajout nouvelle annonce pour l'affichage
    {
        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_POST['newadvertpublish']) || isset($_POST['newadvertnopublish'])) {

            $estateValidate = new Estate($_POST, $_FILES['picture']);

            $status = null;
            if (isset($_POST['newadvertpublish'])) {
                $status  = 1;
            }

            if (isset($_POST['newadvertnopublish'])) {
                $status  = 2;
            }

            if (!empty($_FILES)) {
                $fileTemporyName = $_FILES['picture']['tmp_name']; //nom du fichier temporaire
                $fileName = $_FILES['picture']['name']; // on veut le nom du fichier
                $finalName = uniqid();
                $fileDest = '../public/img/estates/' . $finalName; // dossier final pour l'image
                $fileExtension = strtolower(strrchr($fileName, ".")); // isole le nouveau nom de l'image
                $fileupload = $finalName . $fileExtension;
            }

            if ($estateValidate->validate()) {
                $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);

                move_uploaded_file($fileTemporyName, $fileDest . $fileExtension); // deplacer dossier temporaire vers dossier final

                $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $fileupload, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);

                header('Location: index.php?action=indexadmin');
                exit();
            }
        }


        $categories = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $parkings = $realEstateAdvert->getParking();
        $clients = $realEstateAdvert->getClients();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();
        $energyclasses = $realEstateAdvert->getEnergyClass();
        $geses = $realEstateAdvert->getGes();

        require('../template_base/newestate.php');
    }

    /* if ($estateValidate->validate()) {
                $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);

                move_uploaded_file($fileTemporyName, $fileDest . $fileExtension); // deplacer dossier temporaire vers dossier final

                $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $fileupload, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);

                header('Location: index.php?action=indexadmin');
                exit();
            }*/


    // récupère les différentes clés étrangères




    public function modifyEstate()
    {
        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_POST['modifyadvertpublish']) || isset($_POST['modifyadvertnopublish'])) {
            $estateValidate = new Estate($_POST, $_FILES['picture']['error'] !== 4 ? $_FILES['picture'] : null);

            $status = null;
            if (isset($_POST['modifyadvertpublish'])) {
                $status  = 1;
            }

            if (isset($_POST['modifyadvertnopublish'])) {
                $status  = 2;
            }

            $fileupload = false;
            if (!empty($_FILES) && !empty($_FILES['picture']) && !empty($_FILES['picture']['name'])) {

                $fileTemporyName = $_FILES['picture']['tmp_name']; //nom du fichier temporaire
                $fileName = $_FILES['picture']['name']; // on veut le nom du fichier
                $finalName = uniqid();
                $fileDest = '../public/img/estates/' . $finalName; // dossier final pour l'image
                $fileExtension = strtolower(strrchr($fileName, ".")); // isole le nouveau nom de l'image
                $fileupload = $finalName . $fileExtension;
            }


            if ($estateValidate->validate()) {

                $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);
                if ($fileupload !== false) {

                    move_uploaded_file($fileTemporyName, $fileDest . $fileExtension);
                }

                $realEstateAdvert->editEstate($_GET['id'], $_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $fileupload, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);

                header('Location: index.php?action=indexadmin');
                exit();
            }

            /*   echo '<pre>';
                print_r($estateValidate->getMsgerror());
                die();*/
        }



        $estate = $realEstateAdvert->getEstate($_GET['id']);
        $clients = $realEstateAdvert->getClients();
        $categories = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();
        $energyclasses = $realEstateAdvert->getEnergyClass();
        $geses = $realEstateAdvert->getGes();
        $parkings = $realEstateAdvert->getParking();

        require('../template_base/editestate.php');
    }



    public function deleteEstate()
    {
        $realEstateAdvert = new RealEstateAdvert;
        $realEstateAdvert->deleteEstate($_GET['id']);
        header('Location: index.php?action=indexadmin');
        exit();
    }



}
