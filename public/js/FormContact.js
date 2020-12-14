class FormContact {
    constructor() {
        this.contactName = document.getElementById("ContactFormName");
        this.errorContactName = document.getElementById("error_contactname");
        this.contactFirstname = document.getElementById("ContactFormFirstName");
        this.errorContactFirstname = document.getElementById("error_contactfirstname");
        this.contactPhone = document.getElementById("ContactTel");
        this.errorContactPhone = document.getElementById("error_contactphone");
        this.contactEmail = document.getElementById("ContactFormEmail");
        this.errorContactEmail = document.getElementById("error_contactemail");
        this.formSubmit = document.getElementById("form-submit");
        this.msgSubmit = document.getElementById("msgSubmit");
        this.myForm = document.getElementById("myForm");
     
        this.errors = 0;
        $('#form-submit').click(function(event) {
            contact.validationFormContact();
            if (contact.errors != 0) {
                event.preventDefault();
            }
        });

    }

    validationFormContact() {
        if (this.contactName.value == "") {
            this.errorContactName.textContent = "veuillez remplir le champ Nom";
            this.errorContactName.style.color = "red";
            this.errors++;

        } else {
            this.errorContactName.style.display = "none";
            this.errors = 0;
        }

        if (this.contactFirstname.value == "") {
            this.errorContactFirstname.textContent = "veuillez remplir le champ Prénom";
            this.errorContactFirstname.style.color = "red";
            this.errors++;
        } else {
            this.errorContactFirstname.style.display = "none";
        }

        if (this.contactPhone.value == "") {
            this.errorContactPhone.textContent = "veuillez remplir le champ Téléphone";
            this.errorContactPhone.style.color = "red";
            this.errors++;
        } else {
            let regexPhone = /^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/;
            if (!regexPhone.test(this.contactPhone.value)) {
                this.errorContactPhone.textContent = "le téléphone doit être composé de 10 chiffres";
                this.errors++;
            } else {
                this.errorContactPhone.style.display = "none";
            }
            
        }

        if (this.contactEmail.value == "") {
            this.errorContactEmail.textContent = "veuillez remplir le champ Email";
            this.errorContactEmail.style.color = "red";
            this.errors++;
        } else {
            let regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!regexEmail.test(this.contactEmail.value)) {
                this.errorContactEmail.textContent = "format email invalide";
                this.errors++;
            } else {
                this.errorContactEmail.style.display = "none";
            }
        }
    
    }



}

let contact = new FormContact();