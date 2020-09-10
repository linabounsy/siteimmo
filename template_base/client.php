<?php ob_start(); ?>


<a href="index.php?action=indexadmin" class="btn btn-info btn-md my-4">Revenir à la page précédente</a>

<a href="index.php?action=insertnewclient" class="btn btn-info btn-md my-4">Ajouter un client</a>

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
        <th scope="row"><?= htmlspecialchars($allClient['lastname']) ?> <?= htmlspecialchars($allClient['firstname']) ?></th>
        <td><?= htmlspecialchars($allClient['email']) ?></td>
        <td><span class="comments"><?= nl2br(htmlspecialchars($allClient['address'])) ?></span></td>
        <td><?= htmlspecialchars($allClient['postcode']) ?></td>
        <td><?= htmlspecialchars($allClient['city']) ?></td>
        <td><?= htmlspecialchars($allClient['phone']) ?></td>
        <td><a href="#"><span class="badge badge-warning float-right p-2 mb-2">éditer la fiche</span></a><br />
        <a href="#"><span class="badge badge-danger float-right p-2 mb-2">supprimer la fiche</span></a></td>
       
      </tr>

    <?php } ?>
  </tbody>

</table>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>