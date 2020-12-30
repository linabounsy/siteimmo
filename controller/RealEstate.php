<?php

namespace Controller;


use model\RealEstateAdvert;
use services\Validator\Contact;

require_once '../model/RealEstate.php'; // reste car appelle une fonction ->countEstate

class RealEstate

{
    public function listEstates() // recuperer toutes les annonces
    {
        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }  // verifie qu'il y a bien une page et que c'est un nombre


        $nbEstates = $realEstateAdvert->countEstate(); // total des annonces
        $estatePerPage = 5; // on met le nombre d'annonces qu'on veut par page
        $lastPage = ceil($nbEstates / $estatePerPage); //definit le nbre de pages total + arrondi à la valeur supérieure avec ceil

        if ($currentPage < 1) { // si l'utilisateur rentre un nbre inférieur à 1, il sera ramener à la page 1
            $currentPage = 1;
        } else if ($currentPage > $lastPage) {
            $currentPage = $lastPage;
        } // si l'utilisateur rentre un nbre sup au nbre total, renvoie vers la dernière page

        // bouton precedent et suivant
        if ($lastPage != 1) {
            if ($currentPage > 1) {
                $previous = $currentPage - 1;
            } else {
                $previous = $currentPage;
            }

            if ($currentPage < $lastPage) {
                $next = $currentPage + 1;
            } else {
                $next = $lastPage;
            }
        }

        //calcul les articles par page et les affiche
        $offset = ($currentPage - 1) * $estatePerPage;
        $listEstates = $realEstateAdvert->pagingEstate($offset, $estatePerPage);


        /*
        echo '<pre>';
        print_r($listEstates); die();
        */

        $pageTitle = "Nos offres disponibles";
        require('../view/allRealEstateAdverts.php');
    }

    public function estate()
    {
        if ($_POST) {
            $formContactValidate = new Contact($_POST);
            $realEstateAdvert = new RealEstateAdvert;
            $estate = $realEstateAdvert->getEstate($_GET['id']);

            if ($formContactValidate->validate()) {
                $subject = 'nouveau client en attente annonce n°' . $estate['id'];
                $fromEmail = $_POST['email'];
                $fromUser = $_POST['name'];

                $body = 'téléphone : ' . $_POST['phone'] . '<br> email : ' . $_POST['email'];

                // Create the Transport
                $transport = (new \Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
                    ->setUsername(EMAIL_USERNAME)
                    ->setPassword(EMAIL_PASSWORD)
                    ->setEncryption(EMAIL_ENCRYPTION)
                    ->setStreamOptions(array(
                        'ssl' => array(
                            'allow_self_signed' => true,
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    ));
                // Create the Mailer using your created Transport
                $mailer = new \Swift_Mailer($transport);
                // Create a message
                $message = (new \Swift_Message($subject))
                    ->setFrom([$fromEmail => $fromUser])
                    ->setTo([EMAIL_USERNAME])
                    ->setBody($body, 'text/html');
                // Send the message
                $result = $mailer->send($message);

                if ($result) {
                    $message = "<p>Votre message a bien été envoyé. Nous vous contactons rapidement.</p>";
                } else {
                    $message = "<p>Une erreur est survenue, veuillez ré-essayer plus tard.</p>";
                }
            };
        }


        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $realEstateAdvert = new RealEstateAdvert;
            $estate = $realEstateAdvert->getEstate($_GET['id']);

            if (empty($estate['heatings'])) { //verifier une clé et pas seulement l'id de l'estate
                throw new \Exception('Aucune annonce disponible');
            }
        } else {
            throw new \Exception('aucune annonce disponible');
        }

        $pageTitle = $estate['title'];
        require('../view/realEstateAdvert.php');
    }

    public function estimation()
    {
        if ($_POST) {
            $formContactValidate = new Contact($_POST);

            if ($formContactValidate->validate()) {
                $subject = 'demande estimation';
                $fromEmail = $_POST['email'];
                $fromUser = $_POST['name'];

                $body = 'téléphone : ' . $_POST['phone'] . '<br> email : ' . $_POST['email'];

                // Create the Transport
                $transport = (new \Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
                    ->setUsername(EMAIL_USERNAME)
                    ->setPassword(EMAIL_PASSWORD)
                    ->setEncryption(EMAIL_ENCRYPTION);
                // Create the Mailer using your created Transport
                $mailer = new \Swift_Mailer($transport);
                // Create a message
                $message = (new \Swift_Message($subject))
                    ->setFrom([$fromEmail => $fromUser])
                    ->setTo([EMAIL_USERNAME])
                    ->setBody($body, 'text/html');
                // Send the message
                $result = $mailer->send($message);

                if ($result) {
                    $message = "<p>Votre message a bien été envoyé. Nous vous contactons rapidement.</p>";
                } else {
                    $message = "<p>Une erreur est survenue, veuillez ré-essayer plus tard.</p>";
                }
            };
        }
        $pageTitle = "Estimez votre bien";
        require('../view/estimation.php');
    }

    public function agence()
    {

        $pageTitle = "L'Agence";
        require('../view/agence.php');
    }
}
