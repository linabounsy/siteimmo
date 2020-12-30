<?php ob_start(); ?>


<!--Toutes les annonces-->



<!-- Section: Block Content -->
<section class="dark-grey-text">

    <h3 class="text-center font-weight-bold mb-4 pb-2 estimation">Vous souhaitez estimer votre bien ?</h3>


    <div class="col-12 myformcontact">

        <div class="card">

            <h5 class="card-header light blue lighten-4 black-text text-center py-4">
                <strong>Laissez nous vos coordonnées </strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->

                <form class="text-center <?= isset($message) ? 'd-none' : '' ?>" name="contact-form" method="POST" id="estimationForm">

                    <!-- Name -->
                    <div class="md-form mt-3">
                        <input type="text" id="ContactFormName" name="name" class="form-control" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                        <label for="ContactFormName">Nom</label>
                        <p id="error_contactname" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['name']) ? $formContactValidate->getMsgerror()['name'] : '' ?></p>
                    </div>

                    <!-- FirstName -->
                    <div class="md-form mt-3">
                        <input type="text" id="ContactFormFirstName" name="firstname" class="form-control" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
                        <label for="ContactFormFirstName">Prénom</label>
                        <p id="error_contactfirstname" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['firstname']) ? $formContactValidate->getMsgerror()['firstname'] : '' ?></p>
                    </div>

                    <!-- Phone -->
                    <div class="md-form mt-3">
                        <input type="tel" id="ContactTel" class="form-control" name="phone" maxlength="10" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                        <label for="ContactTel">Téléphone</label>
                        <p id="error_contactphone" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['phone']) ? $formContactValidate->getMsgerror()['phone'] : '' ?></p>
                    </div>

                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="email" id="ContactFormEmail" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                        <label for="ContactFormEmail">E-mail</label>
                        <p id="error_contactemail" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['email']) ? $formContactValidate->getMsgerror()['email'] : '' ?></p>
                    </div>

                    <!-- Send button -->
                    <button class="btn btn btn-info btn-rounded btn-block z-depth-0 my-4 white-text font-weight-bold text-center py-4" id="form-submit">Envoyer</button>

                </form>
                <div id="msgSubmit"><?= isset($message) ? $message : '' ?></div>

                <!-- Form -->

            </div>

        </div>

    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/ajaxformcontact.js"></script>
<?php $content = ob_get_clean(); ?>
<?php
require('../view/template.php');
?>