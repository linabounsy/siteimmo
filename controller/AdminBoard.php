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

 
       /*function convertDate($dateFrench) 
        {
             $tabDate = explode('-' , $dateFrench);
             $enDate  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
             return $enDate;
        }
        $dateconvertie = convertDate('01-10-2020');
        $dateEn = new DateTime($dateconvertie);
        print_r($dateEn);
        echo $dateEn->format('d/m/Y');
        die();*/


        if (isset($_POST['newadvertpublish']) || isset($_POST['newadvertnopublish'])) {
            
            //$_FILES[error] != 4 ? $_FILES : null;

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
                /*print_r('prems' . $finalName);
                print_r('deuz' . $fileExtension);*/
                
            }
            
            if ($estateValidate->validate()) {
                    $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                    $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);

                    move_uploaded_file($fileTemporyName, $fileDest . $fileExtension); // deplacer dossier temporaire vers dossier final

                    $realEstateAdvert->addInfoEstate($_POST['category'], $_POST['type'], $_POST['exposure'], $_POST['parking'], $_POST['kitchen'], $_POST['heating'], $_POST['subdivision'], $_POST['floor'], $_POST['charge'], $_POST['bathroom'], $_POST['toilet'], $_POST['garage'], $_POST['basement'], $_POST['surface'], $_POST['land'], $_POST['price'], $periode->format('Y-m-d h:i:s'), $_POST['title'], $_POST['description'], $fileupload, $status, $_POST['diagenergy'], $_POST['ges'], $_POST['room'], $_POST['bedroom'], $construction->format('Y-m-d h:i:s'), $_POST['client'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_POST['energyclass']);
/*
                    header('Location: index.php?action=indexadmin');
                    exit();*/
            }
            

          /* echo '<pre>';
            print_r($estateValidate->getMsgerror());
            die();*/


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

            $estateValidate = new Estate($_POST);
            var_dump($_POST);
            var_dump($_FILES);
         
         
            $status = null;
            if (isset($_POST['modifyadvertpublish'])) {
                $status  = 1;
            }

            if (isset($_POST['modifyadvertnopublish'])) {
                $status  = 2;
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

         
           if ($estateValidate->validate()) {
                // tout est OK
            }
            
            echo '<pre>';
            print_r($estateValidate->getMsgerror());
            die();

           
            

            if ($errors === 0) {
                $periode = DateTime::createFromFormat('d-m-Y', $_POST['periode']);
                $construction = DateTime::createFromFormat('d-m-Y', '01-01-' . $_POST['construction']);
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
