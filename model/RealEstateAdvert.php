<?php

namespace Model;

require_once('../model/Database.php');

class RealEstateAdvert extends Database

{
 
    public function getCategory() // recupere info si c'est une loc ou une vente
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM category INNER JOIN estate ON category.id = estate.id'); 
        $req->execute(array());
        $category = $req->fetchAll();

        return $category;

    }

    public function getType() // recupere info si maison, appartement, parking, box
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM type ORDER BY id');
        $req->execute(array());
        $type = $req->fetchAll();

        return $type;

    }

    public function getExposure() // recupere info exposition 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM exposure ORDER BY id');
        $req->execute(array());
        $exposure = $req->fetchAll();

        return $exposure;

    }

    public function getParking() // recupere info parking
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM parking ORDER BY id');
        $req->execute(array());
        $parking = $req->fetchAll();

        return $parking;

    }

    public function getClients() // recupere info clients
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM client ORDER BY id');
        $req->execute(array());
        $clients = $req->fetchAll();

        return $clients;

    }

    public function getKitchen() // recupere info cuisine
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM kitchen ORDER BY id');
        $req->execute(array());
        $kitchen = $req->fetchAll();

        return $kitchen;

    }

    public function getHeating() // recupere info chauffage
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM heating ORDER BY id');
        $req->execute(array());
        $heating = $req->fetchAll();

        return $heating;

    }

    public function getEnergyClass() // recupere info classe energie
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM energyclass ORDER BY id');
        $req->execute(array());
        $energyclass = $req->fetchAll();

        return $energyclass;

    }

    public function getGes() // recupere info ges
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM ges ORDER BY id');
        $req->execute(array());
        $ges = $req->fetchAll();

        return $ges;

    }
 
    public function addInfoEstate($category, $type, $exposure, $parking, $kitchen, $heating, $subdivision, $floor, $charge, $bathroom, $toilet, $garage, $basement, $surface, $land, $price, $periode, $title, $description, $picture, $status, $diagenergy, $ges_id, $room, $bedroom, $construction, $client_id, $address, $city, $postcode, $energyclass_id) // ajout loc ou vente / type / exposition / parking / client / cuisine dans l'annonce
    {
        $db = $this->dbConnect();
        $estate = $db->prepare('INSERT INTO estate (category_id, type_id, exposure_id, parking_id, kitchen_id, heating_id, subdivision, floor, charge, bathroom, toilet, garage, basement, surface, land, price, periode, title, description, picture, status, diagenergy, ges_id, room, bedroom, construction, client_id, address, city, postcode, energyclass_id) VALUES (:category_id, :type_id, :exposure_id, :parking_id, :kitchen_id, :heating_id, :subdivision, :floor, :charge, :bathroom, :toilet, :garage, :basement, :surface, :land, :price, :periode, :title, :description, :picture, :status, :diagenergy, :ges_id, :room, :bedroom, :construction, :client_id, :address, :city, :postcode, :energyclass_id)');
        $affectedLines = $estate->execute(array(
            'category_id' => $category,
            $type,
            $exposure, $parking, $kitchen, $heating, $subdivision, $floor, $charge, $bathroom, $toilet, $garage, $basement, $surface, $land, $price, $periode, $title, $description, $picture, $status, $diagenergy, $ges_id, $room, $bedroom, $construction, $client_id, $address, $city, $postcode, $energyclass_id));

            // récupérer l id de l'annonce qui vient d'être (voir pdo::lastInsertId ou essayer un $estate->fetch() après execute)
            // boucler sur $heating foreach ($heating as $heat)
        
            // insert into estate_has_heating avec $estate_id et la valeur de $heat

     
    }

    public function getEstatesAdmin() // recupère les dernières annonces pour l'admin
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, picture, IF(CHAR_LENGTH(description) > 50, CONCAT(LEFT(description,50), "..."), description) AS description_cut FROM estate ORDER BY id DESC');
        $req->execute(array());
        $estate = $req->fetchAll();
        return $estate;
    }

    public function getEstates() // recupère les annonces 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, picture, city, postcode, price, IF(CHAR_LENGTH(description) > 50, CONCAT(LEFT(description,50), "..."), description) AS description_cut FROM estate ORDER BY id DESC');
        $req->execute(array());
        $estates = $req->fetchAll();
        return $estates;
    }


    public function getEstate($estateId) // recupere une annonce grace a son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT estate.id as id, estate.title as title, category.name as category, category.id as category_id, type.name as name, type.id as type_id, kitchen.type as kitchen, kitchen.id as kitchen_id, exposure.name as exposure, exposure.id as exposure_id, heating.type as heating, heating.id as heating_id, energyclass.name as energyclass, energyclass.id as energyclass_id, ges.name as ges, ges.id as ges_id, parking.type as parking, parking.id as parking_id, client.id as client, client.lastname as lastname, client.firstname as firstname, room, description, surface, bedroom, construction, floor, subdivision, charge, bathroom, diagenergy,toilet, garage, basement, land, price, periode, status, estate.address as address, estate.city as city, estate.postcode as postcode, picture
             FROM estate
             INNER JOIN category
             ON estate.category_id = category.id
             INNER JOIN type
             ON estate.type_id = type.id
             INNER JOIN kitchen
             ON estate.kitchen_id = kitchen.id
             INNER JOIN exposure
             ON estate.exposure_id = exposure.id
             INNER JOIN heating
             ON estate.heating_id = heating.id
             INNER JOIN energyclass
             ON estate.energyclass_id = energyclass.id
             INNER JOIN ges
             ON estate.ges_id = ges.id
             INNER JOIN parking
             ON estate.parking_id = parking.id
             INNER JOIN client
             ON estate.client_id = client.id
             WHERE estate.id = :estate_id'
            
        );
        $req->execute(array('estate_id' => $estateId));
        $estate = $req->fetch();
        return $estate;
    }


}