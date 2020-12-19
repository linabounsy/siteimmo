<?php ob_start(); ?>


<!--Toutes les annonces-->
<div class="container my-5">


    <!-- Section: Block Content -->
    <section class="dark-grey-text">

        <h3 class="text-center font-weight-bold mb-4 pb-2">Vous souhaitez estimer votre bien ?</h3>


        <div class="col-12 p-5">


<div class="card">

    <h5 class="card-header light blue lighten-4 black-text text-center py-4">
        <strong>Laissez nous vos coordonnées </strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->

        <form class="text-center" name="contact-form" method="POST" id="estimationForm" novalidate>

            <!-- Name -->
            <div class="md-form mt-3">
                <input type="text" id="ContactFormName" name="name" class="form-control" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                <label for="materialContactFormName">Nom</label>
                <p id="error_contactname" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['name']) ? $formContactValidate->getMsgerror()['name'] : '' ?></p>
            </div>

            <!-- FirstName -->
            <div class="md-form mt-3">
                <input type="text" id="ContactFormFirstName" name="firstname" class="form-control" value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>">
                <label for="materialContactFormFirstName">Prénom</label>
                <p id="error_contactfirstname" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['firstname']) ? $formContactValidate->getMsgerror()['firstname'] : '' ?></p>
            </div>

            <!-- Phone -->
            <div class="md-form mt-3">
                <input type="tel" id="ContactTel" class="form-control" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                <label for="materialContactFormTel">Téléphone</label>
                <p id="error_contactphone" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['phone']) ? $formContactValidate->getMsgerror()['phone'] : '' ?></p>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" id="ContactFormEmail" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                <label for="materialContactFormEmail">E-mail</label>
                <p id="error_contactemail" class="error"><?= !empty($formContactValidate) && isset($formContactValidate->getMsgerror()['email']) ? $formContactValidate->getMsgerror()['email'] : '' ?></p>
            </div>

            <!-- Send button -->
            <button class="btn btn btn-info btn-rounded btn-block z-depth-0 my-4 white-text font-weight-bold text-center py-4" id="form-submit">Envoyer</button>

        </form>
        <div id="msgSubmit"></div>
        <div id="msgSubmitKO"></div>
        <!-- Form -->

    </div>

</div>
</div>
</section>

    

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/template.php');
?>