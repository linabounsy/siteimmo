<?php ob_start(); ?>

<form action="index.php?action=insertnewadvert" method="post" enctype="multipart/form-data">


<h6 class="mt-1 font-weight-bold">Titre</h6>
<input type="text" class="mb-4" id="title" name="title" minlength="1" maxlength="45" required>

<h6 class="mt-1 font-weight-bold">Description</h6>
<textarea class="mb-4" id="description" name="description" rows="5" cols="100"></textarea>

<h6 class="mt-1 font-weight-bold">Photos</h6>
<input type="file" class="mb-4" id="picture" name="picture" accept="image/png, image/jpg">


<h6 class="mt-1 font-weight-bold">Catégorie</h6>


<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="location" name="category" value="1" required>
  <label class="custom-control-label" for="location"><?= $category[0]['name']?></label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="vente" name="category" value="2">
  <label class="custom-control-label" for="vente"><?= $category[1]['name'] ?></label>
</div>


<h6 class="mt-1 font-weight-bold">Type</h6>

<?php foreach ($types as $type) { ?>
<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="<?=$type['name'] ?>" name="type" value="<?=$type['id'] ?>">
  <label class="custom-control-label" for="<?=$type['name'] ?>"><?=$type['name'] ?></label>
</div>
<?php } ?>

<h6 class="mt-1 font-weight-bold">Année de construction</h6>
<input type="date" class="mb-4" id="contrcution" name="construction"> 

<h6 class="mt-1 font-weight-bold">Exposition</h6>

<?php foreach ($exposures as $exposure) { ?>
<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="checkbox" class="custom-control-input" id="<?=$exposure['name'] ?>" name="exposure" value="<?=$exposure['id'] ?>">
  <label class="custom-control-label" for="<?=$exposure['name'] ?>"><?=$exposure['name'] ?></label>
</div>
<?php } ?>


<h6 class="mt-1 font-weight-bold">Type de chauffage</h6>

<?php foreach ($heatings as $heating) { ?>
<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="checkbox" class="custom-control-input" id="<?= $heating['type'] ?>" name="heating" value="<?= $heating['id'] ?>">
  <label class="custom-control-label" for="<?= $heating['type'] ?>"><?= $heating['type'] ?></label>
</div>
<?php } ?>

<h6 class="mt-1 font-weight-bold">Cuisine</h6>

<?php foreach ($kitchens as $kitchen) { ?>
<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="checkbox" class="custom-control-input" id="<?= $kitchen['type'] ?>" name="kitchen" value="<?= $kitchen['id'] ?>">
  <label class="custom-control-label" for="<?= $kitchen['type'] ?>"><?= $kitchen['type'] ?></label>
</div>
<?php } ?>

<h6 class="mt-1 font-weight-bold">Parking</h6>

<?php foreach ($parkings as $parking) { ?>
<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="checkbox" class="custom-control-input" id="<?= $parking['type'] ?>" name="parking" value="<?= $parking['id'] ?>">
  <label class="custom-control-label" for="<?= $parking['type'] ?>"><?= $parking['type'] ?></label>
</div>
<?php } ?>


<h6 class="mt-1 font-weight-bold">Copropriété</h6>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="coprooui" name="subdivision" value="1" required>
  <label class="custom-control-label" for="coprooui">oui</label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="copronon" name="subdivision" value="0">
  <label class="custom-control-label" for="copronon">non</label>
</div>

<h6 class="mt-1 font-weight-bold">Etage</h6>
<input type="number" class="mb-4" id="etage" name="floor" min="0" max="20" value="0">

<h6 class="mt-1 font-weight-bold">Charges (en euros)</h6>
<input type="number" class="mb-4" id="charge" name="charge" min="0" max="10000" value="0">

<h6 class="mt-1 font-weight-bold">Nbre de pièces</h6>
<input type="number" class="mb-4" id="room" name="room" min="0" max="20" value="0">

<h6 class="mt-1 font-weight-bold">Nbre de chambres</h6>
<input type="number" class="mb-4" id="bedroom" name="bedroom" min="0" max="20" value="0">

<h6 class="mt-1 font-weight-bold">Salle de bain</h6>
<input type="number" class="mb-4" id="sdb" name="bathroom" min="0" max="10" value="0">

<h6 class="mt-1 font-weight-bold">Toilettes</h6>
<input type="number" class="mb-4" id="toilet" name="toilet" min="0" max="10" value="0">

<h6 class="mt-1 font-weight-bold">Garage</h6>
<input type="number" class="mb-4" id="garage" name="garage" min="0" max="10" value="0">

<h6 class="mt-1 font-weight-bold">Sous-sol</h6>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="basementoui" name="basement" value="1" required>
  <label class="custom-control-label" for="basementoui">oui</label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="basementnon" name="basement" value="0">
  <label class="custom-control-label" for="basementnon">non</label>
</div>


<h6 class="mt-1 font-weight-bold">Surface</h6>
<input type="number" class="mb-4" id="surface" name="surface" min="0" max="10000" value="0">

<h6 class="mt-1 font-weight-bold">Terrain</h6>
<input type="number" class="mb-4" id="land" name="land" min="0" max="10000" value="0">

<h6 class="mt-1 font-weight-bold">Prix (en euros)</h6>
<input type="number" class="mb-4" id="price" name="price" min="0" value="0">

<h6 class="mt-1 font-weight-bold">Date Disponible</h6>
<input type="date" class="mb-4" id="periode" name="periode" value="">

<h6 class="mt-1 font-weight-bold">Diagnostique Energetique</h6>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="diagoui" name="diagenergy" value="1" required>
  <label class="custom-control-label" for="diagoui">oui</label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="diagnon" name="diagenergy" value="0">
  <label class="custom-control-label" for="diagnon">non</label>
</div>

<h6 class="mt-1 font-weight-bold">GES</h6>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="gesoui" name="ges" value="1" required>
  <label class="custom-control-label" for="gesoui">oui</label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="gesnon" name="ges" value="2">
  <label class="custom-control-label" for="gesnon">non</label>
</div>


<h6 class="mt-1 font-weight-bold">Statut</h6>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input" id="npublish" name="status" value="1" required>
  <label class="custom-control-label" for="npublish">non publiée</label> 
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="onhold" name="status" value="2">
  <label class="custom-control-label" for="onhold">en attente</label>
</div>

<div class="custom-control custom-radio custom-control-inline mb-4">
  <input type="radio" class="custom-control-input" id="publish" name="status" value="3">
  <label class="custom-control-label" for="publish">publiée</label>
</div>

<div class="text-center"> <input class="btn btn-info btn-block my-4" type="submit" value="créer l'annonce"></div>
</form>
<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>