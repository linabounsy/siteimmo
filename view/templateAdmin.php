<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pageTitle ?></title>
    <link rel="icon" href="img/favicon.jpg">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid">

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- accueil site -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="index.php?action=indexadmin">Tableau de bord
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="index.php?action=indexadminallestates">Toutes les annonces
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="index.php?action=displayclient&client.php">Fiches Clients
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="index.php" target="_blank">Ori Immo
                        </a>
                    </li>


                    <!-- profil-->
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item d-flex justify-content-end">
                        <a class="nav-link waves-effect" href="index.php?action=deconnexion">Déconnexion
                        </a>
                    </li>
                    <li class="nav-item avatar">

                        <img src="img/avatar.png" class="rounded-circle z-depth-0" alt="avatar image" height="35">

                    </li>
                </ul>





            </div>


        </nav>




        <main class="mt-4 pt-1">
            <div id="admin-content" class="mt-4"><?= $content ?></div>
        </main>




        <!-- Footer -->
        <footer class="mt-5 blue">

            <!-- Footer Links -->
            <div class="container">

                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5 mb-3">

                    <!-- Grid column -->
                    <div class="col-md mb-3">

                        <a href="#!" class="footer-text white-text">Mentions légales</a>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md mb-3">

                        <a href="#!" class="footer-text white-text">Politique de Protection des Données</a>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md mb-3">

                        <a href="index.php?action=connexion" class="footer-text white-text">Connexion Admin</a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->
                <hr class="rgba-white-light" style="margin: 0 15%;">


                <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

                <!-- Grid row-->
                <div class="row pb-3">

                    <!-- Grid column -->
                    <div class="col-md-12">

                        <div class="mb-5 flex-center">

                            <!-- Facebook -->
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
                            </a>
                            <!--Linkedin -->
                            <a class="li-ic">
                                <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
                            </a>
                            <!--Instagram-->
                            <a class="ins-ic">
                                <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
                            </a>
                            <!--Pinterest-->
                            <a class="pin-ic">
                                <i class="fab fa-pinterest fa-lg white-text"> </i>
                            </a>

                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright white-text text-center py-3">© 2020 Copyright :
                Ori
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->

    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script src="js/mdb.min.js"></script>


    <script src="js/form.js"></script>


    <script>
        $('.datepicker').pickadate({
            format: 'yyyy',
            monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
            weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            clear: 'effacer',
            today: 'Auj.',
            close: 'fermer',

        });
        $('.datepicker-periode').pickadate({
            format: 'dd-mm-yyyy',
            monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
            weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            clear: 'effacer',
            today: 'Auj.',
            close: 'fermer',
        });
    </script>
    <!-- custom scripts -->

</body>

</html>