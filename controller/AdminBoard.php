<?php

namespace Controller;

use DateTime;
use Exception;
use Model\Admin;
use Model\RealEstateAdvert;
use Services\Validator;
use Services\Validator\Estate;

require_once('../model/Admin.php');
require_once('../model/RealEstateAdvert.php');
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

        // $validation =  new Validator($_POST, $_FILES, 'addadvert');
        // $validation = array();
        // $validation = true;
        // gestion des erreurs
        $errors = 0;
        $msgerror = array();


        if (isset($_POST['newadvertpublish']) || isset($_POST['newadvertnopublish'])) {

            $estateValidate = new Estate($_POST);

            if ($estateValidate->validate()) {
                // l'anonce est bonne le titre est ok
            }
            
            /*
            echo '<pre>';
            print_r($estateValidate->getMsgerror());
            die();
*/
/*
            if (empty($_POST['title']) || strlen($_POST['title']) > 45) {
                $msgerror['title'] = 'renseigner le titre - 45 caractères max';
                $errors++;
            }¨
            */
            if (empty($_POST['description'])) {
                $msgerror['description'] = 'remplir la description';
                $errors++;
            }
            if ($_POST['client'] == 0) {
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
            //$construction = null;
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

            $status = null;
            if (isset($_POST['newadvertpublish'])) {
                $status  = 1;
            }

            if (isset($_POST['newadvertnopublish'])) {
                $status  = 2;
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

            // si error != 0 et files not empty alors remettre photo puis supprimer le gros if
            if ($errors != 0 && (!empty($_FILES['picture']['name']))) {
                $msgerror['newpicture'] = 'veuillez re-sélectionner une photo';
                $errors++;
            }

            // traitement $_FILES

            if (!empty($_FILES)) {
                $fileTemporyName = $_FILES['picture']['tmp_name']; //nom du fichier temporaire
                $fileName = $_FILES['picture']['name']; // on veut le nom du fichier
                $finalName = uniqid();
                $fileDest = '../public/img/estates/' . $finalName; // dossier final pour l'image
                $fileExtension = strtolower(strrchr($fileName, ".")); // isole le nouveau nom de l'image de l'extension + ajouter lowerCase
                $extensionAllowed = array('.jpg', '.jpeg', '.png'); // extension autorisée
                $fileType = $_FILES['picture']['type'];
                $type = array('image/jpg', 'image/jpeg', 'image/png');
                $maxSize = 7000000;
                $size = ($_FILES['picture']['size']);

                // si extention de fichier non correct -> error++ et msg
                if (!in_array($fileExtension,  $extensionAllowed)) {
                    $msgerror['picture'] = 'extension acceptée : .jpg .jpeg et .png';
                    $errors++;
                }

                // si poids de l'image est supérieur à 7mo alors error++ et msg
                if ($size > $maxSize) {
                    $msgerror['size'] = 'taille de fichier supérieur à la taille amxi autorisée';
                    $errors++;
                }

                // si le type mime pas correct alors error++ et msg (vérifier le fichier de l'image)
                if (!in_array($fileType,  $type)) {
                    $msgerror['picture'] = "le contenu ne correspond pas à l'extension du fichier";
                    $errors++;
                }

                if (empty($_FILES['picture']['name'])) {
                    $msgerror['picture'] = 'sélectionner une photo';
                    $errors++;
                }
              
            }


            if (in_array($fileExtension, $extensionAllowed) && $size < $maxSize && $size !== 0) { //separer l'extension et le format + max taille

                if ($errors === 0) {
                    $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                    $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);

                    move_uploaded_file($fileTemporyName, $fileDest . $fileExtension); // deplacer dossier temporaire vers dossier final

                    $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $finalName . $fileExtension, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);

                    header('Location: index.php?action=indexadmin');
                    exit();
                }
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

        require('../template_base/newestate.php');
    }
    


    /*public function deleteImg($estateId) 
    {
        $realEstateAdvert = new RealEstateAdvert;
        $estate = $realEstateAdvert->getEstate($_GET['id']);
        if (!unlink("../public/img/uploaded/" . $estate["picture"])) {
            echo 'error';
        } else {
            $realEstateAdvert->deleteImg($_GET['id']);
            header('Location: index.php?action=modifypost&id=' . $estateId);
        }
    }*/
    public function modifyEstate()
    {

       
        $realEstateAdvert = new RealEstateAdvert;

        // $validation =  new Validator($_POST, $_FILES, 'addadvert');
        // $validation = array();
        // $validation = true;
        // gestion des erreurs
        $errors = 0;
        $msgerror = array();
   


        if (isset($_POST['modifyadvertpublish']) || isset($_POST['modifyadvertnopublish'])) {
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
            $construction = null;
            if (empty($_POST['construction'])) {
                $msgerror['construction'] = 'renseigner une année';
                $errors++;
            } else {
                $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);
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
            $periode = null;
            if (empty($_POST['periode'])) {
                $msgerror['periode'] = 'sélectionner une date';
                $errors++;
            } else {
                $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
            }

            $status = null;
            if (isset($_POST['modifyadvertpublish'])) {
                $status  = 1;
            }

            if (isset($_POST['modifyadvertnopublish'])) {
                $status  = 2;
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

            // si error != 0 et files not empty alors remettre photo puis supprimer le gros if
            if ($errors != 0 && (!empty($_FILES['changepicture']['name']))) {
                $msgerror['newpicture'] = 'veuillez re-sélectionner une photo';
                $errors++;
            }

            // traitement $_FILES

            $currentImg = false; 
            if (!empty($_FILES) && !empty($_FILES['changepicture']) && !empty($_FILES['changepicture']['name'])) {
                
                $currentImgTemp = $_FILES['changepicture']['tmp_name'];
                $currentImg = $_FILES['changepicture']['name'];
                $newName = uniqid();
                $currentFile = '../public/img/estates/' . $newName;// dossier final pour l'image
                $fileExtension = strtolower(strrchr($currentImg, ".")); // isole le nouveau nom de l'image de l'extension + ajouter lowerCase
                $extensionAllowed = array('.jpg', '.jpeg', '.png'); // extension autorisée
                $fileType = $_FILES['changepicture']['type'];
                $type = array('image/jpg', 'image/jpeg', 'image/png');
                $maxSize = 7000000;
                $size = ($_FILES['changepicture']['size']);
                $currentImg = $newName . $fileExtension;
                // si extention de fichier non correct -> error++ et msg
                if (!in_array($fileExtension,  $extensionAllowed)) {
                    $msgerror['picture'] = 'extension acceptée : .jpg .jpeg et .png';
                    $errors++;
                }

                // si poids de l'image est supérieur à 7mo alors error++ et msg
                if ($size > $maxSize) {
                    $msgerror['size'] = 'taille de fichier supérieur à la taille amxi autorisée';
                    $errors++;
                }

                // si le type mime pas correct alors error++ et msg (vérifier le fichier de l'image)
                if (!in_array($fileType, $type)) {
                    $msgerror['changepicture'] = 'extension acceptée : .jpg .jpeg et .png';
                    $errors++;
                }

                if (empty($_FILES['changepicture']['name'])) {
                    $msgerror['picture'] = 'sélectionner une photo';
                    $errors++;
                }
            } 
            
            if ($errors === 0) {

                if ($currentImg !== false) {
                    move_uploaded_file($currentImgTemp, $currentFile . $fileExtension);
                    
                } 
                $realEstateAdvert->editEstate($_GET['id'], $_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $currentImg, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);

                
                header('Location: index.php?action=indexadmin');
                exit();
                
            }
    
        }
        $estate = $realEstateAdvert->getEstate($_GET['id']);
        $clients = $realEstateAdvert->getClients();
        $categories = $realEstateAdvert->getCategory();
        $types = $realEstateAdvert->getType();
        $exposures = $realEstateAdvert->getExposure();
        $kitchens = $realEstateAdvert->getKitchen();
        $heatings = $realEstateAdvert->getHeating();
/*
        echo '<pre>';
        print_r($realEstateAdvert->getEstate($_GET['id'])['heatings']);
        print_r($_POST['heating']);
        print_r($heatings);
        */
        $energyclasses = $realEstateAdvert->getEnergyClass();
        $geses = $realEstateAdvert->getGes();
        $parkings = $realEstateAdvert->getParking();

        require('../template_base/editestate.php');
        
    }
    
}
