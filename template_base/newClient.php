<?php ob_start(); ?>


<a href="index.php?action=indexadmin" class="btn btn-info btn-md my-4">Revenir à la page précédente</a>

<?php echo 'mettre un formulaire pour ajouter nouveau client' ?>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>