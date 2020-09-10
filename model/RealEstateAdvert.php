<?php

namespace Model;

require_once('../model/Database.php');

class RealEstateAdvert extends Database

{
    /*public function getAllAdverts() // recupere toutes les annonces
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM estate ORDER BY id DESC');
        $allAdverts = $req->fetchAll();
        return $allAdverts; => je recup quelle table ?
    }*/

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
        $kitchen = $req->fetchAll();

        return $kitchen;

    }
 
    public function addCategoryTypeExposureParkingClientsKitchenHeating() // ajout loc ou vente / type / exposition / parking / client / cuisine dans l'annonce
    {
        $db = $this->dbConnect();
        $estate = $db->prepare('INSERT INTO estate (id, category_id, type_id, exposure_id, parking_id, kitchen_id, heating, subdivision, floor, charge, bathroom, toilet, garage, basement, surface, land, price, periode, title, description, picture, status, diagenergy, ges, room, bedroom, construction) VALUES ("?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?","?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?")');
        $affectedLines = $estate->execute(array());

        return $affectedLines;

      
    }

   /* public function addExposure($name) // ajout exposition
    {
        $db = $this->dbConnect();
        $exposure = $db->prepare('INSERT INTO exposure (name) VALUES (?)');
        $affectedLines = $exposure->execute(array($name));

        return $affectedLines;
    }

    public function addHeating($type) 
    {
        $db = $this->dbConnect();
        $heating = $db->prepare('INSERT INTO heating (type) VALUES (?)');
        $affectedLines = $heating->execute(array($type));

        return $affectedLines;
    }

    public function addKitchen($type)
    {
        $db = $this->dbConnect();
        $kitchen = $db->prepare('INSERT INTO kitchen (type) VALUES (?)');
        $affectedLines = $kitchen->execute(array($type));

        return $affectedLines;
    }

    public function addParking($type)
    {
        $db = $this->dbConnect();
        $parking = $db->prepare('INSERT INTO parking (type) VALUES (?)');
        $affectedLines = $parking->execute(array($type));

        return $affectedLines;
    }*/
}