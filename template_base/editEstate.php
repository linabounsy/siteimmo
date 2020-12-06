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


<a href="index.php?action=indexadmin" class="btn blue white-text btn-md my-4">Revenir à la page précédente</a>


<form action="index.php?action=newadvert" method="post" enctype="multipart/form-data" novalidate>

    <div class="row">

        <!-- Grid column -->
        <div class="col-lg-12 col-md-12 mb-12">

            <!-- Panel -->
            <div class="card">

                <div class="card-header white-text blue">
                    Informations Générales
                </div>

                <div class="card-body text-center">
                    <div class="list-group list-group-flush">

                        <div class="md-form m-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between">Titre de l'annonce</h6>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Titre" required value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : htmlspecialchars($estate['title']) ?>">
                            <p id="error_title" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['title']) ? $estateValidate->getMsgerror()['title'] : '' ?></p>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4 mb-4">Description du bien</h6>
                            <textarea id="description" name="description"><?= isset($_POST['description']) ? ($_POST['description']) : ($estate['description']) ?></textarea>
                            <p id="error_description" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['description']) ? $estateValidate->getMsgerror()['description'] : '' ?></p>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4 mb-4">Client</h6>
                            <select id="client" class="form-control w-50" name="client">
                                <option value="0" selected>Choisir son client</option>
                                <?php foreach ($clients as $client) { ?>
                                    <?php
                                    $selected = '';
                                    if (isset($_POST['client'])) {
                                        if ($_POST['client'] == $client['id']) {
                                            $selected = 'selected';
                                        }
                                    } else {
                                        if ($estate['client'] == $client['id']) {
                                            $selected = 'selected';
                                        }
                                    }

                                    ?>
                                    <option value="<?= $client['id'] ?>" <?= $selected ?>><?= (ucfirst($client['lastname'])) ?> <?= (ucfirst($client['firstname'])) ?></option>
                                <?php } ?>
                            </select>
                            <p id="error_client" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['client']) ? $estateValidate->getMsgerror()['client'] : '' ?></p>
                        </div>


                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-2">Catégorie</h6>
                            <div class="card-body text-left p-0">
                                <?php foreach ($categories as $category) { ?>
                                    <div class="custom-control custom-radio custom-control-inline" id="categorybut">
                                        <?php
                                        $checked = '';
                                        if (isset($_POST['category'])) {
                                            if ($_POST['category'] == $category['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        } else {
                                            if ($estate['category_id'] == $category['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        }
                                        ?>
                                        <input type="radio" class="custom-control-input" id="<?= $category['name'] ?>" name="category" value="<?= $category['id'] ?>" <?= $checked; ?>>
                                        <label class="custom-control-label" for="<?= $category['name'] ?>"><?= (ucfirst($category['name'])) ?></label>
                                    </div>
                                <?php } ?>
                                <div>
                                    <p id="error_categorybut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['category']) ? $estateValidate->getMsgerror()['category'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Type</h6>
                            <div class="card-body text-left p-0">
                                <?php foreach ($types as $type) { ?>
                                    <div class="custom-control custom-radio custom-control-inline" id="typebut">
                                        <?php
                                        $checked = '';
                                        if (isset($_POST['type'])) {
                                            if ($_POST['type'] == $type['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        } else {
                                            if ($estate['type_id'] == $type['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        }
                                        ?>
                                        <input type="radio" class="custom-control-input" id="<?= $type['name'] ?>" name="type" value="<?= $type['id'] ?>" <?= $checked; ?>>
                                        <label class="custom-control-label" for="<?= $type['name'] ?>"><?= (ucfirst($type['name'])) ?></label>

                                    </div>
                                <?php } ?>
                                <div>
                                    <p id="error_typebut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['type']) ? $estateValidate->getMsgerror()['type'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Année de construction</h6>
                            <div class="card-body text-left p-0">
                                <div class="md-form mt-2">
                                    <input type="text" class="form-control datepicker" placeholder="Choisissez une date" id="construction" name="construction" class="form-control" value="<?= date_format(date_create($estate['construction']), 'Y') ?>">
                                    <label for="choissez une année"></label>
                                </div>
                                <p id="error_construction" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['construction']) ? $estateValidate->getMsgerror()['construction'] : '' ?></p>
                            </div>
                        </div>


                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-2">Localisation</h6>
                            <div class="card-body text-left p-0">

                                <div class="custom-control-inline">
                                    <input class="form-control w-50 mr-2" type="text" id="address" name="address" placeholder="Adresse" value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : htmlspecialchars($estate['address']) ?>">
                                    <input class="form-control w-25 mr-2" type="text" id="city" name="city" placeholder="Ville" value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : htmlspecialchars($estate['city']) ?>">
                                    <input class="form-control w-25" type="number" id="postcode" name="postcode" placeholder="Code postal" value="<?= isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : htmlspecialchars($estate['postcode']) ?>">

                                </div>
                                <p id="error_localisation" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['address']) ? $estateValidate->getMsgerror()['address'] : '' ?>
                                    <?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['city']) ? $estateValidate->getMsgerror()['city'] : '' ?>
                                    <?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['postcode']) ? $estateValidate->getMsgerror()['postcode'] : '' ?></p>

                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-2">Prix</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="price" name="price" min="0" value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : htmlspecialchars($estate['price']) ?>"><span class="euros"> euros</span>
                                </div>
                                <p id="error_price" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['price']) ? $estateValidate->getMsgerror()['price'] : '' ?></p>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Surface</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="surface" name="surface" min="0" max="10000" value="<?= isset($_POST['surface']) ? htmlspecialchars($_POST['surface']) : htmlspecialchars($estate['surface']) ?>"><span> m²</span>
                                </div>
                                <p id="error_surface" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['surface']) ? $estateValidate->getMsgerror()['surface'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Nbre de pièces</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-line w-25" type="number" id="room" name="room" min="0" max="20" value="<?= isset($_POST['room']) ? htmlspecialchars($_POST['room']) : htmlspecialchars($estate['room']) ?>">
                                </div>
                                <p id="error_room" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['room']) ? $estateValidate->getMsgerror()['room'] : '' ?></p>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Date de disponibilité</h6>
                            <div class="card-body text-left p-0">
                                <div class="md-form mt-2">
                                    <input type="text" class="form-control datepicker-periode" placeholder="Choisissez une date" id="periode" name="periode" class="form-control" value="<?= date_format(date_create($estate['periode']), 'd-m-Y') ?>">
                                    <p id="error_periode" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['periode']) ? $estateValidate->getMsgerror()['periode'] : '' ?></p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Panel -->
            </div>


            <div class="card">

                <div class="card-header white-text blue">
                    Informations Spécifiques
                </div>

                <div class="card-body text-center">
                    <div class="list-group list-group-flush">

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-2">Exposition</h6>
                            <div class="card-body text-left p-0">
                                <?php foreach ($exposures as $exposure) { ?>
                                    <div class="custom-control custom-radio custom-control-inline justify-content-between" id="exposurebut">
                                        <?php
                                        $checked = '';
                                        if (isset($_POST['exposure'])) {
                                            if ($_POST['exposure'] == $exposure['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        } else {
                                            if ($estate['exposure_id'] == $exposure['id']) {
                                                $checked = 'checked = checked';
                                            }
                                        }
                                        ?>
                                        <input type="radio" class="custom-control-input" id="<?= $exposure['name'] ?>" name="exposure" value="<?= $exposure['id'] ?>" <?= $checked; ?>>
                                        <label class="custom-control-label" for="<?= $exposure['name'] ?>"><?= (ucfirst($exposure['name'])) ?></label>
                                    </div>
                                <?php } ?>
                                <p id="error_exposurebut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['exposure']) ? $estateValidate->getMsgerror()['exposure'] : '' ?></p>
                            </div>
                        </div>


                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Charges</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="charge" name="charge" min="0" max="10000" value="<?= isset($_POST['charge']) ? htmlspecialchars($_POST['charge']) : htmlspecialchars($estate['charge']) ?>"><span class="euros"> euros</span>
                                </div>
                                <p id="error_charge" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['charge']) ? $estateValidate->getMsgerror()['charge'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Copropriété</h6>
                            <div class="card-body text-left p-0">
                                <div class="custom-control custom-radio custom-control-inline" id="subdivisionyesbut">
                                    <input type="radio" class="custom-control-input" id="coprooui" name="subdivision" value="1" <?= ($estate['subdivision']) == '1' ? 'checked="checked"' : null ?>>
                                    <label class="custom-control-label" for="coprooui">Oui</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline" id="subdivisionnobut">
                                    <input type="radio" class="custom-control-input" id="copronon" name="subdivision" value="0" <?= ($estate['subdivision']) == '0' ? 'checked="checked"' : null ?>>
                                    <label class="custom-control-label" for="copronon">Non</label>
                                </div>
                                <p id="error_subdivisionbut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['subdivision']) ? $estateValidate->getMsgerror()['subdivision'] : '' ?></p>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Terrain</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control w-25 d-inline" type="number" id="land" name="land" min="0" max="10000" value="<?= isset($_POST['land']) ? htmlspecialchars($_POST['land']) : htmlspecialchars($estate['land']) ?>"><span> m²</span>
                                </div>
                                <p id="error_land" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['land']) ? $estateValidate->getMsgerror()['land'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Etage</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control w-25" type="number" id="floor" name="floor" min="0" max="20" value="<?= isset($_POST['floor']) ? htmlspecialchars($_POST['floor']) : htmlspecialchars($estate['floor']) ?>">
                                </div>
                                <p id="error_floor" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['floor']) ? $estateValidate->getMsgerror()['floor'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Nbre de chambres</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="bedroom" name="bedroom" min="0" max="20" value="<?= isset($_POST['bedroom']) ? htmlspecialchars($_POST['bedroom']) : htmlspecialchars($estate['bedroom']) ?>">
                                </div>
                                <p id="error_bedroom" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['bedroom']) ? $estateValidate->getMsgerror()['bedroom'] : '' ?></p>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Salle de bain</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="bathroom" name="bathroom" min="0" max="10" value="<?= isset($_POST['bathroom']) ? htmlspecialchars($_POST['bathroom']) : htmlspecialchars($estate['bathroom']) ?>">
                                </div>
                                <p id="error_bathroom" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['bathroom']) ? $estateValidate->getMsgerror()['bathroom'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Toilettes</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="toilet" name="toilet" min="0" max="10" value="<?= isset($_POST['toilet']) ? htmlspecialchars($_POST['toilet']) : htmlspecialchars($estate['toilet']) ?>">
                                </div>
                                <p id="error_toilet" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['toilet']) ? $estateValidate->getMsgerror()['toilet'] : '' ?></p>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Cuisine</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <?php foreach ($kitchens as $kitchen) { ?>
                                        <div class="custom-control custom-radio custom-control-inline" id="kitchenbut">
                                            <?php
                                            $checked = '';
                                            if (isset($_POST['kitchen'])) {
                                                if ($_POST['kitchen'] == $kitchen['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            } else {
                                                if ($estate['kitchen_id'] == $kitchen['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            }
                                            ?>
                                            <input type="radio" class="custom-control-input" id="<?= $kitchen['type'] ?>" name="kitchen" value="<?= $kitchen['id'] ?>" <?= $checked; ?>>

                                            <label class="custom-control-label" for="<?= $kitchen['type'] ?>"><?= (ucfirst($kitchen['type'])) ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <p id="error_kitchenbut" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['kitchen']) ? $estateValidate->getMsgerror()['kitchen'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Type de chauffage</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <?php foreach ($heatings as $heating) { ?>
                                        <div class="custom-control custom-radio custom-control-inline" id="heatingbut">
                                            <?php
                                            $checked = '';
                                            if (isset($_POST['heating'])) {
                                                if ($_POST['heating'] == $heating['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            } else {
                                                if ($estate['heatings'] == $heating['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            }
                                            ?>
                                            <input type="checkbox" class="custom-control-input" id="<?= 'heating_' . $heating['id'] ?>" name="heating[]" value="<?= $heating['id'] ?>" <?= !empty($estate['heatings'][$heating['id']]) ? 'checked="checked"' : null ?>>
                                            <label class="custom-control-label" for="<?= 'heating_' . $heating['id'] ?>"><?= (ucfirst($heating['type'])) ?></label>
                                        </div>
                                    <?php } ?>
                                    <p id="error_heatingbut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['heating']) ? $estateValidate->getMsgerror()['heating'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Parking</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <?php foreach ($parkings as $parking) { ?>
                                        <div class="custom-control custom-radio custom-control-inline" id="parkingbut">
                                            <?php
                                            $checked = '';
                                            if (isset($_POST['parking'])) {
                                                if ($_POST['parking'] == $parking['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            } else {
                                                if ($estate['parking_id'] == $parking['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            }
                                            ?>
                                            <input type="radio" class="custom-control-input" id="<?= $parking['type'] ?>" name="parking" value="<?= $parking['id'] ?>" <?= $checked; ?>>
                                            <label class="custom-control-label" for="<?= $parking['type'] ?>"><?= (ucfirst($parking['type'])) ?></label>
                                        </div>
                                    <?php } ?>
                                    <p id="error_parkingbut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['parking']) ? $estateValidate->getMsgerror()['parking'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Garage</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <input class="form-control d-inline w-25" type="number" id="garage" name="garage" min="0" max="10" value="<?= isset($_POST['garage']) ? htmlspecialchars($_POST['garage']) : htmlspecialchars($estate['garage']) ?>">
                                </div>
                                <p id="error_garage" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['garage']) ? $estateValidate->getMsgerror()['garage'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Sous-Sol</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <div class="custom-control custom-radio custom-control-inline" id="basementyesbut">
                                        <input type="radio" class="custom-control-input" id="basementoui" name="basement" value="1" <?= ($estate['basement']) == '1' ? 'checked="checked"' : null ?>>
                                        <label class="custom-control-label" for="basementoui">Oui</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" id="basementnobut">
                                        <input type="radio" class="custom-control-input" id="basementnon" name="basement" value="0" <?= ($estate['basement']) == '0' ? 'checked="checked"' : null ?>>
                                        <label class="custom-control-label" for="basementnon">Non</label>
                                    </div>
                                    <p id="error_basementput" class="error"><?= isset($estateValidate) && isset($estateValidate->getMsgerror()['basement']) ? $estateValidate->getMsgerror()['basement'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Diagnostique Energétique</h6>
                            <div class="card-body text-left p-0">
                                <div class="custom-control custom-radio custom-control-inline" id="diagenergyyesbut">
                                    <input type="radio" class="custom-control-input" id="diagoui" name="diagenergy" value="1" <?= (isset($_POST['diagenergy'])) && $_POST['diagenergy'] == '1' ? 'checked="checked"' : null ?>>
                                    <label class="custom-control-label" for="diagoui">Oui</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline" id="diagenergynobut">
                                    <input type="radio" class="custom-control-input" id="diagnon" name="diagenergy" value="0" <?= ($estate['diagenergy']) == '0' ? 'checked="checked"' : null ?>>
                                    <label class="custom-control-label" for="diagnon">Non</label>
                                </div>
                                <p id="error_diagenergybut" class="error"> <?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['diagenergy']) ? $estateValidate->getMsgerror()['diagenergy'] : '' ?></p>
                            </div>
                        </div>

                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Classe Energétique</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <?php foreach ($energyclasses as $energyclass) { ?>
                                        <div class="custom-control custom-radio custom-control-inline" id="energyclassbut">
                                            <?php
                                            $checked = '';
                                            if (isset($_POST['energyclass'])) {
                                                if ($_POST['energyclass'] == $energyclass['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            } else {
                                                if ($estate['energyclass_id'] == $energyclass['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            }
                                            ?>
                                            <input type="radio" class="custom-control-input" id="energy-<?= $energyclass['id'] ?>" name="energyclass" value="<?= $energyclass['id'] ?>" <?= $checked; ?>>
                                            <label class="custom-control-label" for="energy-<?= $energyclass['id'] ?>"><?= (ucfirst($energyclass['name'])) ?></label>
                                        </div>

                                    <?php } ?>
                                    <p id="error_energyclassbut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['energyclass']) ? $estateValidate->getMsgerror()['energyclass'] : '' ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">GES</h6>
                            <div class="card-body p-0">
                                <div class="control-inline text-left p-0">
                                    <?php foreach ($geses as $ges) { ?>
                                        <div class="custom-control custom-radio custom-control-inline" id="gesbut">
                                            <?php
                                            $checked = '';
                                            if (isset($_POST['ges'])) {
                                                if ($_POST['ges'] == $ges['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            } else {
                                                if ($estate['ges_id'] == $ges['id']) {
                                                    $checked = 'checked = checked';
                                                }
                                            }
                                            ?>
                                            <input type="radio" class="custom-control-input" id="ges-<?= $ges['id'] ?>" name="ges" value="<?= $ges['id'] ?>" <?= $checked; ?>>
                                            <label class="custom-control-label" for="ges-<?= $ges['id'] ?>"><?= (ucfirst($ges['name'])) ?></label>
                                        </div>
                                    <?php } ?>
                                    <p id="error_gesbut" class="error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['ges']) ? $estateValidate->getMsgerror()['ges'] : '' ?></p>
                                </div>
                            </div>
                        </div>



                        <div class="justify-content-between p-0">
                            <h6 class="blue-text font-weight-bold d-flex justify-content-between mt-4">Photos</h6>
                            <div class="card-body p-0">

                                <div class="control-inline text-left p-0">
                                    <input type="file" id="picture" name="picture" accept="image/png, image/jpg, image/jpeg" class="input-button">
                                    <img src="../public/img/estates/<?= $estate["picture"] ?>" id="editestateimg" class="card-img-top w-25" alt="">
                                    <input type="hidden" name="picture" value="<?= $estate["picture"] ?>">
                                </div>
                                <p id="error_picture" class="text-left error"><?= !empty($estateValidate) && isset($estateValidate->getMsgerror()['picture']) ? $estateValidate->getMsgerror()['picture'] : (!empty($estateValidate) && isset($estateValidate->getMsgerror()['newpicture']) ? $estateValidate->getMsgerror()['newpicture'] : '') ?></p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <!-- Panel -->

    </div>
    <!-- Grid column -->






    <div class="text-center">
        <button class="light blue  my-4 btn-lg  text-lg font-weight-bold white-text" type="submit" value="1" name="modifyadvertpublish" id="modifyadvertpublish">Publier l'annonce</button>
        <button class="light blue  my-4 btn-lg  text-lg font-weight-bold white-text" type="submit" value="2" name="modifyadvertnopublish" id="modifyadvertnopublish">Ne pas publier l'annonce</button>


    </div>

</form>

<?php $content = ob_get_clean(); ?>

<?php
require('../template_base/templateAdmin.php');
?>