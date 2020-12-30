<?php

namespace Controller;

use DateTime;
use Exception;
use model\Admin;
use model\RealEstateAdvert;

use services\Validator\Estate;
use services\Validator\Client;


class AdminBoard
{


    public function indexAdmin()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $realEstateAdvert = new RealEstateAdvert;
        $estates = $realEstateAdvert->getEstatesAdmin();
        $clients = $realEstateAdvert->getClients();
        $category = $realEstateAdvert->getCategory();
        $type = $realEstateAdvert->getType();

        $pageTitle = "Tableau de bord";
        require('../view/admin.php');
    }

    public function indexAdminAllEstates()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $realEstateAdvert = new RealEstateAdvert;
        $clients = $realEstateAdvert->getClients();
        $category = $realEstateAdvert->getCategory();
        $type = $realEstateAdvert->getType();


        if (isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }  // verifie qu'il y a bien une page et que c'est un nombre


        $nbEstates = $realEstateAdvert->countEstate(); // total des annonces
        $estatePerPage = 10; // on met le nombre d'annonces qu'on veut par page
        $lastPage = ceil($nbEstates / $estatePerPage); //definit le nbre de pages total + arrondi à la valeur supérieure avec ceil

        if ($currentPage < 1) { // si l'utilisateur rentre un nbre inférieur à 1, il sera ramener à la page 1
            $currentPage = 1;
        } else if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
        } // si l'utilisateur rentre un nbre sup au nbre total, renvoie vers la dernière page


        //calcul les articles par page et les affiche
        $offset = ($currentPage - 1) * $estatePerPage;
        $estates = $realEstateAdvert->pagingEstateAdmin($offset, $estatePerPage);

        $pageTitle = "Toutes les annonces";
        require('../view/adminAllEstates.php');
    }




    public function displayClients() // affiche la liste des clients
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $admin = new Admin;
        $realEstateAdvert = new RealEstateAdvert;
        $allClients = $admin->getClients();

        $pageTitle = "Fiches clients";
        require('../view/client.php');
    }

    public function modifyClient() // recup la fiche client et amene à la page pour modifier
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin = new Admin;
            $client = $admin->getClient($_GET['id']);


            if (isset($_POST['modifyclient'])) {


                $clientValidate = new Client($_POST, $_GET['id']);


                if ($clientValidate->validate()) {

                    $admin->editClient($_GET['id'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['postcode'], $_POST['city']);

                    header('Location: index.php?action=displayclient&client.php');
                    exit();
                }


                /*echo '<pre>';
                print_r($clientValidate->getMsgerror());
                print_r($_POST['email']['error']);
                die();*/
            }
            $pageTitle = "Modifier un client";
            require('../view/editClient.php');
        }
    }


    public function insertNewClient() // ajouter un client
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $admin = new Admin;

        if (isset($_POST['newclient'])) {
            $clientValidate = new Client($_POST);

            if ($clientValidate->validate()) {

                $admin->addClient($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['postcode'], $_POST['city']);
                header('Location: index.php?action=displayclient&client.php');
                exit();
            }
        }

        $pageTitle = "Ajouter un client";
        require('../view/newClient.php');
    }

    public function deleteClient()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

        $admin = new Admin;
        $deleteClient = $admin->deleteClient($_GET['id']);

        $admin->deleteClient($_GET['id']);

        $pageTitle = "Supprimer une fiche client";
        header('Location: index.php?action=displayclient&client.php');
    }


    public function addAdvert() // ajout nouvelle annonce pour l'affichage
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

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

        $pageTitle = "Ajouter une annonce";
        require('../view/newEstate.php');
    }




    public function modifyEstate()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }

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

            /* echo '<pre>';
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

        $pageTitle = "Mofidier une annonce";
        require('../view/editEstate.php');
    }



    public function deleteEstate()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: index.php?action=connexion');
            exit();
        }
        $realEstateAdvert = new RealEstateAdvert;
        $realEstateAdvert->deleteEstate($_GET['id']);
        header('Location: index.php?action=indexadmin');
        exit();
    }
}
