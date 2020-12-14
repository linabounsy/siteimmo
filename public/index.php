<?php
session_start();

use Controller\HomePage;
use Controller\AdminBoard;
use Controller\RealEstate;

require('../controller/HomePage.php');
require('../controller/AdminBoard.php');
require('../controller/RealEstate.php');

$homepage = new HomePage();
$admin = new AdminBoard();
$realEstateAdvert = new RealEstate;

try { // On essaie de faire des choses 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'connexion') {
            $admin->adminConnexion();
        }
        if ($_GET['action'] == 'indexadmin') {
            $admin->indexAdmin();
        }
        if ($_GET['action'] == 'displayclient') {
            $admin->displayClients();
        }
        if ($_GET['action'] == 'insertnewclient') {
            $admin->insertNewClient();
        }
        if ($_GET['action'] == 'modifyclient') {
            $admin->modifyClient();
        }
        if ($_GET['action'] == 'editclient') {
            $admin->editClient();
        }
        if ($_GET['action'] == 'deleteclient') {
            $admin->deleteClient();
        }
        if ($_GET['action'] == 'newadvert') {
            $admin->addAdvert();
        }

        if ($_GET['action'] == 'listestates') {
            $realEstateAdvert->listEstates();
        }
        if ($_GET['action'] == 'estate') {
            $realEstateAdvert->estate();
        } 
        if ($_GET['action'] == 'modifyestate') {
            $admin->modifyEstate();
        } 

       
        if ($_GET['action'] == 'deleteestate') {
            $admin->deleteEstate();
        }
      
        
      

    } else {
        $homepage->index();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
