<?php

namespace Model;

require_once('../model/Database.php');

class Admin extends Database
{
    public function adminConnexion($login) // se connecter à la base
    {
        $db = $this->dbConnect();

        $connexion = $db->prepare('SELECT * FROM user WHERE login = ?');

        $connexion = $db->prepare('SELECT * FROM user WHERE login = :login');

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

    public function getClient($clientId) // recup un client via son id
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM client WHERE id = ?');
        $req->execute(array($clientId));

        $req = $db->prepare('SELECT * FROM client WHERE id = :id');
        $req->execute(array('id' => $clientId));

        $client = $req->fetch();
        return $client;
    }

    public function addClient($lastname, $firstname, $email, $phone, $address, $postcode, $city) // ajouter un client
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO client (lastname, firstname, email, phone, address, postcode, city) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $newClient = $req->execute(array($lastname, $firstname, $email, $phone, $address, $postcode, $city));

        $req = $db->prepare('INSERT INTO client (lastname, firstname, email, phone, address, postcode, city) VALUES (:lastname, :firstname, :email, :phone, :address, :postcode, :city)');
        $newClient = $req->execute(array('lastname' => $lastname, 'firstname' => $firstname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'postcode' => $postcode, 'city' => $city));


    }

    public function modifyClient($id, $lastname, $firstname, $email, $phone, $address, $postcode, $city)
    {
        $db = $this->dbconnect();

        $editClient = $db->prepare("UPDATE client SET lastname = :lastname, firstname = :firstname, email = :email, phone = :phone, address = :address, postcode = :postcode, city = :city    WHERE id = :id");
        $editClient->execute(array('id' => $id, 'lastname' => $lastname, 'firstname' => $firstname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'postcode' => $postcode, 'city' => $city));
    }



    public function deleteClient($clientId)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM client WHERE id = :id');
        $delete->execute(array('id' => $clientId));

    }
    
}
