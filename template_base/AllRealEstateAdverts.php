<?php ob_start(); ?>


<!--Toutes les annonces-->
<div class="container my-5">


    <!-- Section: Block Content -->
    <section class="dark-grey-text">

        <h3 class="text-center font-weight-bold mb-4 pb-2">Toutes nos annonces</h3>

        <?php foreach ($listEstates as $listEstate) { ?>
        <!-- Grid row -->
        <div class="row">
      
            <!-- Grid column -->
            <div class="col-lg-5 mb-lg-0 mb-5 mt-5">

                <img src="https://mdbootstrap.com/img/Photos/Others/images/83.jpg" class="img-fluid rounded z-depth-1" alt="Sample project image">

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7">
            
                <ul class="list-unstyled fa-ul mb-0">
                    <li class="d-flex justify-content pl-4 mt-5">
                        <span class="fa-li"><i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                        <div>
                            <h5 class="font-weight-bold mb-3"><?= htmlspecialchars(ucfirst($listEstate['title'])) ?></h5>
                        </div>
                    </li>
                    <li class="d-flex justify-content pl-4">
                        <span class="fa-li"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                       
                        <div>
                            <h5 class="font-weight-bold mb-3"><?= htmlspecialchars(ucfirst($listEstate['city']))  ?> (<?= htmlspecialchars($listEstate['postcode'])  ?>)</h5>
                        </div>
                  
                    </li>
                    <li class="d-flex justify-content pl-4">
                        <span class="fa-li"><i class="fas fa-euro-sign"></i></span>
                        <div>
                            <h5 class="font-weight-bold mb-3">Prix : <?=($listEstate['price']) ?> euros</h5>

                        </div>
                    </li>
                </ul>
                <!-- Excerpt -->
                <p class="dark-grey-text"><?=(ucfirst($listEstate['description_cut'])) ?></p>

                <!-- Read more button -->
                <a class="btn btn-info" href="index.php?action=estate&id=<?= $listEstate['id'] ?>">Plus de détails</a>
                
            </div>
           
            <!-- Grid column -->

        </div>
       
        <?php } ?>
    </section>
    <!-- Section: Block Content -->


</div>
<!--fin des annonces-->



<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/template.php');
?>