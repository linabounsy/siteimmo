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
        $('#newadvertpublish').click(function(event) {
            formulaire.checkField();
            if (formulaire.errors != 0) {
                event.preventDefault();
            }
        });

        this.submitFormNoPublish.addEventListener("click", this.checkField.bind(this));
        $('#newadvertnopublish').click(function(event) {
            formulaire.checkField();
            if (formulaire.errors != 0) {
                event.preventDefault();
            }
        });


    }

    checkField() {

        
        if (this.titleInput.value == "") {
            this.errorTitle.textContent = "le champ est vide";
            this.errorTitle.style.color = "red";
            this.errors++;

        } else {
            this.errorTitle.style.display = "none";
            this.errors = 0;
        }

        if (this.descriptionInput.value == "") {
            this.errorDescription.textContent = "le champ est vide";
            this.errorDescription.style.color = "red";
            this.errors++;

        }
        else {
            this.errorDescription.style.display = "none";
            
        }

        if (this.clientInput.value == "choisir un client") {
            this.errorClient.textContent = "sélectionner un client";
            this.errorClient.style.color = "red";
            this.errors++;

        } else {
            this.errorClient.style.display = "none";
        }

        this.categoryInput.forEach(categoryEl => {
            if (categoryEl.checked) {
                this.errorCategory.style.display = "none";
                this.errors++;
            } else {
                this.errorCategory.textContent = "sélectionner un champ";

            }
        })

        this.typeInput.forEach(typeEl => {
            if (typeEl.checked) {
                this.errorType.style.display = "none";
                this.errors++;
            } else {
                this.errorType.textContent = "sélectionner un champ";


            }
        })

        if (this.addressInput.value == "" || this.cityInput.value == "" || this.postCodeInput.value == "") {
            this.errorLocalisation.textContent = "remplir tous les champs";
            this.errorLocalisation.style.color = "red";
            this.errors++;

        } else {
            this.errorLocalisation.style.display = "none";
            
        }

        if (this.constructionInput.value == "") {
            this.errorConstruction.textContent = "renseigner une année";
            this.errorConstruction.style.color = "red";
            this.errors++;

        } else {
            this.errorConstruction.style.display = "none";
        }

       

        this.exposureInput.forEach(exposureEl => {
            if (exposureEl.checked) {
                this.errorExposure.style.display = "none";
                this.errors++;
            } else {
                this.errorExposure.textContent = "sélectionner un champ";

   
            }
        })

        if (this.priceInput.value == "") {
            this.errorPrice.textContent = "renseigner un prix";
            this.errorPrice.style.color = "red";
            this.errors++;

        } else {
            this.errorPrice.style.display = "none";
      
        }

        if (this.chargeInput.value == "") {
            this.errorCharge.textContent = "renseigner un prix";
            this.errorCharge.style.color = "red";
            this.errors++;

        } else {
            this.errorCharge.style.display = "none";
        }

        this.subdivisionYesInput.forEach(subdivisionEl => {
            if (subdivisionEl.checked) {
                this.errorSubdivision.style.display = "none";
                this.errors++;
            } else {
                this.errorSubdivision.textContent = "sélectionner un champ";


            }
        })

        this.subdivisionNoInput.forEach(subdivisionEl => {
            if (subdivisionEl.checked) {
                this.errorSubdivision.style.display = "none";
                this.errors++;
            } else {
                this.errorSubdivision.textContent = "sélectionner un champ";


            }
        })

        if (this.surfaceInput.value == "") {
            this.errorSurface.textContent = "renseigner une surface";
            this.errorSurface.style.color = "red";
            this.errors++;


        } else {
            this.errorSurface.style.display = "none";
        }

        if (this.landInput.value == "") {
            this.errorLand.textContent = "remplir ce champ";
            this.errorLand.style.color = "red";
            this.errors++;

        } else {
            this.errorLand.style.display = "none";
        }

        if (this.floorInput.value == "") {
            this.errorFloor.textContent = "remplir ce champ";
            this.errorFloor.style.color = "red";
            this.errors++;

     
        } else {
            this.errorFloor.style.display = "none";
        }

        if (this.roomInput.value == "") {
            this.errorRoom.textContent = "renseigner le nombre de pièces";
            this.errorRoom.style.color = "red";
            this.errors++;
    
        } else {
            this.errorRoom.style.display = "none";
        }

        if (this.bedroomInput.value == "") {
            this.errorBedroom.textContent = "renseigner le nombre de chambres";
            this.errorBedroom.style.color = "red";
            this.errors++;
     
        } else {
            this.errorBedroom.style.display = "none";
        }

        if (this.bathroomInput.value == "") {
            this.errorBathroom.textContent = "renseigner le nombre de salle de bain";
            this.errorBathroom.style.color = "red";
            this.errors++;
      
        } else {
            this.errorBathroom.style.display = "none";
        }

        if (this.toiletInput.value == "") {
            this.errorToilet.textContent = "renseigner le nombre de toilettes";
            this.errorToilet.style.color = "red";
            this.errors++;
    
        } else {
            this.errorToilet.style.display = "none";
        }

        this.kitchenInput.forEach(kitchenEl => {
            if (kitchenEl.checked) {
                this.errorKitchen.style.display = "none";
                this.errors++;
            } else {
                this.errorKitchen.textContent = "sélectionner un champ";

            }
        })

        this.heatingInput.forEach(heatingEl => {
            if (heatingEl.checked) {
                this.errorHeating.style.display = "none";
                this.errors++;
            } else {
                this.errorHeating.textContent = "sélectionner un champ";

            }
        })

        this.parkingInput.forEach(parkingEl => {
            if (parkingEl.checked) {
                this.errorParking.style.display = "none";
                this.errors++;
            } else {
                this.errorParking.textContent = "sélectionner un champ";

            }
        })

        if (this.garageInput.value == "") {
            this.errorGarage.textContent = "renseigner le nombre de garages";
            this.errorGarage.style.color = "red";
            this.errors++;

        } else {
            this.errorGarage.style.display = "none";
        }

        this.basementYesInput.forEach(basementEl => {
            if (basementEl.checked) {
                this.errorBasement.style.display = "none";
                this.errors++;
            } else {
                this.errorBasement.textContent = "sélectionner un champ";


            }
        })

        this.basementNoInput.forEach(basementEl => {
            if (basementEl.checked) {
                this.errorBasement.style.display = "none";
                this.errors++;
            } else {
                this.errorBasement.textContent = "sélectionner un champ";

            }
        })

        this.diagenergyYesInput.forEach(diagenergyEl => {
            if (diagenergyEl.checked) {
                this.errorDiagenergy.style.display = "none";
                this.errors++;
            } else {
                this.errorDiagenergy.textContent = "sélectionner un champ";

            }
        })

        this.diagenergyNoInput.forEach(diagenergyEl => {
            if (diagenergyEl.checked) {
                this.errorDiagenergy.style.display = "none";
                this.errors++;
            } else {
                this.errorDiagenergy.textContent = "sélectionner un champ";

            }
        })

        this.energyclassInput.forEach(energyclassEl => {
            if (energyclassEl.checked) {
                this.errorEnergyclass.style.display = "none";
                this.errors++;
            } else {
                this.errorEnergyclass.textContent = "sélectionner un champ";

            }
        })

        this.gesInput.forEach(gesEl => {
            if (gesEl.checked) {
                this.errorGes.style.display = "none";
                this.errors++;
            } else {
                this.errorGes.textContent = "sélectionner un champ";

            }
        })

        if (this.periodeInput.value == "") {
            this.errorPeriode.textContent = "renseigner une date de disponibilité";
            this.errorPeriode.style.color = "red";
            this.errors++;

        } else {
            this.errorPeriode.style.display = "none";

        }

        if (this.pictureInput.value == [0]) {
            this.errorPicture.textContent = "veuillez charger une photo";
            this.errorPicture.style.color = "red";
            this.errors++;

        } else {
            this.errorPicture.style.display = "none";
        }

        if (this.pictureInput.value !== "") {
            this.errorPicture.textContent = "veuillez recharger une photo";
            this.errorPicture.style.color = "red";
            this.errors++;

        } else {
            this.errorPicture.style.display = "none";
        }



    }
}

let formulaire = new Form();