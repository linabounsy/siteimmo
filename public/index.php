<?php
session_start();

use Controller\HomePage;
use Controller\AdminBoard;

require('../controller/HomePage.php');
require('../controller/AdminBoard.php');

$homepage = new HomePage();
$admin = new AdminBoard();

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
        if ($_GET['action'] == 'newadvert') {
            $admin->addAdvert();
        }
        if ($_GET['action'] == 'insertnewadvert') {
            $admin->insertNewAdvert();
        }
    } else {
        $homepage->index();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
