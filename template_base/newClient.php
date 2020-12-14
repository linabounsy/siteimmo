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
                        <input type="text" id="materialRegisterFormFirstName" class="form-control" name="firstname">
                        <label for="materialRegisterFormFirstName">Prénom</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" class="form-control" name="lastname">
                        <label for="materialRegisterFormLastName">Nom</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control" name="email">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="tel" id="phone" class="form-control" name="phone">
                <label for="materialRegisterFormPhone">Téléphone</label>
            </div>

            <!-- Address -->
            <div class="md-form">
                <input type="text" id="address" class="form-control" name="address">
                <label for="materialRegisterAddress">Adresse</label>
            </div>

            <div class="form-row">
            <div class="col">
                    <!-- postcode -->
                    <div class="md-form">
                        <input type="text" id="postcode" class="form-control" name="postcode">
                        <label for="materialRegisterFormPostcode">Code postal</label>
                    </div>
                </div>
                <div class="col">
                    <!-- city -->
                    <div class="md-form">
                        <input type="text" id="city" class="form-control" name="city">
                        <label for="materialRegisterFormCity">Ville</label>
                    </div>
                </div>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-outline-blue btn-rounded btn-block my-4 waves-effect z-depth-0 w-50 m-auto" type="submit">Validez</button>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>