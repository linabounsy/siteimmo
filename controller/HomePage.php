<?php

namespace Controller;
use Model\RealEstateAdvert;

require_once '../model/RealEstate.php';
class HomePage

{
    public function index()
    {
        $realEstateAdvert = new RealEstateAdvert;
        $lastEstates = $realEstateAdvert->getLastestEstates();
        require('../view/HomePage/homepage.php');
    }
}
