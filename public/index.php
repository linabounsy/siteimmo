<?php
session_start();

use controller\HomePage;
use controller\AdminBoard;
use controller\RealEstate;
use services\Autoloader;

require_once '../services/Autoloader.php';

Autoloader::register();
$homepage = new HomePage();
$admin = new AdminBoard();
$realEstateAdvert = new RealEstate;


try { // On essaie de faire des choses 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'connexion') {
            $homepage->adminConnexion();
        } else if ($_GET['action'] == 'indexadmin') {
            $admin->indexAdmin();
        } else if ($_GET['action'] == 'indexadminallestates') {
            $admin->indexAdminAllEstates();
        } else if ($_GET['action'] == 'deconnexion') {
            $homepage->deconnexion();
        } else if ($_GET['action'] == 'insertnewclient') {
            $admin->insertNewClient();
        } else if ($_GET['action'] == 'modifyclient') {
            $admin->modifyClient();
        } else if ($_GET['action'] == 'editclient') {
            $admin->modifyClient();
        } else if ($_GET['action'] == 'displayclient') {
            $admin->displayClients();
        } else if ($_GET['action'] == 'deleteclient') {
            $admin->deleteClient();
        } else if ($_GET['action'] == 'newadvert') {
            $admin->addAdvert();
        } else if ($_GET['action'] == 'listestates') {
            $realEstateAdvert->listEstates();
        } else if ($_GET['action'] == 'estate') {
            $realEstateAdvert->estate();
        } else if ($_GET['action'] == 'modifyestate') {
            $admin->modifyEstate();
        } else if ($_GET['action'] == 'deleteestate') {
            $admin->deleteEstate();
        } else if ($_GET['action'] == 'estimation') {
            $realEstateAdvert->estimation();
        } else if ($_GET['action'] == 'agence') {
            $realEstateAdvert->agence();
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        $homepage->index();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
