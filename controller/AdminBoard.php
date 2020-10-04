<?php

namespace Controller;

use DateTime;
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
        $realEstateAdvert = new RealEstateAdvert;
        print_r($_POST);
        print_r($_FILES);
        // gestion des erreurs
        $errors = 0;
        $msgerror = array();


        if (isset($_POST['newadvert'])) { // || isset($_POST['newadvertnopublish']) || isset($_POST['newadvertattente'])
            if (empty($_POST['title']) || strlen($_POST['title']) > 45) {
                $msgerror['title'] = 'renseigner le titre - 45 caractères max';
                $errors++;
            }
            if (empty($_POST['description'])) {
                $msgerror['description'] = 'remplir la description';
                $errors++;
            }
            if ($_POST['client'] == 'choisir un client') {
                $msgerror['client'] = 'sélectionner un client';
                $errors++;
            }
            if (empty($_POST['category'])) {
                $msgerror['category'] = 'sélectionner un champ';
                $errors++;
            }

            if (empty($_POST['type'])) {
                $msgerror['type'] = 'sélectionner un champ';
                $errors++;
            }

            if (empty($_POST['address']) || strlen($_POST['address']) > 255) {
                $msgerror['address'] = "renseigner tous les champs - 255 caractères max pour l'adresse - 25 max pour la ville - 5 chiffres max pour le code postal";
                $errors++;
            }
            if (empty($_POST['city']) || strlen($_POST['city']) > 25) {
                $msgerror['city'] = "renseigner tous les champs - 255 caractères max pour l'adresse - 25 max pour la ville - 5 chiffres max pour le code postal";
                $errors++;
            }
            if (empty($_POST['postcode']) || strlen($_POST['postcode']) > 5) {
                $msgerror['postcode'] = "renseigner tous les champs - 255 caractères max pour l'adresse - 25 max pour la ville - 5 chiffres max pour le code postal";
                $errors++;
            }
            if (empty($_POST['construction'])) {
                $msgerror['construction'] = 'renseigner une année';
                $errors++;
            }
            if (empty($_POST['exposure'])) {
                $msgerror['exposure'] = 'sélectionner un champ';
                $errors++;
            }
            if (empty($_POST['price'])) {
                $msgerror['price'] = 'renseigner un prix';
                $errors++;
            }
            if (empty($_POST['charge'])) {
                $msgerror['charge'] = 'renseigner les charges';
                $errors++;
            }
            if (empty($_POST['surface'])) {
                $msgerror['surface'] = 'renseigner la surface';
                $errors++;
            }

            // si copro pas définie, il n'est pas présent donc message d'erreur - sinon si c'est définie et différent de 0 ou 1 - non/oui - message d'erreur sinon rien
            if (!isset($_POST['subdivision'])) {
                $msgerror['subdivision'] = 'sélectionner un champ';
                $errors++;
            } else {
                if (($_POST['subdivision']) !== '1' && ($_POST['subdivision']) !== '0') {
                    $msgerror['subdivision'] = 'sélectionner un champ';
                    $errors++;
                }
            }


            if (isset($_POST['land']) && ($_POST['land']) < '0') {
                $msgerror['land'] = 'renseigner la superficie du terrain';
                $errors++;
            }
            if (empty($_POST['floor'])) {
                $msgerror['floor'] = "indiquer l'étage";
                $errors++;
            }
            if (empty($_POST['room'])) {
                $msgerror['room'] = 'indiquer le nbre de pièces';
                $errors++;
            }
            if (isset($_POST['bedroom']) && ($_POST['bedroom']) < '0') {
                $msgerror['bedroom'] = 'indiquer le nbre de chambres';
                $errors++;
            }
            if (empty($_POST['bathroom'])) {
                $msgerror['bathroom'] = 'indiquer le nbre de salle de bain';
                $errors++;
            }
            if (empty($_POST['toilet'])) {
                $msgerror['toilet'] = 'indiquer le nbre de toilettes';
                $errors++;
            }
            if (empty($_POST['kitchen'])) {
                $msgerror['kitchen'] = 'sélectionner un champ';
                $errors++;
            }

            if (empty($_POST['heating'])) {
                $msgerror['heating'] = 'sélectionner un ou plusieurs champs';
                $errors++;
            }
    

            if (empty($_POST['parking'])) {
                $msgerror['parking'] = 'sélectionner un champ';
                $errors++;
            }

            if (isset($_POST['garage']) && ($_POST['garage']) < '0') {
                $msgerror['garage'] = 'indiquer le nbre de garage';
                $errors++;
            }

            if (!isset($_POST['basement'])) {
                $msgerror['basement'] = 'sélectionner un champ';
                $errors++;
            } else {
                if (($_POST['basement']) !== '1' && ($_POST['basement']) !== '0') {
                    $msgerror['basement'] = 'sélectionner un champ';
                    $errors++;
                }
            }

            if (!isset($_POST['diagenergy'])) {
                $msgerror['diagenergy'] = 'sélectionner un champ';
                $errors++;
            } else {
                if (($_POST['diagenergy']) !== '1' && ($_POST['diagenergy']) !== '0') {
                    $msgerror['diagenergy'] = 'sélectionner un champ';
                    $errors++;
                }
            }

            if (empty($_POST['energyclass'])) {
                $msgerror['energyclass'] = 'sélectionner un champ';
                $errors++;
            }
            if (empty($_POST['ges'])) {
                $msgerror['ges'] = 'sélectionner un champ';
                $errors++;
            }
            if (empty($_POST['periode'])) {
                $msgerror['periode'] = 'sélectionner une date';
                $errors++;
            }
            if (empty($_FILES['picture']['name'])) {
                $msgerror['picture'] = 'sélectionner une photo';
                $errors++;
            }

            if (!isset($_POST['status'])) {
                $msgerror['status'] = 'sélectionner un champ';
                $errors++;
            } else {
                if (($_POST['status']) !== '1' && ($_POST['status']) !== '2' && ($_POST['status']) !== '3') {
                    $msgerror['status'] = 'sélectionner un champ';
                    $errors++;
                }
            }

            if (!is_numeric($_POST['postcode'])) {
                $msgerror['postcode'] = 'le champ code postal ne peut être du texte';
                $errors++;
            }
            if (!is_numeric($_POST['price'])) {
                $msgerror['price'] = 'renseigner un prix en chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['charge'])) {
                $msgerror['charge'] = 'renseigner les charges en chiffre';
                $errors++;
            }

            if (!is_numeric($_POST['surface'])) {
                $msgerror['surface'] = 'renseigner une surface en chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['land'])) {
                $msgerror['land'] = 'renseigner la superficie du terrain en chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['floor'])) {
                $msgerror['floor'] = "l'étage doit être un chiffre";
                $errors++;
            }
            if (!is_numeric($_POST['room'])) {
                $msgerror['room'] = 'le nbre de pièces doit être un chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['bedroom'])) {
                $msgerror['bedroom'] = 'le nbre de chambres doit être un chiffre';
            }
            if (!is_numeric($_POST['bathroom'])) {
                $msgerror['bathroom'] = 'le nbre de salle de bain doit être un chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['toilet'])) {
                $msgerror['toilet'] = 'le nbre de toilettes doit être un chiffre';
                $errors++;
            }
            if (!is_numeric($_POST['garage'])) {
                $msgerror['garage'] = 'le nbre de garages doit être un chiffre';
                $errors++;
            }

            // if isset newadvert
            // $status = 1
            // if isset newadvertattente
            // $status = 2
            // if isset newadvertnopublish
            // $status = 3

            if ($errors === 0) {
    
                $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);
                die();
                header('Location: index.php?action=indexadmin');
                exit();
            }
        }

        // récupère les différentes clés étrangères
        $categories = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $parkings = $realEstateAdvert->getParking();
        $clients = $realEstateAdvert->getClients();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();
        $energyclasses = $realEstateAdvert->getEnergyClass();
        $geses = $realEstateAdvert->getGes();
        print_r($errors);

        /*if ($errors === 0) {
    
                $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);
                header('Location: index.php?action=indexadmin');
                exit();
            }*/

        /* transfo format date annee construction - date de disponibilite
            $dateConstruction = $_POST['construction'];
            $dtConstruction = DateTime::createFromFormat('d/m/Y', $dateConstruction);
            echo $dtConstruction->format('YYYY');*/


        require('../template_base/newestate.php');
    }

    /*public function insertNewAdvert()
    {
        // ajoute l'annonce si tout est complet
        $realEstateAdvert = new RealEstateAdvert;
        if (isset($_POST['title'], $_POST['category'], $_POST['subdivision'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass'], $_POST['ges'])) {


            $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $_POST['periode'], $_POST['title'], $_POST['description'], $_FILES['picture']['name'], $_POST['status'], $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $_POST['construction'], $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass'], $_POST['ges']);
            header('Location: index.php?action=indexadmin');
        } else {

            throw new Exception('veuillez remplir tous les champs');
        }
    }*/

    public function modifyEstate()
    {
        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_GET['id']) && $_GET['id'] > 0) {

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
        } else {
            throw new Exception('aucun identifiant d\'annonce envoyé');
        }
        require('../template_base/editestate.php');
    }
}
