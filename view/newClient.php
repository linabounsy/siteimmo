<?php ob_start(); ?>


<a href="index.php?action=displayclient&client.php" class="btn blue white-text btn-md my-4">Revenir à la page précédente</a>


<!-- Material form register -->
<div class="card">

    <h5 class="card-header blue white-text text-center py-4">
        <strong>Ajouter un client</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" action="index.php?action=insertnewclient" method="post">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="clientfirstname" class="form-control" name="firstname" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
                        <label for="clientfirstname">Prénom</label>
                        <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['firstname']) ? $clientValidate->getMsgerror()['firstname'] : '' ?></p>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="clientlastname" class="form-control" name="lastname" value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>">
                        <label for="clientlastname">Nom</label>
                        <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['lastname']) ? $clientValidate->getMsgerror()['lastname'] : '' ?></p>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="clientemail" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                <label for="clientemail">E-mail</label>
                <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['email']) ? $clientValidate->getMsgerror()['email'] : '' ?></p>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="tel" id="clientphone" class="form-control" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                <label for="clientphone">Téléphone</label>
                <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['phone']) ? $clientValidate->getMsgerror()['phone'] : '' ?></p>
            </div>

            <!-- Address -->
            <div class="md-form">
                <input type="text" id="clientaddress" class="form-control" name="address" value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?>">
                <label for="clientaddress">Adresse</label>
                <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['address']) ? $clientValidate->getMsgerror()['address'] : '' ?></p>
            </div>

            <div class="form-row">
                <div class="col">
                    <!-- postcode -->
                    <div class="md-form">
                        <input type="text" id="clientpostcode" class="form-control" name="postcode" value="<?= isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : '' ?>">
                        <label for="clientpostcode">Code postal</label>
                        <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['postcode']) ? $clientValidate->getMsgerror()['postcode'] : '' ?></p>
                    </div>
                </div>
                <div class="col">
                    <!-- city -->
                    <div class="md-form">
                        <input type="text" id="clientcity" class="form-control" name="city" value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>">
                        <label for="clientcity">Ville</label>
                        <p class="error text-left"><?= !empty($clientValidate) && isset($clientValidate->getMsgerror()['city']) ? $clientValidate->getMsgerror()['city'] : '' ?></p>
                    </div>
                </div>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-outline-blue btn-rounded btn-block my-4 waves-effect z-depth-0 w-50 m-auto" name="newclient" id="form-newclient">Validez</button>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->

<?php $content = ob_get_clean(); ?>

<?php
require('../view/templateAdmin.php');
?>