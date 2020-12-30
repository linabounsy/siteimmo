<?php

namespace Model;

require_once('../model/Database.php');

class Admin extends Database
{
    public function connexion($login) // se connecter à la base
    {
        $db = $this->dbConnect();

        $connexion = $db->prepare('SELECT * FROM user WHERE login = :login');
        $connexion->execute(array('login' => $login));
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


        $req = $db->prepare('SELECT * FROM client WHERE id = :id');
        $req->execute(array('id' => $clientId));

        $client = $req->fetch();
        return $client;
    }

    public function addClient($lastname, $firstname, $email, $phone, $address, $postcode, $city) // ajouter un client
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO client (lastname, firstname, email, phone, address, postcode, city) 
        VALUES (:lastname, :firstname, :email, :phone, :address, :postcode, :city)');
        $newClient = $req->execute(array('lastname' => $lastname, 'firstname' => $firstname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'postcode' => $postcode, 'city' => $city));
    }


    public function editClient($id, $lastname, $firstname, $email, $phone, $address, $postcode, $city)
    {
        $db = $this->dbconnect();

        $sql = 'UPDATE client SET lastname = :lastname, firstname = :firstname, email = :email, phone = :phone, address = :address, postcode = :postcode, city = :city';

        $data = array('id' => $id, 'lastname' => $lastname, 'firstname' => $firstname, 'email' => $email, 'phone' => $phone, 'address' => $address, 'postcode' => $postcode, 'city' => $city);

        if ($email !== false) {
            $sql .= ', email = :email';
            $data['email'] = $email;
        }
        $sql .= ' WHERE id = :id';

        $editClient = $db->prepare($sql);
        $editClient->execute($data);
    }



    public function deleteClient($clientId)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM client WHERE id = :id');
        $delete->execute(array('id' => $clientId));
    }

    public function checkEmail($email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT email FROM client WHERE email = :email');
        $req->execute(array('email' => $email));
        $check = $req->fetchAll();

        return $check;
    }
    public function checkEmailBis($email, $id) // check si l'email appartient a un autre id client
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(id) as nbEmail FROM client WHERE email = :email AND id != :id');
        $req->execute(array('email' => $email, 'id' => $id));
        $check = $req->fetch();

        if ($check['nbEmail'] == 0) {
            return false;
        }

        return $check;
    }
}
