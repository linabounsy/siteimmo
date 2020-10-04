<?php ob_start(); ?>

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>

        <div class="card">
            <div class="card-body">

                <h5 class="text-center font-weight-bold mb-4">Dernières annonces ajoutées</h5>

                <?php foreach ($estates as $estate) { ?>
                <hr>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    
                    <div class="col-12 mb-3 mx-auto">
                    
                        <div class="media">
                            <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6 class="mt-1 font-weight-bold"><a href="#"><?= htmlspecialchars($estate['title']) ?></a><a href="index.php?action=modifyestate&id=<?= $estate['id'] ?>"><span class="badge badge-warning float-right">éditer l'annonce</span></a></h6>
                                <p class="text-muted"><?= htmlspecialchars($estate['description_cut']) ?>
                                    <a><span class="badge badge-danger float-right">supprimer l'annonce</span></a><br />
                                    <a><span class="badge badge-info float-right">voir l'annonce</span></a></p>
                            </div>
                        </div>
                        <?php } ?>
                        

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr>

                <p class="text-center mt-4 mb-1"><a href="#!">Voir toutes les annonces</a></p>

            </div>
        </div>

    </section>
    <!-- Section: Block Content -->

</div>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>