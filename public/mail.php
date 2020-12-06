<?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['firstname']))
$firstname = $_POST['firstname'];
if(isset( $_POST['phone']))
$phone = $_POST['phone'];

/*
if ($name == '') {
    echo 'veuillez remplir le champ nom';
    die();
}

if ($firstname == '') {
    echo 'veuillez remplir le champ prenom';
    die();
}

if ($email == '') {
    echo 'veuillez remplir le champ email';
    die();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'format email invalide';
        die();
    }
}

if ($phone == '') {
    echo 'veuillez remplir le champ telephone';
    die();
}
*/

$content="From: $name \n Email: $email";
$recipient = "lina_bounsy@hotmail.fr";
$mailheader = "From: $email \r\n";
mail($recipient, $content, $mailheader) or die("Error!");
echo "Email sent!";

?>