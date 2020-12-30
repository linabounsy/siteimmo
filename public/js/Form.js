class Form {
    constructor() {
        this.titleInput = document.getElementById("title");
        this.errorTitle = document.getElementById("error_title");
        this.descriptionInput = document.getElementById("description");
        this.errorDescription = document.getElementById("error_description");
        this.clientInput = document.getElementById("client");
        this.errorClient = document.getElementById("error_client");
        this.categoryInput = document.querySelectorAll("#categorybut input"); // recuperer un element via un sélecteur css
        this.errorCategory = document.getElementById("error_categorybut");
        this.typeInput = document.querySelectorAll("#typebut input");
        this.errorType = document.getElementById("error_typebut");
        this.addressInput = document.getElementById("address");
        this.cityInput = document.getElementById("city");
        this.postCodeInput = document.getElementById("postcode");
        this.errorLocalisation = document.getElementById("error_localisation");
        this.constructionInput = document.getElementById("construction");
        this.errorConstruction = document.getElementById("error_construction");
        this.exposureInput = document.querySelectorAll("#exposurebut input");
        this.errorExposure = document.getElementById("error_exposurebut");
        this.priceInput = document.getElementById("price");
        this.errorPrice = document.getElementById("error_price");
        this.chargeInput = document.getElementById("charge");
        this.errorCharge = document.getElementById("error_charge");
        this.subdivisionYesInput = document.querySelectorAll("#subdivisionyesbut input");
        this.subdivisionNoInput = document.querySelectorAll("#subdivisionnobut input");
        this.errorSubdivision = document.getElementById("error_subdivisionbut");
        this.surfaceInput = document.getElementById("surface");
        this.errorSurface = document.getElementById("error_surface");
        this.landInput = document.getElementById("land");
        this.errorLand = document.getElementById("error_land");
        this.floorInput = document.getElementById("floor");
        this.errorFloor = document.getElementById("error_floor");
        this.roomInput = document.getElementById("room");
        this.errorRoom = document.getElementById("error_room");
        this.bedroomInput = document.getElementById("bedroom");
        this.errorBedroom = document.getElementById("error_bedroom");
        this.bathroomInput = document.getElementById("bathroom");
        this.errorBathroom = document.getElementById("error_bathroom");
        this.toiletInput = document.getElementById("toilet");
        this.errorToilet = document.getElementById("error_toilet");
        this.kitchenInput = document.querySelectorAll("#kitchenbut input");
        this.errorKitchen = document.getElementById("error_kitchenbut");
        this.heatingInput = document.querySelectorAll("#heatingbut input");
        this.errorHeating = document.getElementById("error_heatingbut");
        this.parkingInput = document.querySelectorAll("#parkingbut input");
        this.errorParking = document.getElementById("error_parkingbut");
        this.garageInput = document.getElementById("garage");
        this.errorGarage = document.getElementById("error_garage");
        this.basementYesInput = document.querySelectorAll("#basementyesbut input");
        this.basementNoInput = document.querySelectorAll("#basementnobut input");
        this.errorBasement = document.getElementById("error_basementput");
        this.diagenergyYesInput = document.querySelectorAll("#diagenergyyesbut input");
        this.diagenergyNoInput = document.querySelectorAll("#diagenergynobut input");
        this.errorDiagenergy = document.getElementById("error_diagenergybut");
        this.energyclassInput = document.querySelectorAll("#energyclassbut input");
        this.errorEnergyclass = document.getElementById("error_energyclassbut");
        this.gesInput = document.querySelectorAll("#gesbut input");
        this.errorGes = document.getElementById("error_gesbut");
        this.periodeInput = document.getElementById("periode");
        this.errorPeriode = document.getElementById("error_periode");
        this.pictureInput = document.getElementById("picture");
        this.errorPicture = document.getElementById("error_picture");
        this.submitFormPublish = document.getElementById("newadvertpublish");
        this.submitFormNoPublish = document.getElementById("newadvertnopublish");


        this.errors = 0;
        $('#newadvertpublish').click(function (event) {
            formulaire.checkField();
            if (formulaire.errors != 0) {
                event.preventDefault();
            }
        });

        $('#newadvertnopublish').click(function (event) {
            formulaire.checkField();
            if (formulaire.errors != 0) {
                event.preventDefault();
            }
        });

    }

    checkField() {


        if (this.titleInput.value == "") {
            this.errorTitle.textContent = "le champ est vide";
            this.errors++;

        } else {
            this.errorTitle.textContent = "";
            this.errors = 0;

        }

        if (tinyMCE.get('description').getContent() === "") {
            this.errorDescription.textContent = "le champ est vide";
            this.errors++;

        }

        else {
            this.errorDescription.textContent = "";
            this.errors = 0;
        }


        if (this.clientInput.value == "0") {
            this.errorClient.textContent = "sélectionner un client";
            this.errors++;

        } else {
            this.errorClient.textContent = "";
            this.errors = 0;
        }

        this.categoryInput.forEach(categoryEl => {
            if (categoryEl.checked) {
                this.errorCategory.style.display = "none";
                this.errors = 0;
            } else {
                this.errorCategory.textContent = "sélectionner un champ";
                this.errors++;

            }
        })

        this.typeInput.forEach(typeEl => {
            if (typeEl.checked) {
                this.errorType.style.display = "none";
                this.errors = 0;
            } else {
                this.errorType.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        if (this.constructionInput.value == "") {
            this.errorConstruction.textContent = "renseigner une année";
            this.errors++;

        } else {
            this.errorConstruction.textContent = "";
            this.errors = 0;
        }


        if (this.addressInput.value == "" || this.cityInput.value == "" || this.postCodeInput.value == "") {
            this.errorLocalisation.textContent = "remplir tous les champs";
            this.errors++;

        } else {
            this.errorLocalisation.textContent = "";
            this.errors = 0;
        }



        if (this.priceInput.value == "") {
            this.errorPrice.textContent = "renseigner un prix";
            this.errors++;

        } else {
            this.errorPrice.textContent = "";
            this.errors = 0;
        }

        if (this.surfaceInput.value == "") {
            this.errorSurface.textContent = "renseigner une surface";
            this.errors++;


        } else {
            this.errorSurface.textContent = "";
            this.errors = 0;
        }


        if (this.roomInput.value == "") {
            this.errorRoom.textContent = "renseigner le nombre de pièces";
            this.errors++;

        } else {
            this.errorRoom.textContent = "";
            this.errors = 0;
        }

        if (this.periodeInput.value == "") {
            this.errorPeriode.textContent = "renseigner une date de disponibilité";
            this.errors++;

        } else {
            this.errorPeriode.textContent = "";
            this.errors = 0;

        }

        this.exposureInput.forEach(exposureEl => {
            if (exposureEl.checked) {
                this.errorExposure.style.display = "none";
                this.errors = 0;
            } else {
                this.errorExposure.textContent = "sélectionner un champ";
                this.errors++;

            }
        })


        if (this.chargeInput.value == "") {
            this.errorCharge.textContent = "renseigner un prix";
            this.errors++;

        } else {
            this.errorCharge.textContent = "";
            this.errors = 0;
        }

        this.subdivisionYesInput.forEach(subdivisionEl => {
            if (subdivisionEl.checked) {
                this.errorSubdivision.style.display = "none";
                this.errors = 0;
            } else {
                this.errorSubdivision.textContent = "sélectionner un champ";
                this.errors++;

            }
        })

        this.subdivisionNoInput.forEach(subdivisionEl => {
            if (subdivisionEl.checked) {
                this.errorSubdivision.style.display = "none";
                this.errors = 0;
            } else {
                this.errorSubdivision.textContent = "sélectionner un champ";
                this.errors++;

            }
        })


        if (this.landInput.value == "") {
            this.errorLand.textContent = "remplir ce champ";
            this.errors++;

        } else {
            this.errorLand.textContent = "";
            this.errors = 0;
        }


        if (this.floorInput.value == "") {
            this.errorFloor.textContent = "remplir ce champ";
            this.errors++;


        } else {
            this.errorFloor.textContent = "";
            this.errors = 0;
        }


        if (this.bedroomInput.value == "") {
            this.errorBedroom.textContent = "renseigner le nombre de chambres";
            this.errors++;

        } else {
            this.errorBedroom.textContent = "";
            this.errors = 0;
        }

        if (this.bathroomInput.value == "") {
            this.errorBathroom.textContent = "renseigner le nombre de salle de bain";
            this.errors++;

        } else {
            this.errorBathroom.textContent = "";
            this.errors = 0;
        }

        if (this.toiletInput.value == "") {
            this.errorToilet.textContent = "renseigner le nombre de toilettes";
            this.errors++;

        } else {
            this.errorToilet.textContent = "";
            this.errors = 0;
        }

        this.kitchenInput.forEach(kitchenEl => {
            if (kitchenEl.checked) {
                this.errorKitchen.style.display = "none";
                this.errors = 0;
            } else {
                this.errorKitchen.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.heatingInput.forEach(heatingEl => {
            if (heatingEl.checked) {
                this.errorHeating.style.display = "none";
                this.errors = 0;
            } else {
                this.errorHeating.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.parkingInput.forEach(parkingEl => {
            if (parkingEl.checked) {
                this.errorParking.style.display = "none";
                this.errors = 0;
            } else {
                this.errorParking.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        if (this.garageInput.value == "") {
            this.errorGarage.textContent = "renseigner le nombre de garages";
            this.errors++;

        } else {
            this.errorGarage.textContent = "";
            this.errors = 0;
        }

        this.basementYesInput.forEach(basementEl => {
            if (basementEl.checked) {
                this.errorBasement.style.display = "none";
                this.errors = 0;
            } else {
                this.errorBasement.textContent = "sélectionner un champ";
                this.errors++;

            }
        })

        this.basementNoInput.forEach(basementEl => {
            if (basementEl.checked) {
                this.errorBasement.style.display = "none";
                this.errors = 0;
            } else {
                this.errorBasement.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.diagenergyYesInput.forEach(diagenergyEl => {
            if (diagenergyEl.checked) {
                this.errorDiagenergy.style.display = "none";
                this.errors = 0;
            } else {
                this.errorDiagenergy.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.diagenergyNoInput.forEach(diagenergyEl => {
            if (diagenergyEl.checked) {
                this.errorDiagenergy.style.display = "none";
                this.errors = 0;
            } else {
                this.errorDiagenergy.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.energyclassInput.forEach(energyclassEl => {
            if (energyclassEl.checked) {
                this.errorEnergyclass.style.display = "none";
                this.errors = 0;
            } else {
                this.errorEnergyclass.textContent = "sélectionner un champ";
                this.errors++;
            }
        })

        this.gesInput.forEach(gesEl => {
            if (gesEl.checked) {
                this.errorGes.style.display = "none";
                this.errors = 0;
            } else {
                this.errorGes.textContent = "sélectionner un champ";
                this.errors++;
            }
        })



        if (this.pictureInput.value == "") {
            this.errorPicture.textContent = "veuillez charger une photo";
            this.errors++;

        } else {
            this.errorPicture.textContent = "";
            this.errors = 0;
        }




        console.log(formulaire.errors);
    }
}

let formulaire = new Form();
