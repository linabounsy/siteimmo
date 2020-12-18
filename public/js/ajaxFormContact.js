$("#myForm").submit(function (e) {
    e.preventDefault(); // empêcher une action par défaut
    submitForm();

});

$("#estimationForm").submit(function (e) {
    e.preventDefault(); // empêcher une action par défaut
    estimationForm();

});

function submitForm() {
    var data = {
        'name': $('#ContactFormName').val(),
        'firstname': $('#ContactFormFirstName').val(),
        'phone': $('#ContactTel').val(),
        'email': $('#ContactFormEmail').val()
    }

    var searchParams = new URLSearchParams(
        window.location.search
    ); // va chercher tous les paramètres dans la page
    var id = searchParams.get('id');

    $.ajax({
        url: 'index.php?action=estate&id=' + id,
        type: 'POST',
        data: data,
        success: function () {
            formSuccess();
        },
        error : function () {
            error();
        }
    });
}

function estimationForm() {
    var data = {
        'name': $('#ContactFormName').val(),
        'firstname': $('#ContactFormFirstName').val(),
        'phone': $('#ContactTel').val(),
        'email': $('#ContactFormEmail').val()
    }

    $.ajax({
        url: 'index.php?action=estimation',
        type: 'POST',
        data: data,
        success: function () {
            formSuccess();
        },
        error : function () {
            error();
        }
    });
}

function formSuccess() {
    $('#msgSubmit').html("<p>Votre message a bien été envoyé. Nous vous contactons rapidement.</p>");
    $('#myForm').hide();
}

function error() {
    $('#msgSubmit').html("<p>Une erreur est survenue, veuillez ré-essayer plus tard.</p>");
}

