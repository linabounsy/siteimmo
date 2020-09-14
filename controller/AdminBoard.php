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
     
     
        $realEstateAdvert = new RealEstateAdvert;
        $estates = $realEstateAdvert->getEstatesAdmin();

        require('../template_base/admin.php');
    }

    public function displayClients() // affiche la liste des clients
    {
        $admin = new Admin;
        $allClients = $admin->getClients();
        require('../template_base/client.php');
    }

    public function modifyClient() // recup la fiche client et amene à la page pour modifier
    {
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
        header('Location: index.php?action=displayclient&client.php');
    }


    public function addAdvert() // ajout nouvelle annonce pour l'affichage
    {
        $errors = 0;
        $msgerror = array();
        if (isset($_POST['newadvert'])) {
            if (empty($_POST['type']) || empty($_POST['category'])) {
                $msgerror['type'] = 'le champ est vide';
                $msgerror['category'] = 'sélectionner un champ';
                $errors++;
            }
            
            if ($errors === 0) {
                // requête sql
            } else {
                
            }
/*
            var_dump($_POST);
            die();*/
        }

        // récupère les categories
        $realEstateAdvert = new RealEstateAdvert;
        $categories = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $parkings = $realEstateAdvert->getParking();
        $clients = $realEstateAdvert->getClients();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();
        $energyclasses = $realEstateAdvert->getEnergyClass();
        $geses = $realEstateAdvert->getGes();
 

        require('../template_base/newadvert.php');
    }


    public function insertNewAdvert()
    {       
        
        $realEstateAdvert = new RealEstateAdvert;
        if (isset($_POST['title'], $_POST['category'], $_POST['subdivision'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'])) { 
           
            
                $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode']);

                header('Location: index.php?action=indexadmin');

        } else {
            throw new Exception('veuillez remplir tous les champs');
        }
    }



}