<?php

namespace Controller;

use Exception;
use Model\RealEstateAdvert;
use Services\Validator\Contact;


require_once '../model/RealEstate.php';
require_once '../services/Validator/Contact.php';
require_once '../vendor/autoload.php';
require_once '../public/dev.php';

class RealEstate

{
    public function listEstates() // recuperer toutes les annonces
    {
        $realEstateAdvert = new RealEstateAdvert;
        $listEstates = $realEstateAdvert->getEstates();

        require('../template_base/allRealEstateAdverts.php');
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
                    echo 'success';
                } else {
                    echo 'error';
                }
                return;
            };
        }

        $realEstateAdvert = new RealEstateAdvert;

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $estate = $realEstateAdvert->getEstate($_GET['id']);
            if (empty($estate)) {
                throw new \Exception('Aucune annonce disponible');
            }
        } else {
            throw new Exception('aucune annonce disponible');
        }

        require('../template_base/realEstateAdvert.php');
    }
}
