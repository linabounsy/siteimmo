<?php ob_start(); ?>

<!--Slider photos du bien-->
<div id="carousel-example-2" class="carousel slide carousel-fade m-auto" data-ride="carousel">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" src="img/estates/<?= $estate['picture'] ?>" alt="First slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">


            </div>
        </div>

    </div>
    <!--/fin slider photos du bien-->

    <!-- Descriptif du bien -->

    <div class="col-12">

        <h4 class="dark-grey-text font-weight-bold mb-3"><?= (ucfirst($estate['category'])) ?> <?= ($estate['name']) ?> <?= ($estate['room']) ?> pièces</h4>
        <h5 class="font-weight-bold mb-3 light-blue-text">Descriptif</h5>

        <?= (strtoupper($estate['title'])) ?> - <?= $estate['price'] ?> €
        <br><br>
        <?= (ucfirst($estate['description'])) ?>

    </div>

    <!-- fin Descriptif du bien -->



    <div class="list-group-flush">
        <ul class="list-group-item d-flex justify-content-around">
            <li class="list-group-item rounded-lg col-2 w-25"><i class="fas fa-home  mr-2 grey p-3 white-text rounded-circle " aria-hidden="true"></i><?= ($estate['surface']) ?>m²</li>
            <li class="list-group-item rounded-lg col-2 w-25"><i class="far fa-image  mr-2 grey p-3 white-text rounded-circle " aria-hidden="true"></i><?= ($estate['room']) ?></li>
            <li class="list-group-item rounded-lg col-2 w-25"> <i class="fas fa-bed  mr-2 grey p-3 white-text rounded-circle" aria-hidden="true"></i><?= ($estate['bedroom']) ?></li>
            <li class="list-group-item rounded-lg col-2 w-25"> <i class="fas fa-building  mr-2  grey p-3 white-text rounded-circle" aria-hidden="true"></i><?= explode('-', $estate['construction'])[0] ?></li>

        </ul>

    </div>

    <hr class="mt-5 mb-0">
    <div class="row m-0">
        <div class="col-12">

            <h5 class="font-weight-bold m-3 light-blue-text">Fiche technique du bien </h5>


            <table class="table table-striped">
                <thead>
                    <tr class="fiche">
                        <th scope="col">Etage</th>
                        <th scope="col"><?= ($estate['floor']) ?></th>

                    </tr>
                </thead>
                <tbody>

                    <tr class="bgcolor-light blue lighten-4">
                        <th scope="row">Bien en copropriété</th>
                        <td><?= (boolval($estate['subdivision']) ? 'oui' : 'non') ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Charges courantes copropriété</th>
                        <td><?= ($estate['charge']) ?> €</td>

                    </tr>

                    <tr class="bgcolor-light blue lighten-4">
                        <th scope="row">Salle de bain</th>
                        <td><?= ($estate['bathroom']) ?></td>

                    </tr>

                    <tr>
                        <th scope="row">Cuisine</th>
                        <td><?= ($estate['kitchen']) ?></td>

                    </tr>

                    <tr class="bgcolor-light blue lighten-4">
                        <th scope="row">Exposition séjour</th>
                        <td><?= ($estate['exposure']) ?></td>

                    </tr>

                    <tr>
                        <th scope="row">Type de chauffage</th>

                        <td><?= implode(", ", $estate['heatings']); ?></td>



                    </tr>

                    <tr class="bgcolor-light blue lighten-4">
                        <th scope="row">Diagnostique énergétique</th>
                        <td><?= (boolval($estate['diagenergy']) ? 'oui' : 'non') ?></td>

                    </tr>

                    <tr>
                        <th scope="row">Classe Energétique</th>
                        <td><?= (ucfirst($estate['energyclass'])) ?></td>

                    </tr>

                    <tr class="bgcolor-light blue lighten-4">
                        <th scope="row">GES</th>
                        <td><?= (ucfirst($estate['ges'])) ?></td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>



    <hr class="my-0">

    <div class="col-12 mt-5 myformcontact">


        <div class="card">

            <h5 class="card-header light blue lighten-4 black-text text-center py-4">
                <strong>Ce bien vous intéresse ? Laissez nous vos coordonnées </strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->

                <form class="text-center <?= isset($message) ? 'd-none' : '' ?>" name="contact-form" method="POST" id="myForm" novalidate>

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
                        <input type="tel" id="ContactTel" class="form-control" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/ajaxformcontact.js"></script>
<?php $content = ob_get_clean(); ?>

<?php
require('../view/template.php');
?>