<?php

namespace Controller;

use Exception;
use Model\Admin;
use Model\RealEstateAdvert;

require_once('../model/Admin.php');
require_once('../model/RealEstateAdvert.php');

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

        require('../template_base/admin.php');
    }

    public function displayClients() // affiche la liste des clients
    {
        $admin = new Admin;
        $allClients = $admin->getClients();
        require('../template_base/client.php');
    }

    public function insertNewClient() // ajouter un client
    {

        require('../template_base/newclient.php');
    }

    public function addAdvert() // ajout nouvelle annonce pour l'affichage
    {
        // récupère les categories
        $realEstateAdvert = new RealEstateAdvert;
        $category = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $parkings = $realEstateAdvert->getParking();
        $clients = $realEstateAdvert->getClients();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();


        require('../template_base/newadvert.php');
    }


    public function insertNewAdvert()
    {
        var_dump($_POST['subdivision']);
        var_dump($_POST['floor']);
        var_dump($_POST['charge']);
        var_dump($_POST['basement']);
        $realEstateAdvert = new RealEstateAdvert;
        if (isset($_POST['category'], $_POST['subdivision'])) { //category car nom du name dans le form

                
                $realEstateAdvert->addCategoryTypeExposureParkingClientsKitchenHeating($_POST['category'], $_POST['type'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction']);
                header('Location: index.php?action=indexadmin');

               
            
        } else {
            throw new Exception('cocher location ou vente');
        }
    }

}