<?php

namespace Controller;

use Exception;
use Model\RealEstateAdvert;


require_once('../model/RealEstateAdvert.php');

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
        $realEstateAdvert = new RealEstateAdvert;
        

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            
            $estate = $realEstateAdvert->getEstate($_GET['id']);

            } else {
                throw new Exception('aucun identifiant d\'annonce envoyé');
            }

        require('../template_base/realEstateAdvert.php');
    }
 
}
