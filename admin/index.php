<?php require '../connexion/connexion.php' ?>
<?php
    if (isset($_POST['competence'])) {
        if ($_POST['competence']!=null) {
            $competence = addslashes($_POST['competence']);
            $pdoCV->exec("INSERT INTO t_competences VALUES ( NULL, '$competence', '1')");// mettre $id_utilisateur quand on l'aura en variable de SessionHandler
            header("location: index.php");
            exit();
        }

    }
 ?>
<?php
    if (isset($_GET['id_competence'])) {
        $efface = $_GET['id_competence'];
        $sql = "DELETE FROM t_competences WHERE id_competence = '$efface'";
        $pdoCV -> query($sql);
        header("location: index.php");
        exit();

    }
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur= '1' ");
        $ligne = $sql->fetch();// va chercher !
     ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?='<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>';?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Compétences</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Compétences</h2>
                    <?php
                    $sql = $pdoCV->prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_competence = $sql->rowCount();
                     ?>
                     <p>Il y a <?= $nbr_competence ?> compétences dans la table pour <?= '<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>'; ?></p>
                    <table class="table table-striped">
                        <?php
                            $sql = $pdoCV->query("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
                            $allCompetence = $sql->fetchAll();// va chercher !
                         ?>
                         <tbody>
                            <tr>
                                <th scope="col">compétences</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            <?php foreach ($allCompetence as $competence) :?>
                                    <tr>
                                        <td><?=$competence['competences']?></td>
                                        <td><a href="#"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                                        <td><a href="index.php?id_competence=<?= $competence['id_competence']?>"><span class="glyphicon glyphicon-trash" ></span></a></td>
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form class="form-horizontal" method="post">
        <fieldset>
            <h3>Ajouter une compétence</h3>

        <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="competence">competence</label>
                    <div class="col-md-4">
                    <input id="competence" name="competence" type="text" placeholder="competence" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="envoyer"></label>
                    <div class="col-md-4">
                    <button  type="submit" id="envoyer" class="btn btn-primary">envoyer</button>
                    </div>
                </div>

        </fieldset>
        </form>
        <a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>
    </section>


    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Services Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>