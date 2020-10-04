<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- custom CSS -->
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
    <div class="container-fluid p-0">

        <header>

            <ul class="nav nav-pills nav-fill nav-light blue lighten-4">
                <li class="nav-item font-weight-bold">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    06.50.90.16.02
                </li>
                <li class="nav-item font-weight-bold">
                    Conseillère Immo
                </li>

                <li class="nav-item font-weight-bold">
                    Paris IDF
                </li>
            </ul>
        </header>


        <nav class="navbar navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav w-50 justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link p-2 black-text  font-weight-bold" href="#">Accueil</span></a>
                    </li>
              
                    <li class="nav-item">
                        <a class="nav-link black-text  font-weight-bold" href="index.php?action=listestates">Nos offres disponibles</a>
                    </li>

                </ul>
            </div>
        </nav>

        <!--barre de recherche-->
        <div class="mt-3">
            <div class="row mr-0 ml-0 d-flex flex-column justify-content-center align-content-center" id="search-img">

        

            </div>
        </div>
        <!-- fin barre de recherche-->


        <main class="mt-2 pt-1 container">
            <div id="content" class="container"><?= $content ?></div>
        </main>




        <!-- Footer -->
        <footer class="mt-5 font-light blue lighten-4">

            <!-- Footer Links -->
            <div class="container">

                <!-- Grid row-->
                <div class="row text-center d-flex justify-content-center pt-5 mb-3">

                    <!-- Grid column -->
                    <div class="col-md mb-3">
                        <h8>
                            <a href="#!" class="footer-text">Mentions légales</a>
                        </h8>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md mb-3">
                        <h8>
                            <a href="#!" class="footer-text">Politique de Protection des Données</a>
                        </h8>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md mb-3">
                        <h8>
                            <a href="index.php?action=connexion&connexionadmin.php" class="footer-text">Connexion Admin</a>
                        </h8>
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
                                <i class="fab fa-facebook-f fa-lg black-text mr-4"> </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fab fa-twitter fa-lg black-text mr-4"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g fa-lg black-text mr-4"> </i>
                            </a>
                            <!--Linkedin -->
                            <a class="li-ic">
                                <i class="fab fa-linkedin-in fa-lg black-text mr-4"> </i>
                            </a>
                            <!--Instagram-->
                            <a class="ins-ic">
                                <i class="fab fa-instagram fa-lg black-text mr-4"> </i>
                            </a>
                            <!--Pinterest-->
                            <a class="pin-ic">
                                <i class="fab fa-pinterest fa-lg black-text"> </i>
                            </a>

                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright :
                Ori
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->

    </div>
    <script type="text/javascript" src="../public/js/form.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- custom scripts -->

</body>

</html>

