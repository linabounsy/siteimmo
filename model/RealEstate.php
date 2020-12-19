<?php

namespace Model;

require_once('../model/Database.php');

class RealEstateAdvert extends Database

{


    public function getCategory() // recupere info si c'est une loc ou une vente
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM category');
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

    public function getHeatingId() // recupere info chauffage
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM estate_has_heating ORDER BY heating_id');
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


        $estate = $db->prepare('
            INSERT INTO estate (category_id, type_id, exposure_id, parking_id, kitchen_id, subdivision, floor, charge, bathroom, toilet, garage, basement, surface, land, price, periode, title, description, picture, status, diagenergy, ges_id, room, bedroom, construction, client_id, address, city, postcode, energyclass_id)
            VALUES (:category_id, :type_id, :exposure_id, :parking_id, :kitchen_id, :subdivision, :floor, :charge, :bathroom, :toilet, :garage, :basement, :surface, :land, :price, :periode, :title, :description, :picture, :status, :diagenergy, :ges_id, :room, :bedroom, :construction, :client_id, :address, :city, :postcode, :energyclass_id)');
        $affectedLines = $estate->execute(array(

            'category_id' => $category, 'type_id' => $type, 'exposure_id' => $exposure, 'parking_id' => $parking, 'kitchen_id' => $kitchen, 'subdivision' => $subdivision, 'floor' => $floor, 'charge' => $charge, 'bathroom' => $bathroom, 'toilet' => $toilet, 'garage' => $garage, 'basement' => $basement, 'surface' => $surface, 'land' => $land, 'price' => $price, 'periode' => $periode, 'title' => $title, 'description' => $description, 'picture' => $picture, 'status' => $status, 'diagenergy' => $diagenergy, 'ges_id' => $ges_id, 'room' => $room, 'bedroom' => $bedroom, 'construction' => $construction, 'client_id' => $client_id, 'address' => $address, 'city' => $city, 'postcode' => $postcode, 'energyclass_id' => $energyclass_id));



        $req = $db->query('SELECT LAST_INSERT_ID() as estate_id FROM estate'); // recupere l'id de la derniere annonce 
        $estate = $req->fetch();

        $estateHeating = $db->prepare('INSERT INTO estate_has_heating (estate_id, heating_id) VALUES (:estate_id, :heating_id)'); // inserer les plusieurs types de chauffage possible 

        
        foreach ($heating as $heat) {
            $estateHeating->execute((array('estate_id' => $estate['estate_id'], 'heating_id' => $heat))); 
            
        }
        
    }


    public function getEstatesAdmin() // recupère les  annonces pour l'admin
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT estate.id as id, estate.title as title, category.name as category, category.id as category_id, type.name as name, type.id as type_id, client.id as client, client.lastname as lastname, client.firstname as firstname, price, picture 
        FROM estate 
        INNER JOIN category
             ON estate.category_id = category.id
             INNER JOIN type
             ON estate.type_id = type.id
             INNER JOIN client
             ON estate.client_id = client.id
           ORDER BY id DESC LIMIT 0, 5');

        $req->execute(array());
        $estate = $req->fetchAll();
        return $estate;
    }

    public function getEstatesAdminAllEstates() // recupère les  annonces pour l'admin
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT estate.id as id, estate.title as title, category.name as category, category.id as category_id, type.name as name, type.id as type_id, client.id as client, client.lastname as lastname, client.firstname as firstname, price, picture 
        FROM estate 
        INNER JOIN category
             ON estate.category_id = category.id
             INNER JOIN type
             ON estate.type_id = type.id
             INNER JOIN client
             ON estate.client_id = client.id
           ORDER BY id DESC');

        $req->execute(array());
        $estate = $req->fetchAll();
        return $estate;
    }

    public function getEstates() // recupère les annonces 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, picture, city, postcode, price, description FROM estate ORDER BY id DESC');
        $req->execute(array());
        $estates = $req->fetchAll();
        return $estates;
    }

    public function getLastestEstates() // recupère les 3 dernieres annonces pour homepage
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, picture, city, postcode, price, description FROM estate ORDER BY id DESC LIMIT 0, 3');
        $req->execute(array());
        $estates = $req->fetchAll();
        return $estates;
    }

    public function getEstate($estateId) // recupere une annonce grace a son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT estate.id as id, estate.title as title, category.name as category, category.id as category_id, type.name as name, type.id as type_id, kitchen.type as kitchen, kitchen.id as kitchen_id, exposure.name as exposure, exposure.id as exposure_id, energyclass.name as energyclass, energyclass.id as energyclass_id, ges.name as ges, ges.id as ges_id, parking.type as parking, parking.id as parking_id, client.id as client, client.lastname as lastname, client.firstname as firstname, room, description, surface, bedroom, construction, floor, subdivision, charge, bathroom, diagenergy,toilet, garage, basement, land, price, periode, status, estate.address as address, estate.city as city, estate.postcode as postcode, picture
             FROM estate
             INNER JOIN category
             ON estate.category_id = category.id
             INNER JOIN type
             ON estate.type_id = type.id
             INNER JOIN kitchen
             ON estate.kitchen_id = kitchen.id
             INNER JOIN exposure
             ON estate.exposure_id = exposure.id
             /*INNER JOIN heating
             ON estate.heating_id = heating.id*/
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
        

        $heating = $db->prepare (
            'SELECT estate.heating_id, heating.type 
            FROM estate_has_heating as estate
            INNER JOIN heating
            ON heating.id = estate.heating_id
            WHERE estate_id = :estate_id'
        ); // on recup le heating_id de la table estate_as_heating et le type de table heating - où l'id de la table heating = heatig_id de la table estate_has_heating - where estate_id de la table estate_has_heating = $estateId
        $heating->execute(array('estate_id' => $estateId)); 
        $heatingId = $heating->fetchAll(); // array à chaque entrée il y a l'id et le type
        $estate['heatings'] = array(); // on crée la clé heatings avec un array vide
        foreach ($heatingId as $heating) {
            $estate['heatings'][$heating['heating_id']] = $heating['type']; // on crée une nouvelle clé $heating['heating_id'] (array[avec la donnée qu'on récupère]) qu'on met dans le tableau vide $estate['heatings']
        }

        return $estate;

        
    }
    public function deleteImg($estateId) 
    {
        $db = $this->dbConnect();
        $editEstate = $db->prepare ('UPDATE estate SET picture = NULL WHERE id = :estateId');
        $editEstate->execute(array('estateId' => $estateId));
    }


    public function editEstate($estateId, $category, $type, $exposure, $parking, $kitchen, $heating, $subdivision, $floor, $charge, $bathroom, $toilet, $garage, $basement, $surface, $land, $price, $periode, $title, $description, $picture, $status, $diagenergy, $ges_id, $room, $bedroom, $construction, $client_id, $address, $city, $postcode, $energyclass_id)

    {
        $db = $this->dbConnect();

        $sql = 'UPDATE estate SET category_id = :category_id, type_id = :type_id, exposure_id = :exposure_id, parking_id = :parking_id, kitchen_id = :kitchen_id, subdivision = :subdivision, floor = :floor, charge = :charge, bathroom = :bathroom, toilet = :toilet, garage = :garage, basement = :basement, surface = :surface, land = :land, price = :price, periode = :periode, title = :title, description = :description, status = :status, diagenergy = :diagenergy, ges_id = :ges_id, room = :room, bedroom = :bedroom, construction = :construction, client_id = :client_id, address = :address, city = :city, postcode = :postcode, energyclass_id = :energyclass_id';




        $data = array('estateId' => $estateId, 'category_id' => $category, 'type_id' => $type, 'exposure_id' => $exposure, 'parking_id' => $parking, 'kitchen_id' => $kitchen, 'subdivision' => $subdivision, 'floor' => $floor, 'charge' => $charge, 'bathroom' => $bathroom, 'toilet' => $toilet, 'garage' => $garage, 'basement' => $basement, 'surface' => $surface, 'land' => $land, 'price' => $price, 'periode' => $periode, 'title' => $title, 'description' => $description, 'status' => $status, 'diagenergy' => $diagenergy, 'ges_id' => $ges_id, 'room' => $room, 'bedroom' => $bedroom, 'construction' => $construction, 'client_id' => $client_id, 'address' => $address, 'city' => $city, 'postcode' => $postcode, 'energyclass_id' => $energyclass_id);

        if ($picture !== false) {
            $sql .= ', picture = :picture';
            $data['picture'] = $picture;
        }

        $sql .= ' WHERE id = :estateId';

        $editEstate = $db->prepare($sql);
        $editEstate->execute($data);

        $req = $db->query('SELECT LAST_INSERT_ID() as estate_id FROM estate'); // recupere l'id de la derniere annonce 
        $req = $req->fetch();

        $estateHeatingDelete= $db->prepare('DELETE FROM estate_has_heating WHERE estate_id = :estate_id');
        $estateHeatingDelete->execute(array('estate_id' => $estateId));
       
        $estateHeatingUpdate = $db->prepare('INSERT INTO estate_has_heating (estate_id, heating_id) VALUES (:estate_id, :heating_id)');
               
        foreach ($heating as $heat) {
            $estateHeatingUpdate->execute((array('estate_id' => $estateId, 'heating_id' => $heat))); 
            
        }
     

    }


    public function deleteEstate($estateId)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM estate WHERE id = :id');
        $delete->execute(array('id' => $estateId));
    }

    public function countEstate()
    {
        $db = $this->dbConnect();
        $allEstatesReq = $db->query('SELECT COUNT(*) FROM estate')->fetch()[0];
        return $allEstatesReq;
    }

    public function pagingEstate($offset, $estatePerPage)
    {
        $db = $this->dbConnect();
        $listEstates = $db->prepare("SELECT id, picture, title, description, city, price, postcode FROM estate ORDER BY id DESC LIMIT :offset, :estatePerPage");
        $listEstates->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $listEstates->bindValue(':estatePerPage', $estatePerPage, \PDO::PARAM_INT);
        $listEstates->execute();

        return $listEstates;
    }

    public function pagingEstateAdmin($offset, $estatePerPage)
    {
        $db = $this->dbConnect();
        $listAdmin = $db->prepare("SELECT estate.id as id, estate.title as title, category.name as category, category.id as category_id, type.name as name, type.id as type_id, client.id as client, client.lastname as lastname, client.firstname as firstname, price, picture 
        FROM estate 
        INNER JOIN category
             ON estate.category_id = category.id
             INNER JOIN type
             ON estate.type_id = type.id
             INNER JOIN client
             ON estate.client_id = client.id
             ORDER BY id DESC LIMIT :offset, :estatePerPage");
        $listAdmin->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $listAdmin->bindValue(':estatePerPage', $estatePerPage, \PDO::PARAM_INT);
        $listAdmin->execute();

        return $listAdmin;
    }

}
