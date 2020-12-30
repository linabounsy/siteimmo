<?php ob_start(); ?>




<!--Section: Content-->
<section class="text-center">

    <!-- Section heading -->
    <h3 class="font-weight-bold">Nouveautés</h3>

    <!-- Grid row -->
    <div class="row mt-3">
        <?php foreach ($lastEstates as $lastEstate) { ?>
            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                <!-- Card -->
                <div class="card hoverable ">

                    <!-- Card image -->
                    <img class="card-img-top" src="img/estates/<?= $lastEstate['picture'] ?>" alt="appart">

                    <!-- Card content -->
                    <div class="card-body">

                        <!-- Title -->
                        <p class="card-title text-muted text-uppercase font-small mt-1 mb-3"><?= $lastEstate['title'] ?></p>
                        <!-- Text -->
                        <p class="mb-2 description"><?= (ucfirst(substr($lastEstate['description'], 0, 100))) ?></p>

                        <!-- Read more button -->
                        <a class="m-0 btn btn-info" href="index.php?action=estate&id=<?= $lastEstate['id'] ?>">Plus de détails</a>
                    </div>

                </div>
                <!-- Card -->

            </div>
            <!-- Grid column -->
        <?php } ?>


    </div>
    <!-- Grid row -->

</section>
<!--Section: Content-->



<!--fin Les nouveautés-->


<?php $content = ob_get_clean(); ?>

<?php
require('../view/template.php');
?>