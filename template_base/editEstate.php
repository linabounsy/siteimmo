<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

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


<form action="index.php?action=editestate&id=<?= $estate['id'] ?>" method="post" enctype="multipart/form-data" id="modifyestate" novalidate>

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
      <div id="collapse96" class="collapse show" role="tabpanel" aria-labelledby="heading96" >
        <div class="card-body">
          <input class="form-control w-50" type="text" id="title" name="title" placeholder="Titre" value="<?= htmlspecialchars($estate['title']) ?>">

          <p id="error_title" class="error"><?=isset($msgerror['title']) ? $msgerror['title'] : ''?></p>


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
      <div id="collapse97" class="collapse <?= ($estate['description']) ? 'show' : null ?>" data-toggle="collapse" role="tabpanel" aria-labelledby="heading97" >
        <div class="card-body">
          <textarea id="description" name="description"><?= htmlspecialchars($estate['description']) ?></textarea>
          <p id="error_description" class="error"><?=isset($msgerror['description']) ? $msgerror['description'] : ''?></p>
        </div>

      </div>

    </div>


    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading98">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text"  data-toggle="collapse" href="#collapse98" aria-expanded="false" aria-controls="collapse98">
            Client <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse98" class="collapse <?= ($estate['client']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading98" >
        <div class="card-body">

          <select id="client" class="form-control w-50" name="client" value="<?= $estate['client'] ?>">
            <option value="choisir un client"><?= (ucfirst($estate['lastname'])) ?> <?= (ucfirst($estate['firstname'])) ?></option>
            <?php foreach ($clients as $client) { ?>

              <option value="<?= $estate['client'] ?>" <?= ($estate['client']) == ($client['id']) ? 'selected="selected"' : ''?>><?= (ucfirst($client['lastname'])) ?> <?= (ucfirst($client['firstname'])) ?></option>

            <?php } ?>
          </select>
          <p id="error_client" class="error"><?=isset($msgerror['client']) ? $msgerror['client'] : ''?></p>
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
      <div id="collapse99"  class="collapse  <?= ($estate['category']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading99" >
        <div class="card-body">
          <?php foreach ($categories as $category) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="categorybut">
              <input type="radio" class="custom-control-input" id="<?= $category['id'] ?>" name="category" value="<?= $estate['category'] ?>" <?=($estate['category_id']) == ($category['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $category['id'] ?>"><?= (ucfirst($category['name'])) ?></label>
            </div>

          <?php } ?>
          <div>
          <p id="error_categorybut" class="error"><?=isset($msgerror['category']) ? $msgerror['category'] : ''?></p>
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
      <div id="collapse100" class="collapse <?= ($estate['name']) ? 'show' : null ?>" role="tabpanel" id="type" aria-labelledby="heading100" >
        <div class="card-body">
          <?php foreach ($types as $type) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="typebut">
              <input type="radio" class="custom-control-input" id="<?= $type['name'] ?>" name="type" value="<?= $estate['name'] ?>" <?=($estate['type_id']) == ($type['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $type['name'] ?>"><?= (ucfirst($type['name'])) ?></label>

            </div>
          <?php } ?>
          <div>
          <p id="error_typebut" class="error"><?=isset($msgerror['type']) ? $msgerror['type'] : ''?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading30">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse130"  aria-expanded="false" aria-controls="collapse130">
            Localisation <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse130" class="collapse <?= ($estate['address']) ? 'show' : null ?> <?= ($estate['city']) ? 'show' : null ?> <?= ($estate['postcode']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading130" >
        <div class="card-body w-100">

          <div class="custom-control-inline">
            <input class="form-control w-50 mr-2" type="text" id="address" name="address" placeholder="Adresse" value="<?= htmlspecialchars($estate['address']) ?>">
            <input class="form-control w-25 mr-2" type="text" id="city" name="city" placeholder="Ville" value="<?= htmlspecialchars($estate['city']) ?>">
            <input class="form-control w-25" type="number" id="postcode" name="postcode" placeholder="Code postal" value="<?= htmlspecialchars($estate['postcode']) ?>">

          </div>
          <p id="error_localisation" class="error"><?=isset($msgerror['address']) ? $msgerror['address'] : ''?>  <?=isset($msgerror['postcode']) ? $msgerror['postcode'] : ''?></p>

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
      <div id="collapse101" class="collapse <?= ($estate['construction']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading101" >
        <div class="card-body">
          <div class="custom-control-inline">
            <input type="date" id="construction" name="construction" class="form-control" value="<?= ($estate['construction']) ?>">
          </div>
          <p id="error_construction" class="error"><?=isset($msgerror['construction']) ? $msgerror['construction'] : ''?></p>
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
      <div id="collapse102" class="collapse <?= ($estate['exposure']) ? 'show' : null ?>" role="tabpanel" id="exposure" aria-labelledby="heading102" >
        <div class="card-body">
          <?php foreach ($exposures as $exposure) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="exposurebut">
              <input type="checkbox" class="custom-control-input" id="<?= $exposure['name'] ?>" name="exposure" value="<?= $estate['exposure'] ?>" <?=($estate['exposure_id']) == ($exposure['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $exposure['name'] ?>"><?= (ucfirst($exposure['name'])) ?></label>
            </div>
          <?php } ?>
          <p id="error_exposurebut" class="error"><?=isset($msgerror['exposure']) ? $msgerror['exposure'] : ''?></p>
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
      <div id="collapse108" class="collapse <?= ($estate['price']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading108" >
        <div class="card-body">
          <div class="control-inline">
            <input class="form-control d-inline w-25" type="number" id="price" name="price" value="<?= ($estate['price']) ?>"><span class="euros"> euros</span>
          </div>
          <p id="error_price" class="error"><?=isset($msgerror['price']) ? $msgerror['price'] : ''?></p>
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
      <div id="collapse110" class="collapse <?= ($estate['charge']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading110" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="charge" name="charge" value="<?= ($estate['charge']) ?>"><span class="euros"> euros</span>
        </div>
        <p id="error_charge" class="error"><?=isset($msgerror['charge']) ? $msgerror['charge'] : ''?></p>
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
      <div id="collapse106" class="collapse" role="tabpanel" id="subdivision" aria-labelledby="heading106" >
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline" id="subdivisionyesbut">
            <input type="radio" class="custom-control-input" id="coprooui" name="subdivision" value="1" required>
            <label class="custom-control-label" for="coprooui">Oui</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline" id="subdivisionnobut">
            <input type="radio" class="custom-control-input" id="copronon" name="subdivision" value="0">
            <label class="custom-control-label" for="copronon">Non</label>
          </div>
          <p id="error_subdivisionbut" class="error"><?=isset($msgerror['subdivision']) ? $msgerror['subdivision'] : ''?></p>
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
      <div id="collapse107" class="collapse <?= ($estate['surface']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading107" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="surface" name="surface" min="0" max="10000" value="<?= ($estate['surface']) ?>"><span> m²</span>
        </div>
        <p id="error_surface" class="error"><?=isset($msgerror['surface']) ? $msgerror['surface'] : ''?></p>
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
      <div id="collapse109" class="collapse <?= ($estate['land']) ? 'show' : null ?>" id="land" role="tabpanel" aria-labelledby="heading109" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control w-25 d-inline" type="number" id="land" name="land" min="0" max="10000" value="<?= ($estate['land']) ?>"><span> m²</span>
        </div>
        <p id="error_land" class="error"><?=isset($msgerror['land']) ? $msgerror['land'] : ''?></p>
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
      <div id="collapse111" class="collapse <?= ($estate['floor']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading111" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control w-25" type="number" id="floor" name="floor" min="0" max="20" value="<?= ($estate['floor']) ?>">
        </div>
        <p id="error_floor" class="error"><?=isset($msgerror['floor']) ? $msgerror['floor'] : ''?></p>
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
      <div id="collapse112" class="collapse <?= ($estate['room']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading112" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-line w-25" type="number" id="room" name="room" min="0" max="20" value="<?= ($estate['room']) ?>">
        </div>
        <p id="error_room" class="error"><?=isset($msgerror['room']) ? $msgerror['room'] : ''?></p>
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
      <div id="collapse113" class="collapse <?= ($estate['bedroom']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading113" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="bedroom" name="bedroom" min="0" max="20" value="<?= ($estate['bedroom']) ?>">
        </div>
        <p id="error_bedroom" class="error"><?=isset($msgerror['bedroom']) ? $msgerror['bedroom'] : ''?></p>
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
      <div id="collapse114" class="collapse <?= ($estate['bathroom']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading114" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="bathroom" name="bathroom" min="0" max="10" value="<?= ($estate['bathroom']) ?>">
        </div>
        <p id="error_bathroom" class="error"><?=isset($msgerror['bathroom']) ? $msgerror['bathroom'] : ''?></p>
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
      <div id="collapse115" class="collapse <?= ($estate['toilet']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading115" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="toilet" name="toilet" min="0" max="10" value="<?= ($estate['toilet']) ?>">
        </div>
        <p id="error_toilet" class="error"><?=isset($msgerror['toilet']) ? $msgerror['toilet'] : ''?></p>
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
      <div id="collapse104" class="collapse <?= ($estate['kitchen']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading104" >
        <div class="card-body">
        <div class="control-inline">
          <?php foreach ($kitchens as $kitchen) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="kitchenbut">
              <input type="radio" class="custom-control-input" id="<?= $kitchen['type'] ?>" name="kitchen" value="<?= ($estate['kitchen']) ?>" <?=($estate['kitchen_id']) == ($kitchen['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $kitchen['type'] ?>"><?= (ucfirst($kitchen['type'])) ?></label>
            </div>
          <?php } ?>
        </div>
        <p id="error_kitchenbut" class="error"><?=isset($msgerror['kitchen']) ? $msgerror['kitchen'] : ''?></p>
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
      <div id="collapse103" class="collapse <?= ($estate['heating']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading103" >
        <div class="card-body">
          <?php foreach ($heatings as $heating) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="heatingbut" >
              <input type="checkbox" class="custom-control-input" id="<?= $heating['type'] ?>" name="heating" value="<?= $estate['heating'] ?>" <?=($estate['heating_id']) == ($heating['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $heating['type'] ?>"><?= (ucfirst($heating['type'])) ?></label>
            </div>
          <?php } ?>
          <p id="error_heatingbut" class="error"><?=isset($msgerror['heating']) ? $msgerror['heating'] : ''?></p>
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
      <div id="collapse105" class="collapse <?= ($estate['parking']) ? 'show' : null ?>" id="parking" role="tabpanel" aria-labelledby="heading105" >
        <div class="card-body">
          <?php foreach ($parkings as $parking) { ?> 
            <div class="custom-control custom-radio custom-control-inline" id="parkingbut">
              <input type="checkbox" class="custom-control-input" id="<?= $parking['type'] ?>" name="parking" value="<?= ($estate['parking']) ?>" <?=($estate['parking_id']) == ($parking['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="<?= $parking['type'] ?>"><?= (ucfirst($parking['type'])) ?></label>
            </div>
          <?php } ?>
          <p id="error_parkingbut" class="error"><?=isset($msgerror['parking']) ? $msgerror['parking'] : ''?></p>
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
      <div id="collapse116" class="collapse <?= ($estate['garage']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading116" >
        <div class="card-body">
        <div class="control-inline">
          <input class="form-control d-inline w-25" type="number" id="garage" name="garage" min="0" max="10" value="<?= ($estate['garage']) ?>">
        </div>
        <p id="error_garage" class="error"><?=isset($msgerror['garage']) ? $msgerror['garage'] : ''?></p>
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
      <div id="collapse117" class="collapse <?= ($estate['basement']) !== '1' || ($estate['basement']) !== '0' ? 'show' : null ?>" id="basement" role="tabpanel" aria-labelledby="heading117" >
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline" id="basementyesbut">
            <input type="radio" class="custom-control-input" id="basementoui" name="basement" value="<?= ($estate['basement']) ?>" <?=($estate['basement']) == '1' ? 'checked="checked"' : null?>>
            <label class="custom-control-label" for="basementoui">Oui</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline" id="basementnobut">
            <input type="radio" class="custom-control-input" id="basementnon" name="basement" value="<?= ($estate['basement']) ?>" <?=($estate['basement']) == '0' ? 'checked="checked"' : null?>>
            <label class="custom-control-label" for="basementnon">Non</label>
          </div>

          <p id="error_basementput" class="error"><?=isset($msgerror['basement']) ? $msgerror['basement'] : ''?></p>
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
      <div id="collapse118" class="collapse <?= ($estate['diagenergy']) !== '1' || ($estate['diagenergy']) !== '0' ? 'show' : null ?>" role="tabpanel" id="diagenergy" aria-labelledby="heading118" >
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline" id="diagenergyyesbut">
            <input type="radio" class="custom-control-input" id="diagoui" name="diagenergy" value="<?= ($estate['diagenergy']) ?>" <?=($estate['diagenergy']) == '1' ? 'checked="checked"' : null?>>
            <label class="custom-control-label" for="diagoui">Oui</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline" id="diagenergynobut">
            <input type="radio" class="custom-control-input" id="diagnon" name="diagenergy" value="<?= ($estate['diagenergy']) ?>" <?=($estate['diagenergy']) == '0' ? 'checked="checked"' : null?>>
            <label class="custom-control-label" for="diagnon">Non</label>
          </div>
          <p id="error_diagenergybut" class="error"><?=isset($msgerror['diagenergy']) ? $msgerror['diagenergy'] : ''?></p>
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
      <div id="collapse123" class="collapse <?= ($estate['energyclass']) ? 'show' : null ?>" role="tabpanel" id="energyclass" aria-labelledby="heading130" >
        <div class="card-body">
          <?php foreach ($energyclasses as $energyclass) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="energyclassbut">
              <input type="radio" class="custom-control-input" id="energy-<?= $energyclass['id'] ?>" name="energyclass" value="<?= $estate['energyclass'] ?>" <?=($estate['energyclass_id']) == ($energyclass['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="energy-<?= $energyclass['id'] ?>"><?= (ucfirst($energyclass['name'])) ?></label>
            </div>

          <?php } ?>
          <p id="error_energyclassbut" class="error"><?=isset($msgerror['energyclass']) ? $msgerror['energyclass'] : ''?></p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header blue lighten-3 z-depth-1" role="tab" id="heading140">
        <h5 class="text-uppercase mb-0 py-1">
          <a class="collapsed font-weight-bold white-text" data-toggle="collapse" href="#collapse140" id="ges" aria-expanded="false" aria-controls="collapse140">
            GES <i class="fas fa-angle-down rotate-icon"></i>
          </a>
        </h5>
      </div>
      <div id="collapse140" class="collapse <?= ($estate['ges']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading140" >
        <div class="card-body">
          <?php foreach ($geses as $ges) { ?>
            <div class="custom-control custom-radio custom-control-inline" id="gesbut">
              <input type="radio" class="custom-control-input" id="ges-<?= $ges['id'] ?>" name="ges" value="<?= $estate['ges'] ?>" <?=($estate['ges_id']) == ($ges['id']) ? 'checked="checked"' : null?>>
              <label class="custom-control-label" for="ges-<?= $ges['id'] ?>"><?= (ucfirst($ges['name'])) ?></label>

            </div>

          <?php } ?>
          <p id="error_gesbut" class="error"><?=isset($msgerror['ges']) ? $msgerror['ges'] : ''?></p>
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
      <div id="collapse120" class="collapse <?= !empty($msgerror['periode']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading120" >
        <div class="card-body">
        <div class="custom-control-inline">
          <input type="date" id="periode" name="periode">
        </div>
        <p id="error_periode" class="error"><?=isset($msgerror['periode']) ? $msgerror['periode'] : ''?></p>
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
      <div id="collapse121" class="collapse <?= ($estate['picture']) ? 'show' : null ?>" role="tabpanel" aria-labelledby="heading121" >
        <div class="card-body">
        <div class="custom-control-inline">
          <input type="file" id="picture" name="picture" accept="image/png, image/jpg" <?=($estate['picture']) ? $estate['picture'] : null?>>
        </div>
        <p id="error_picture" class="error"><?=isset($msgerror['picture']) ? $msgerror['picture'] : ''?></p>
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
      <div id="collapse122" class="collapse <?= !empty($msgerror['status']) ? 'show' : null ?>" id="status" role="tabpanel" aria-labelledby="heading122" >
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline" id="nopublishbut">
            <input type="radio" class="custom-control-input" id="npublish" name="status" value="1" required>
            <label class="custom-control-label" for="npublish">Non publiée</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline" id="onholdbut">
            <input type="radio" class="custom-control-input" id="onhold" name="status" value="2">
            <label class="custom-control-label" for="onhold">En attente</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline" id="publishbut">
            <input type="radio" class="custom-control-input" id="publish" name="status" value="3">
            <label class="custom-control-label" for="publish">Publiée</label>
          </div>
          <p id="error_statusbut" class="error"><?=isset($msgerror['status']) ? $msgerror['status'] : ''?></p>
        </div>
      </div>
    </div>

  </div>
  <!--Accordion wrapper-->

  <div class="text-center"><input class="light blue lighten-4 my-4 btn-lg  text-lg font-weight-bold black-text" type="submit" value="modifier l'annonce" name="modifyestate"></div>
</form>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>
<?php
require('../template_base/templateadmin.php');
?>