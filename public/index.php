<?php
session_start();

use Controller\HomePage;

require('../controller/HomePage.php');

$homepage = new homePage();

try { // On essaie de faire des choses 
    if (isset($_GET['action'])) {
       // conditions
    } else {
        $homepage->homePage();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
