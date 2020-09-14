<?php ob_start(); ?>

<!--Slider photos du bien-->
<div id="carousel-example-2" class="carousel slide carousel-fade m-auto" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" src="../public/img/salon.jpg" alt="First slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Salon</h3>

            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="../public/img/chambre.jpg" alt="Second slide">
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Chambre</h3>

            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="../public/img/salledebain.jpg" alt="Third slide">
                <div class="mask rgba-black-slight"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Salle de bain</h3>

            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/fin slider photos du bien-->

<!-- Descriptif du bien -->

<div class="col-12 p-5">
   
    <h4 class="dark-grey-text font-weight-bold mb-3"><?=(ucfirst($estate['name'])) ?> <?=(ucfirst($estate['type_id'])) ?> <?=(ucfirst($estate['room'])) ?> pièces</h4>
    <h5 class="font-weight-bold mb-3 light-blue-text">Descriptif</h5>
    <p class="dark-grey-text text-justify">Ref : reference du bien <br /><br />
    <?=(strtoupper($estate['title'])) ?>
        <br /><br />
        <?=(ucfirst($estate['description'])) ?>
    </p>
</div>

<!-- fin Descriptif du bien -->


<div class="list-group-flush">
    <ul class="list-group-item d-flex justify-content-around">
        <li class="list-group-item rounded-lg col-2 w-25"><i class="fas fa-home  mr-2 grey p-3 white-text rounded-circle " aria-hidden="true"></i><?=($estate['surface']) ?>m²</li>
        <li class="list-group-item rounded-lg col-2 w-25"><i class="far fa-image  mr-2 grey p-3 white-text rounded-circle " aria-hidden="true"></i><?=($estate['room']) ?></li>
        <li class="list-group-item rounded-lg col-2 w-25"> <i class="fas fa-bed  mr-2 grey p-3 white-text rounded-circle" aria-hidden="true"></i><?=($estate['bedroom']) ?></li>
        <li class="list-group-item rounded-lg col-2 w-25"> <i class="fas fa-building  mr-2  grey p-3 white-text rounded-circle" aria-hidden="true"></i><?=($estate['construction']) ?></li>
    </ul>

</div>

<hr class="mt-5 mb-0">
<div class="row m-0">
    <div class="col-12 p-5">

        <h5 class="font-weight-bold m-3 light-blue-text">Fiche technique du bien </h5>


        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">Etage</th>
                    <td scope="col">3</th>

                </tr>
            </thead>
            <tbody>
                <tr class="tech-form bgcolor-light blue lighten-4">
                    <td scope="row">Nombre d'étages</th>
                    <td><?=($estate['floor']) ?></td>

                </tr>
                <tr>
                    <td scope="row">Bien en copropriété</th>
                    <td><?=($estate['subdivision']) ?></td>

                </tr>
                <tr class="bgcolor-light blue lighten-4">
                    <td scope="row">Charges courantes copropriété</th>
                    <td><?=($estate['charge']) ?> €</td>

                </tr>
              
                <tr>
                    <td scope="row">Salle de bain</th>
                    <td><?=($estate['bathroom']) ?></td>

                </tr>
    
                <tr class="bgcolor-light blue lighten-4">
                    <td scope="row">Cuisine</th>
                    <td><?=($estate['kitchen_id']) ?></td>

                </tr>

                <tr>
                    <td scope="row">Exposition séjour</th>
                    <td><?=($estate['exposure_id']) ?></td>

                </tr>

                <tr class="bgcolor-light blue lighten-4">
                    <td scope="row">Type de chauffage</th>
                    <td><?=($estate['heating_id']) ?></td>

                </tr>


                <tr>
                    <td scope="row">Nombre de balcons</th>
                    <td>1</td>

                </tr>

                <tr class="bgcolor-light blue lighten-4">
                    <td scope="row">Type de stationnement</th>
                    <td>Sous-sol</td>

                </tr>

                <tr>
                    <td scope="row">Nombre de place de parking</th>
                    <td>2</td>

                </tr>
        

                <tr class="bgcolor-light blue lighten-4">
                    <td scope="row">Diagnostique énergétique</th>
                    <td>Oui</td>

                </tr>
           

            </tbody>
        </table>
    </div>
</div>

<hr class="my-0">

<div class="col-12 p-5">

    <h5 class="font-weight-bold mb-3 light-blue-text">Bilan Energétique</h5>
    <div class="d-flex justify-content-around">
        <img src="../public/img/dpe_E.jpg" alt="dpe">
        <img src="../public/img/ges_C.jpg" alt="ges">
    </div>
</div>

<hr class="my-0">

<div class="col-12 p-5">


    <div class="card">

    <h5 class="card-header light blue lighten-4 black-text text-center py-4">
        <strong>Ce bien vous intéresse ? Laissez nous vos coordonnées </strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <!-- Name -->
            <div class="md-form mt-3">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Nom</label>
            </div>

            <!-- FirstName -->
            <div class="md-form mt-3">
                <input type="text" id="materialContactFormFirstName" class="form-control">
                <label for="materialContactFormFirstName">Prénom</label>
            </div>

            <!-- Phone -->
            <div class="md-form mt-3">
                <input type="tel" id="materialContactTel" class="form-control">
                <label for="materialContactFormTel">Téléphone</label>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" id="materialContactFormEmail" class="form-control">
                <label for="materialContactFormEmail">E-mail</label>
            </div>


            <!-- Send button -->
            <button class="btn btn btn-info btn-rounded btn-block z-depth-0 my-4 white-text font-weight-bold text-center py-4" type="submit">Envoyer</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/template.php');
?>