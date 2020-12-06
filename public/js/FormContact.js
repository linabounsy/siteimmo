class Contact {
    constructor() {
        this.contactName = document.getElementById("ContactFormName");
        this.errorContactName = document.getElementById("error_contactname");
        this.contactFirstname = document.getElementById("ContactFormFirstName");
        this.errorContactFirstName = document.getElementById("error_contactfirstname");
        this.contactPhone = document.getElementById("ContactTel");
        this.errorContactPhone = document.getElementById("error_contactphone");
        this.contactEmail = document.getElementById("ContactFormEmail");
        this.errorContactEmail = document.getElementById("error_contactemail");
        this.formSubmit = document.getElementById("form-submit");

    
        this.errors = 0;
        $('#form-submit').click(function (event) {
            contact.validationFormContact();
            if (contact.errors != 0) {
                event.preventDefault();
            }
        });
    }

    validationFormContact() {
        if (this.contactName == "") {
            this.errorContactName.textContent = "veuillez remplir le champ Nom";
            this.errorContactName.style.color = "red";
            this.errors++;

        } else {
            this.errorContactName.style.display = "none";
            this.errors = 0;
        }

        if (this.contactFirstName == "") {
            this.errorContactFirstName.textContent = "veuillez remplir le champ Prénom";
            this.errorContactFirstName.style.color = "red";
            this.errors++;
        } else {
            this.errorContactFirstName.style.display = "none";
        }

        if (this.contactPhone == "") {
            this.errorContactPhone.textContent = "veuillez remplir le champ Téléphone";
            this.errorContactPhone.style.color = "red";
            this.errors++;
        } else {
            this.errorContactPhone.style.display = "none";
        }

        if (this.contactEmail == "") {
            this.errorContactEmail.textContent = "veuillez remplir le champ Email";
            this.errorContactEmail.style.color = "red";
            this.errors++;
        } else {
            let regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!regexEmail(this.contactEmail)) {
                this.errorContactEmail.textContent = "format email invalide";
                this.errors++;
            } else {
                this.errorContactEmail.style.display = "none";
            }
        }
        this.formSubmit.textContent = "envoyé";
    }


}

let contact = new Contact();