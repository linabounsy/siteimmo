<?php ob_start(); ?>



        <!--Les nouveautés-->
        <div class="container mt-5">


            <!--Section: Content-->
            <section class="text-center">

                <!-- Section heading -->
                <h3 class="font-weight-bold mb-5">Nouveautés</h3>

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                        <!-- Card -->
                        <div class="card hoverable">

                            <!-- Card image -->
                            <img class="card-img-top" src="../public/img/appart1.jpg" alt="appart1">

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">Appartement</p>
                                <!-- Text -->
                                <p class="mb-2">Coup de coeur dans le 12ème arrondissement</p>

                            </div>

                        </div>
                        <!-- Card -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-md-0 mb-4">

                        <!-- Card -->
                        <div class="card hoverable">

                            <!-- Card image -->
                            <img class="card-img-top" src="../public/img/appart2.jpg" alt="appart2">

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">Appartement</p>
                                <!-- Text -->
                                <p class="mb-2">Coup de coeur dans le 12ème arrondissement</p>

                            </div>

                        </div>
                        <!-- Card -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-6 mb-0">

                        <!-- Card -->
                        <div class="card hoverable">

                            <!-- Card image -->
                            <img class="card-img-top" src="../public/img/maison1.jpg" alt="maison1">

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">Maison</p>
                                <!-- Text -->
                                <p class="mb-2">Coup de coeur dans le 12ème arrondissement</p>

                            </div>

                        </div>
                        <!-- Card -->

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </section>
            <!--Section: Content-->


        </div>

        <!--fin Les nouveautés-->



<?php $content = ob_get_clean(); ?>

<?php
require('../templates/template.php');
?>