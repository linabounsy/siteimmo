<?php

namespace Model;

require_once('../model/Database.php');

class Admin extends Database
{
    public function adminConnexion($login) // se connecter à la base
    {
        $db = $this->dbConnect();
        $connexion = $db->prepare('SELECT * FROM user WHERE login = ?');
        $connexion->execute(array($login));
        $user = $connexion->fetch();

        return $user;
    }

    public function getClients() // recup toute la liste des clients
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM client ORDER BY id DESC');
        $allClients = $req->fetchAll();
        return $allClients;
    }

    public function addClient($lastname, $firstname, $email, $phone, $address, $postcode, $city)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO client (lastname, firstname, email, phone, address, postcode, city) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $newClient = $req->execute(array($lastname, $firstname, $email, $phone, $address, $postcode, $city));

        return $newClient;
    }
}
