<?php ob_start(); ?>

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>

        <div class="card">
            <div class="card-body">

                <h5 class="text-center font-weight-bold mb-4">Dernières annonces ajoutées</h5>


                <?php foreach ($estates as $estate) { ?>
                    <hr>

                    <!-- Card Regular -->
                    <div class="card card-cascade">

                        <!-- Card image -->

                        <img class="img-admin" src="../public/img/estates/<?= $estate['picture'] ?>" alt="Card image cap">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>


                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                            <!-- Title -->
                            <h4 class="card-title"><strong><?= htmlspecialchars($estate['title']) ?></strong></h4>

                            <!-- Text -->
                            <p class="card-text"><?= htmlspecialchars(substr($estate['description'], 0, 100)) ?>
                            </p>

                            <!-- edit estate -->
                            <a href="index.php?action=modifyestate&id=<?= $estate['id'] ?>"><span class="btn-floating btn-so"><i class="far fa-edit"></i></span></a>
                            <!-- delete estate -->
                
                            <a type="button" class="btn-floating btn-yt" data-toggle="modal" data-target="#modalConfirmDelete<?=$estate['id']?>"><i class="fas fa-trash-alt"></i></a>

                            <!--Modal: modalConfirmDelete-->
                            <div class="modal fade" id="modalConfirmDelete<?=$estate['id']?>" aria-hidden="true">
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
                    <!-- Card Regular -->

                <?php } ?>





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