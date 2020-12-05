<?php ob_start(); ?>

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>

        <div class="card">
            <div class="card-body">

                <h5 class="text-center font-weight-bold mb-4">Toutes les annonces</h5>


                <div class="row mb-4 wow fadeIn">

                    <?php foreach ($estates as $estate) { ?>

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4">

                            <!--Card-->
                            <div class="card encart">

                                <!--Card image-->
                                <div class="view overlay">

                                    <img src="../public/img/estates/<?= $estate['picture'] ?>" class="card-img-top" alt="">


                                    <div class="mask rgba-white-slight"></div>

                                </div>

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <h4 class="card-title"><?= htmlspecialchars($estate['title']) ?></h4>
                                    <!--Text-->
                                    <h4 class="card-text mt-4">Catégorie : <?= htmlspecialchars($estate['category']) ?></h4>
                                    <h4 class="card-text">Type : <?= htmlspecialchars($estate['name']) ?></h4>
                                    <h4 class="card-text">Client : <?= ucfirst(htmlspecialchars($estate['firstname'])) ?> <?= ucfirst(htmlspecialchars($estate['lastname'])) ?></h4>
                                    <h4 class="card-text">Prix : <?= htmlspecialchars($estate['price']) ?> €</h4>

                                    <!-- edit estate -->
                                    <div class="text-center">
                                        <a href="index.php?action=modifyestate&id=<?= $estate['id'] ?>"><span class="btn-floating btn-so"><i class="far fa-edit"></i></span></a>
                                        <!-- delete estate -->

                                        <a type="button" class="btn-floating btn-yt" data-toggle="modal" data-target="#modalConfirmDelete<?= $estate['id'] ?>"><i class="fas fa-trash-alt"></i></a>

                                        <!--Modal: modalConfirmDelete-->
                                        <div class="modal fade" id="modalConfirmDelete<?= $estate['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content text-center">
                                                    <!--Header-->
                                                    <div class="modal-header d-flex justify-content-center">
                                                        <p class="heading">Etes-vous sûr de vouloir supprimer cette annonce ?</p>
                                                    </div>

                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer flex-center">
                                                        <a href="index.php?action=deleteestate&id=<?= $estate['id'] ?>" class="btn  btn-outline-danger">Oui</a>
                                                        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>

                                        <!--Modal: modalConfirmDelete-->

                                        <!-- view estate-->
                                        <a href="index.php?action=estate&id=<?= $estate['id'] ?>" class="btn-floating btn-tw"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>

                            </div>
                            <!--/.Card-->
                        </div>
                    <?php
                    }
                    ?>
                </div>

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