<?php

namespace Controller;

use model\RealEstateAdvert;
use model\Admin;
use services\Validator\Connexion;

class HomePage

{
    public function index()
    {

        $realEstateAdvert = new RealEstateAdvert;
        $lastEstates = $realEstateAdvert->getLastestEstates();


        $pageTitle = "Ori Immo Accueil";
        require('../view/HomePage/homepage.php');
    }

    public function adminConnexion()
    {
        $admin = new Admin;
        $errors = 0;
        $msgerror = array();

        if (isset($_POST['adminconnexion'])) {

            $connexionValidate = new Connexion($_POST);
            if ($connexionValidate->validate()) {

                $user = $admin->connexion($_POST['login']);
                $password = $_POST['password'];

                if ($user) {
                    $checkedpassword = password_verify($password, $user['password']);
                    if ($checkedpassword) {


                        $_SESSION['id'] = $user['id'];
                        $_SESSION['login'] = $user['login'];

                        header('Location: index.php?action=indexadmin');
                        exit();
                    } else {
                        $msgerror['password'] = "Mauvais login ou mot de passe";
                        $errors++;
                    }
                }
            }
        }

        $pageTitle = "Page de connexion";
        require('../view/connexionAdmin.php');
    }


    public function deconnexion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
