<?php ob_start(); ?>

<a href="index.php?action=displayclient&client.php" class="btn blue white-text btn-md my-4">Revenir à la page précédente</a>

<!-- Form -->
<form class="text-center" action="index.php?action=editclient&id=<?= $client['id'] ?>" method="post">

    <div class="form-row">
        <div class="col">
            <!-- First name -->
            <div class="md-form">
                <input type="text" id="materialRegisterFormFirstName" class="form-control" name="firstname" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : htmlspecialchars($client['firstname']) ?>">
                <label for="materialRegisterFormFirstName">Prénom</label>
                <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['firstname']) ? $clientValidate->getMsgerror()['firstname'] : '' ?></p>
            </div>
        </div>
        <div class="col">
            <!-- Last name -->
            <div class="md-form">
                <input type="text" id="materialRegisterFormLastName" class="form-control" name="lastname" value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : htmlspecialchars($client['lastname']) ?>">
                <label for="materialRegisterFormLastName">Nom</label>
                <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['lastname']) ? $clientValidate->getMsgerror()['lastname'] : '' ?></p>
            </div>
        </div>
    </div>

    <!-- E-mail -->
    <div class="md-form mt-0">
        <input type="email" id="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : htmlspecialchars($client['email']) ?>">
        <label for="email">E-mail</label>
        <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['email']) ? $clientValidate->getMsgerror()['email'] : '' ?></p>
    </div>

    <!-- Phone number -->
    <div class="md-form">
        <input type="tel" id="phone" class="form-control" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : htmlspecialchars($client['phone']) ?>">
        <label for="phone">Téléphone</label>
        <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['phone']) ? $clientValidate->getMsgerror()['phone'] : '' ?></p>
    </div>

    <!-- Address -->
    <div class="md-form">
        <input type="text" id="adress" class="form-control" name="address" value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : htmlspecialchars($client['address']) ?>">
        <label for="adress">Adresse</label>
        <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['address']) ? $clientValidate->getMsgerror()['address'] : '' ?></p>
    </div>

    <div class="form-row">
        <div class="col">
            <!-- postcode -->
            <div class="md-form">
                <input type="text" id="postcode" class="form-control" name="postcode" value="<?= isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : htmlspecialchars($client['postcode']) ?>">
                <label for="postcode">Code postal</label>
                <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['postcode']) ? $clientValidate->getMsgerror()['postcode'] : '' ?></p>
            </div>
        </div>
        <div class="col">
            <!-- city -->
            <div class="md-form">
                <input type="text" id="city" class="form-control" name="city" value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : htmlspecialchars($client['city']) ?>">
                <label for="city">Ville</label>
                <p class="text-left error"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['city']) ? $clientValidate->getMsgerror()['city'] : '' ?></p>
            </div>
        </div>
    </div>

    <!-- Sign up button -->
    <button class="btn btn-outline-blue btn-rounded btn-block my-4 waves-effect z-depth-0 w-50 m-auto" name="modifyclient" type="submit">Enregistrez</button>

</form>
<!-- Form -->

<?php $content = ob_get_clean(); ?>

<?php
require('../view/templateAdmin.php');
?>