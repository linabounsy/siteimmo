<?php ob_start(); ?>

<a href="index.php?action=displayclient&client.php" class="btn blue white-text btn-md my-4">Revenir à la page précédente</a>

 <!-- Form -->
 <form class="text-center" action="index.php?action=editclient&id=<?= $client['id'] ?>" method="post" id="modifyclient">

<div class="form-row">
    <div class="col">
        <!-- First name -->
        <div class="md-form">
            <input type="text" id="materialRegisterFormFirstName" class="form-control" name="firstname" value="<?= htmlspecialchars($client['firstname']) ?>">
            <label for="materialRegisterFormFirstName">Prénom</label>
        </div>
    </div>
    <div class="col">
        <!-- Last name -->
        <div class="md-form">
            <input type="text" id="materialRegisterFormLastName" class="form-control" name="lastname" value="<?= htmlspecialchars($client['lastname']) ?>">
            <label for="materialRegisterFormLastName">Nom</label>
        </div>
    </div>
</div>

<!-- E-mail -->
<div class="md-form mt-0">
    <input type="email" id="materialRegisterFormEmail" class="form-control" name="email" value="<?= htmlspecialchars($client['email']) ?>">
    <label for="materialRegisterFormEmail">E-mail</label>
</div>

<!-- Phone number -->
<div class="md-form">
    <input type="tel" id="phone" class="form-control" name="phone" value="<?= htmlspecialchars($client['phone']) ?>">
    <label for="materialRegisterFormPhone">Téléphone</label>
</div>

<!-- Address -->
<div class="md-form">
    <input type="text" id="adress" class="form-control" name="address" value="<?= htmlspecialchars($client['address']) ?>">
    <label for="materialRegisterAddress">Adresse</label>
</div>

<div class="form-row">
<div class="col">
        <!-- postcode -->
        <div class="md-form">
            <input type="text" id="postcode" class="form-control" name="postcode" value="<?= htmlspecialchars($client['postcode']) ?>">
            <label for="materialRegisterFormPostcode">Code postal</label>
        </div>
    </div>
    <div class="col">
        <!-- city -->
        <div class="md-form">
            <input type="text" id="city" class="form-control" name="city" value="<?= htmlspecialchars($client['city']) ?>">
            <label for="materialRegisterFormCity">Ville</label>
        </div>
    </div>
</div>

<!-- Sign up button -->
<button class="btn btn-outline-blue btn-rounded btn-block my-4 waves-effect z-depth-0 w-50 m-auto" type="submit">Enregistrez</button>

</form>
<!-- Form -->

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>