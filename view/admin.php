<?php ob_start(); ?>

<a href="index.php?action=newadvert" class="btn blue btn-md my-4 white-text"><i class="fas fa-plus"></i> Ajouter une annonce</a>





<table class="table table-hover table-bordered">


  <thead>
    <tr class="adminboard">
      <th scope="col" class="align-middle text-center"></th>
      <th scope="col" class="align-middle text-center">N° Annonce</th>
      <th scope="col" class="align-middle text-center">Titre annonce</th>
      <th scope="col" class="align-middle text-center">Catégorie</th>
      <th scope="col" class="align-middle text-center">Type</th>
      <th scope="col" class="align-middle text-center">Prix</th>
      <th scope="col" class="align-middle text-center">Client</th>
      <th scope="col" class="align-middle text-center">Editer une annonce</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($estates as $estate) {

    ?>
      <tr>

        <td class="align-middle text-center" scope="row"><img class="icone_picture" src="img/estates/<?= ($estate['picture']) ?>" alt="miniature"></td>
        <td class="align-middle text-center" scope="row" data-label="N° annonce"><?= $estate['id'] ?></td>
        <td class="align-middle text-center" data-label="titre"><?= htmlspecialchars($estate['title']) ?></td>
        <td class="align-middle text-center" data-label="catégorie"><?= htmlspecialchars($estate['category']) ?></td>
        <td class="align-middle text-center" data-label="type"><?= htmlspecialchars($estate['name']) ?></td>
        <td class="align-middle text-center" data-label="prix"><?= htmlspecialchars($estate['price']) ?>€</td>
        <td class="align-middle text-center" data-label="client"><?= ucfirst(htmlspecialchars($estate['firstname'])) ?> <?= ucfirst(htmlspecialchars($estate['lastname'])) ?></td>

        <td class="align-middle text-center">
          <!-- edit estate -->
          <a href="index.php?action=modifyestate&id=<?= $estate['id'] ?>" class="btn-floating btn-so"><i class="far fa-edit"></i></a>
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
          <a href="index.php?action=estate&id=<?= $estate['id'] ?>" class="btn-floating btn-tw" target="_blank"><i class="fas fa-eye"></i></a>
          <!--Modal: modalConfirmDelete-->
        </td>

      </tr>

    <?php } ?>

  </tbody>

</table>



<!-- Section: Block Content -->


<?php $content = ob_get_clean(); ?>

<?php
require('../view/templateAdmin.php');
?>