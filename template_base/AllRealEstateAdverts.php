<?php ob_start(); ?>


<!--Toutes les annonces-->
<div class="container my-5">


    <!-- Section: Block Content -->
    <section class="dark-grey-text">

        <h3 class="text-center font-weight-bold mb-4 pb-2">Toutes nos annonces</h3>



        <?php foreach ($listEstates as $listEstate) { ?>

            <div class="card card-cascade">

                <!-- Card image -->

                <img class="img-admin" src="../public/img/estates/<?= $listEstate['picture'] ?>" alt="Card image cap">


                <!-- Grid column -->
                <div class="row mt-4 mb-4">
                    <div class="col-lg-6 mb-lg-0 mb-6 ml-5">

                        <ul class="list-unstyled fa-ul mb-0">
                            <li class="d-flex justify-content pl-4">
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
                                    <h5 class="font-weight-bold mb-3">Prix : <?= ($listEstate['price']) ?> euros</h5>

                                </div>
                            </li>
                        </ul>

                    </div>

                    <div class="col-lg-5">

                        <!-- Excerpt -->
                        <p class="dark-grey-text"><?= (ucfirst(substr($listEstate['description'], 0, 100))) ?></p>

                        <!-- Read more button -->
                        <a class="m-0 btn btn-info" href="index.php?action=estate&id=<?= $listEstate['id'] ?>">Plus de détails</a>

                    </div>

                    <!-- Grid column -->

                </div>
            </div>
        <?php } ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue">
           
            <li class="page-item ">
           
                   <a class="page-link" href="index.php?action=listestates&page=<?= $previous ?>" tabindex="-1"><< Précédente</a>
                   
                </li>
              
                <?php for ($i = 0; $i < $lastPage; $i++) : ?>

                    <li class="page-item <?= $i+1 == $currentPage ? "active" : '' ?>">
                    <a class="page-link" aria-current="page" href="index.php?action=listestates&page=<?= $i + 1 ?>"><?= $i+1 ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item">
                    <a class="page-link active" href="index.php?action=listestates&page=<?= $next ?>">Suivante >></a>
                </li>
            </ul>
        </nav>
    </section>

</div>
<!-- Card Regular -->





<!-- Section: Block Content -->




<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/template.php');
?>