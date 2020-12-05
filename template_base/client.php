<?php ob_start(); ?>

<div class="pt-4">
<a href="index.php?action=indexadmin" class="btn blue btn-md my-4">Revenir à la page précédente</a>

<a href="index.php?action=insertnewclient" class="btn blue btn-md my-4">Ajouter un client</a>

<h2>Liste des clients</h2>

<table class="table table-hover table-bordered">


  <thead>
    <tr>
      <th scope="col">Nom Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>

      <th scope="col">Code Postal</th>
      <th scope="col">Ville</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Editer une fiche</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($allClients as $allClient) { // car on a appelé displayClient dans $allClients au niveau du controller 

    ?>
      <tr>
        <th scope="row" class="align-middle"><?= ucfirst(htmlspecialchars($allClient['lastname'])) ?> <?= ucfirst(htmlspecialchars($allClient['firstname'])) ?></th>
        <td class="align-middle"><?= htmlspecialchars($allClient['email']) ?></td>
        <td class="align-middle"><span class="comments"><?= nl2br(htmlspecialchars($allClient['address'])) ?></span></td>
        <td class="align-middle"><?= htmlspecialchars($allClient['postcode']) ?></td>
        <td class="align-middle"><?= ucfirst(htmlspecialchars($allClient['city'])) ?></td>
        <td class="align-middle"><?= htmlspecialchars($allClient['phone']) ?></td>
        <td><a href="index.php?action=modifyclient&id=<?= $allClient['id'] ?>"><span class="btn-floating btn-so"><i class="far fa-edit"></i></span></a>
        <a type="button"  data-toggle="modal" data-target="#modalConfirmDelete<?=$allClient['id']?>"><span class="btn-floating btn-yt"><i class="fas fa-trash-alt"></i></span></a>
      
                            <!--Modal: modalConfirmDelete-->
                            <div class="modal fade" id="modalConfirmDelete<?=$allClient['id']?>" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">Etes-vous sûr de vouloir supprimer ce client ?</p>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">

                                            <i class="fas fa-times fa-4x animated rotateIn"></i>

                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer flex-center">
                                            <a href="index.php?action=deleteclient&id=<?= $allClient['id'] ?>" class="btn  btn-outline-danger">Oui</a>
                                            <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
                                        </div>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal: modalConfirmDelete--></td>
       
      </tr>

    <?php } ?>
  </tbody>
    
</table>
</div>
<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>