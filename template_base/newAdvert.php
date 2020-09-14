<?php ob_start(); ?>


<!--Tiny MCE-->
<script src="https://cdn.tiny.cloud/1/6bohqh7pqbv8wpu4q6e2l466rt3paa5rbh88c15p6zrbbds6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#description',
    forced_root_block: ""

  });
</script>
<!--Fin Tiny MCE-->

<a href="index.php?action=indexadmin" class="btn btn-info btn-md my-4">Revenir à la page précédente</a>

<form action="index.php?action=newadvert" method="post" enctype="multipart/form-data" novalidate>

  <!--Accordion wrapper-->
  <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading96">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="white-text font-weight-bold" data-toggle="collapse" href="#collapse96" aria-expanded="true" aria-controls="collapse96">
            Titre de l'annonce <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse96" class="collapse show" role="tabpanel" aria-labelledby="heading96" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="text" id="title" name="title" placeholder="Titre" required>
      

        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading97">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse97" aria-expanded="false" aria-controls="collapse97">
            Description <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse97" class="collapse" role="tabpanel" aria-labelledby="heading97" data-parent="">
        <div class="card-body">
          <textarea id="description" name="description"></textarea>
        </div>
      </div>
    </div>
    

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading98">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse98" aria-expanded="false" aria-controls="collapse98">
            Client <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse98" class="collapse" role="tabpanel" aria-labelledby="heading98" data-parent="">
        <div class="card-body">

          

        <select id="client" class="form-control w-50" name="client" value="<?= $client['id'] ?>">
        <option value="choisir un client">Choisir un client</option>
            <?php foreach ($clients as $client) { ?>
              
              <option value="<?= $client['id'] ?>"><?= (ucfirst($client['lastname'])) ?> <?= (ucfirst($client['firstname'])) ?></option>

            <?php } ?>
          </select>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading99">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse99" aria-expanded="false" aria-controls="collapse99">
            Catégorie <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse99" class="collapse" role="tabpanel" aria-labelledby="heading99" data-parent="">
        <div class="card-body">
        <?php foreach ($categories as $category) { ?>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="location" name="category" value="1" required>
            <label class="custom-control-label" for="location"><?= (ucfirst($category['name'])) ?></label>
          </div>
      
          <?php } ?>
          <div>
                <p class="error"><?= isset($msgerror['category']) ? $msgerror['category'] : 'pas de message' ?></p>
              </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading100">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse100" aria-expanded="false" aria-controls="collapse100">
            Type <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse100" class="collapse" role="tabpanel" aria-labelledby="heading100" data-parent="">
        <div class="card-body">
          <?php foreach ($types as $type) { ?>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="<?= $type['name'] ?>" name="type" value="<?= $type['id'] ?>"
       
                >
              <label class="custom-control-label" for="<?= $type['name'] ?>"><?= (ucfirst($type['name'])) ?></label>
              
            </div>
          <?php } ?>
          <div class="collapse<?= !empty($msgerror) ?> show" data-toogle="collapse">
          <p class="error" ><?= isset($msgerror['type']) ? $msgerror['type'] : '' ?> </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading30">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse130" aria-expanded="false" aria-controls="collapse130">
            Localisation <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse130" class="collapse" role="tabpanel" aria-labelledby="heading130" data-parent="">
        <div class="card-body w-100">
         
            <div class="custom-control custom-radio custom-control-inline">
            <input class="form-control w-50 mr-2" type="text" id="address" name="address" placeholder="Adresse" required>
            <input class="form-control w-25 mr-2" type="text" id="city" name="city" placeholder="Ville" required>
            <input class="form-control w-25" type="number" id="postcode" name="postcode" placeholder="Code postal" required>
            </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading101">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse101" aria-expanded="false" aria-controls="collapse101">
            Année de construction <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse101" class="collapse" role="tabpanel" aria-labelledby="heading101" data-parent="">
        <div class="card-body">
          
          <input type="date" id="constrution" name="construction">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading102">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse102" aria-expanded="false" aria-controls="collapse102">
            Exposition <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse102" class="collapse" role="tabpanel" aria-labelledby="heading102" data-parent="">
        <div class="card-body">
          <?php foreach ($exposures as $exposure) { ?>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="<?= $exposure['name'] ?>" name="exposure" value="<?= $exposure['id'] ?>">
              <label class="custom-control-label" for="<?= $exposure['name'] ?>"><?= (ucfirst($exposure['name'])) ?></label>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading108">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse108" aria-expanded="false" aria-controls="collapse108">
            Prix <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse108" class="collapse" role="tabpanel" aria-labelledby="heading108" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="price" name="price" min="0" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading110">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse110" aria-expanded="false" aria-controls="collapse110">
            Charges <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse110" class="collapse" role="tabpanel" aria-labelledby="heading110" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="charge" name="charge" min="0" max="10000" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading106">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse106" aria-expanded="false" aria-controls="collapse106">
            Copropriété <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse106" class="collapse" role="tabpanel" aria-labelledby="heading106" data-parent="">
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="coprooui" name="subdivision" value="1" required>
            <label class="custom-control-label" for="coprooui">Oui</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="copronon" name="subdivision" value="0">
            <label class="custom-control-label" for="copronon">Non</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading107">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse107" aria-expanded="false" aria-controls="collapse107">
            Surface <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse107" class="collapse" role="tabpanel" aria-labelledby="heading107" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="surface" name="surface" min="0" max="10000" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading109">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse109" aria-expanded="false" aria-controls="collapse109">
            Terrain <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse109" class="collapse" role="tabpanel" aria-labelledby="heading109" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="land" name="land" min="0" max="10000" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading111">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse111" aria-expanded="false" aria-controls="collapse111">
            Etage <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse111" class="collapse" role="tabpanel" aria-labelledby="heading111" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="floor" name="floor" min="0" max="20" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading112">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse112" aria-expanded="false" aria-controls="collapse112">
            Nbre de pièces<i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse112" class="collapse" role="tabpanel" aria-labelledby="heading112" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="room" name="room" min="0" max="20" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading113">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse113" aria-expanded="false" aria-controls="collapse113">
            Nbre de chambres <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse113" class="collapse" role="tabpanel" aria-labelledby="heading113" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="bedroom" name="bedroom" min="0" max="20" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading114">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse114" aria-expanded="false" aria-controls="collapse114">
            Salle de bain <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse114" class="collapse" role="tabpanel" aria-labelledby="heading114" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="sdb" name="bathroom" min="0" max="10" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading115">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse115" aria-expanded="false" aria-controls="collapse115">
            Toilettes <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse115" class="collapse" role="tabpanel" aria-labelledby="heading115" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="toilet" name="toilet" min="0" max="10" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading104">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse104" aria-expanded="false" aria-controls="collapse104">
            Cuisine <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse104" class="collapse" role="tabpanel" aria-labelledby="heading104" data-parent="">
        <div class="card-body">
          <?php foreach ($kitchens as $kitchen) { ?>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="<?= $kitchen['type'] ?>" name="kitchen" value="<?= $kitchen['id'] ?>">
              <label class="custom-control-label" for="<?= $kitchen['type'] ?>"><?= (ucfirst($kitchen['type'])) ?></label>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading103">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse103" aria-expanded="false" aria-controls="collapse103">
            Type de chauffage <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse103" class="collapse" role="tabpanel" aria-labelledby="heading103" data-parent="">
        <div class="card-body">
          <?php foreach ($heatings as $heating) { ?>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="<?= $heating['type'] ?>" name="heating" value="<?= $heating['id'] ?>">
              <label class="custom-control-label" for="<?= $heating['type'] ?>"><?= (ucfirst($heating['type'])) ?></label>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading105">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse105" aria-expanded="false" aria-controls="collapse105">
            Parking <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse105" class="collapse" role="tabpanel" aria-labelledby="heading105" data-parent="">
        <div class="card-body">
          <?php foreach ($parkings as $parking) { ?> <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="<?= $parking['type'] ?>" name="parking" value="<?= $parking['id'] ?>">
              <label class="custom-control-label" for="<?= $parking['type'] ?>"><?= (ucfirst($parking['type'])) ?></label>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading116">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse116" aria-expanded="false" aria-controls="collapse116">
            Garages <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse116" class="collapse" role="tabpanel" aria-labelledby="heading116" data-parent="">
        <div class="card-body">
          <input class="form-control w-50" type="number" id="garage" name="garage" min="0" max="10" value="0">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading117">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse117" aria-expanded="false" aria-controls="collapse117">
            Sous-sol <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse117" class="collapse" role="tabpanel" aria-labelledby="heading117" data-parent="">
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="basementoui" name="basement" value="1" required>
            <label class="custom-control-label" for="basementoui">Oui</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline mb-4">
            <input type="radio" class="custom-control-input" id="basementnon" name="basement" value="0">
            <label class="custom-control-label" for="basementnon">Non</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading118">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse118" aria-expanded="false" aria-controls="collapse118">
            Diagnostique Energetique <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse118" class="collapse" role="tabpanel" aria-labelledby="heading118" data-parent="">
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="diagoui" name="diagenergy" value="1" required>
            <label class="custom-control-label" for="diagoui">Oui</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline mb-4">
            <input type="radio" class="custom-control-input" id="diagnon" name="diagenergy" value="0">
            <label class="custom-control-label" for="diagnon">Non</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading123">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse123" aria-expanded="false" aria-controls="collapse123">
            Classe Energetique <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse123" class="collapse" role="tabpanel" aria-labelledby="heading130" data-parent="">
        <div class="card-body">
        <?php foreach ($energyclasses as $energyclass) { ?> 
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="energy-<?= $energyclass['id'] ?>" name="energyclass" value="<?= $energyclass['id'] ?>" required>
            <label class="custom-control-label" for="energy-<?= $energyclass['id'] ?>"><?= (ucfirst($energyclass['name'])) ?></label>
          </div>
      
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading119">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse119" aria-expanded="false" aria-controls="collapse119">
            GES <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse119" class="collapse" role="tabpanel" aria-labelledby="heading119" data-parent="">
        <div class="card-body">
        <?php foreach ($geses as $ges) { ?>
          <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="<?= $ges['id'] ?>" name="ges" value="<?= $ges['id'] ?>" required>
              <label class="custom-control-label" for="<?= $ges['id'] ?>"><?= (ucfirst($ges['name'])) ?></label>
      
          </div>
       
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading120">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse120" aria-expanded="false" aria-controls="collapse120">
            Date de disponibilité <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse120" class="collapse" role="tabpanel" aria-labelledby="heading120" data-parent="">
        <div class="card-body">
         
          <input type="date" id="periode" name="periode">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading121">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse121" aria-expanded="false" aria-controls="collapse121">
            Photos <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse121" class="collapse" role="tabpanel" aria-labelledby="heading121" data-parent="">
        <div class="card-body">
          <input type="file" id="picture" name="picture" accept="image/png, image/jpg">
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading122">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse122" aria-expanded="false" aria-controls="collapse122">
            Statut de l'annonce <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse122" class="collapse" role="tabpanel" aria-labelledby="heading122" data-parent="">
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="npublish" name="status" value="1" required>
            <label class="custom-control-label" for="npublish">Non publiée</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline mb-4">
            <input type="radio" class="custom-control-input" id="onhold" name="status" value="2">
            <label class="custom-control-label" for="onhold">En attente</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline mb-4">
            <input type="radio" class="custom-control-input" id="publish" name="status" value="3">
            <label class="custom-control-label" for="publish">Publiée</label>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--Accordion wrapper-->

  <div class="text-center"><input class="light blue lighten-4 my-4 btn-lg  text-lg font-weight-bold black-text" type="submit" value="créer l'annonce" name="newadvert"></div>
</form>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>