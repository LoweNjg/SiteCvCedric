<?php require '../connexion/connexion.php' ?>
<?php
    session_start();
    if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];
    }else {
        header('location: login.php')
    }
 ?>
<?php
    if (isset($_POST['competence'])) {
        if ($_POST['competence']!=null) {
            $competence = addslashes($_POST['competence']);
            $pdoCV->exec("INSERT INTO t_competences VALUES ( NULL, '$competence', '1')");// mettre $id_utilisateur quand on l'aura en variable de SessionHandler
            header("location: index.php");
            exit();
        }

    }
    if (isset($_POST['loisir'])) {
        if ($_POST['loisir']!=null) {
            $loisir = addslashes($_POST['loisir']);
            $pdoCV->exec("INSERT INTO t_loisirs VALUES ( NULL, '$loisir', '1')");// mettre $id_utilisateur quand on l'aura en variable de SessionHandler
            header("location: index.php");
            exit();
        }

    }
    if (isset($_POST['titre_e'])) {
        if ($_POST['titre_e']!=null) {
            $titre_e = addslashes($_POST['titre_e']);
            $sous_titre_e = addslashes($_POST['sous_titre_e']);
            $dates_e = addslashes($_POST['dates_e']);
            $description_e = addslashes($_POST['description_e']);
            $pdoCV->exec("INSERT INTO t_experiences VALUES ( NULL, '$titre_e','$sous_titre_e','$dates_e','$description_e', '1')");// mettre $id_utilisateur quand on l'aura en variable de SessionHandler
            header("location: index.php");
            exit();
        }
    }
    if (isset($_POST['titre_f'])) {
        if ($_POST['titre_f']!=null) {
            $titre_f = addslashes($_POST['titre_f']);
            $sous_titre_f = addslashes($_POST['sous_titre_f']);
            $date_f = addslashes($_POST['date_f']);
            $description_f = addslashes($_POST['description_f']);
            $pdoCV->exec("INSERT INTO t_experiences VALUES ( NULL, '$titre_f','$sous_titre_f','$date_f','$description_f', '1')");// mettre $id_utilisateur quand on l'aura en variable de SessionHandler
            header("location: index.php");
            exit();

        }

    }
 ?>
<?php
    if (isset($_GET['id_competence'])) {
        $effaceCompetence = $_GET['id_competence'];
        $sql = "DELETE FROM t_competences WHERE id_competence = '$effaceCompetence'";
        $pdoCV -> query($sql);
        header("location: index.php");
        exit();
    }
    if (isset($_GET['id_loisir'])) {
        $effaceLoisir = $_GET['id_loisir'];
        $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$effaceLoisir'";
        $pdoCV -> query($sql);
        header("location: index.php");
        exit();
    }
    if (isset($_GET['id_experience'])) {
        $effaceExeperience = $_GET['id_experience'];
        $sql = "DELETE FROM t_experiences WHERE id_experience = '$effaceExeperience'";
        $pdoCV -> query($sql);
        header("location: index.php");
        exit();
    }
    if (isset($_GET['id_formation'])) {
        $effaceFormation = $_GET['id_formation'];
        $sql = "DELETE FROM t_formations WHERE id_formation = '$effaceFormation'";
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
                        <a class="page-scroll" href="#Loisirs">Loisirs</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#experience">Experience</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#formation">Formation</a>
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
                                        <td><?=$competence['competence']?></td>
                                        <td><a href="modif_competence.php?id_competence=<?= $competence['id_competence']?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
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
    <section id="Loisirs" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Loisirs Section</h1>
                    <?php
                    $sql = $pdoCV->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_loisir = $sql->rowCount();
                     ?>
                     <p>Il y a <?= $nbr_loisir ?> loisirs dans la table pour <?= '<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>'; ?></p>
                    <table class="table table-striped">
                        <?php
                            $sql = $pdoCV->query("SELECT * FROM t_loisirs WHERE utilisateur_id = '1'");
                            $allLoisir = $sql->fetchAll();// va chercher !
                         ?>
                         <tbody>
                            <tr>
                                <th scope="col">loisirs</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            <?php foreach ($allLoisir as $loisir) :?>
                                    <tr>
                                        <td><?=$loisir['loisir']?></td>
                                        <td><a href="modif_loisir.php?id_loisir=<?= $loisir['id_loisir']?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                                        <td><a href="index.php?id_loisir=<?= $loisir['id_loisir']?>"><span class="glyphicon glyphicon-trash" ></span></a></td>
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                    <form class="form-horizontal" method="post">
                    <fieldset>
                        <h3>Ajouter un loisir</h3>

                    <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="loisir">loisir</label>
                                <div class="col-md-4">
                                <input id="loisir" name="loisir" type="text" placeholder="loisir" class="form-control input-md" required="">

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
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="experience" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Experience Section</h1>
                    <?php
                    $sql = $pdoCV->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_experience = $sql->rowCount();
                     ?>
                     <p>Il y a <?= $nbr_experience ?> Experiences dans la table pour <?= '<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>'; ?></p>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <?php
               $sql = $pdoCV->query("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
                $allExperience = $sql->fetchAll();// va chercher !
            ?>
        <tbody>
            <tr>
                <th scope="col">titre</th>
                <th scope="col">Sous-titre</th>
                <th scope="col">date</th>
                <th scope="col">description</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
                <?php foreach ($allExperience as $experience) :?>
                    <tr>
                        <td><?=$experience['titre_e']?></td>
                        <td><?=$experience['sous_titre_e']?></td>
                        <td><?=$experience['dates_e']?></td>
                        <td><?=$experience['description_e']?></td>
                        <td><a href="modif_experience.php?id_experience=<?= $experience['id_experience']?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                        <td><a href="index.php?id_experience=<?= $experience['id_experience']?>"><span class="glyphicon glyphicon-trash" ></span></a></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
        </table>
        <form class="form-horizontal" method="post">
        <fieldset>

        <!-- Form Name -->
        <legend>Ajouter une experience</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">titre</label>
            <div class="col-md-4">
                <input id="titre_e" name="titre_e" type="text" placeholder="titre" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="sousTitre">sousTitre</label>
            <div class="col-md-4">
                <input id="sous_titre_e" name="sous_titre_e" type="text" placeholder="sous-titre" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="date">date</label>
            <div class="col-md-4">
                <input id="dates_e" name="dates_e" type="text" placeholder="date" class="form-control input-md">
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">description</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description_e" name="description_e"></textarea>
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
    </section>

    <!-- Contact Section -->
    <section id="formation" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Formation Section</h1>
                    <?php
                    $sql = $pdoCV->prepare("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
                    $sql->execute();
                    $nbr_formation = $sql->rowCount();
                     ?>
                     <p>Il y a <?= $nbr_formation ?> Formation dans la table pour <?= '<strong>'.$ligne['prenom'].' '.$ligne['nom'].'</strong>'; ?></p>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <?php
               $sql = $pdoCV->query("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
                $allFormation = $sql->fetchAll();// va chercher !
            ?>
        <tbody>
            <tr>
                <th scope="col">titre</th>
                <th scope="col">Sous-titre</th>
                <th scope="col">date</th>
                <th scope="col">description</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
                <?php foreach ($allFormation as $formation) :?>
                    <tr>
                        <td><?=$formation['titre_f']?></td>
                        <td><?=$formation['sous_titre_f']?></td>
                        <td><?=$formation['dates_f']?></td>
                        <td><?=$formation['description_f']?></td>
                        <td><a href="modif_experience.php?id_formation=<?= $formation['id_formation']?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                        <td><a href="index.php?id_formation=<?= $formation['id_formation']?>"><span class="glyphicon glyphicon-trash" ></span></a></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
        </table>
        <form class="form-horizontal" method="post">
        <fieldset>

        <!-- Form Name -->
        <legend>Ajouter une formation</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">titre</label>
            <div class="col-md-4">
                <input id="titre_f" name="titre_f" type="text" placeholder="titre" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="sousTitre">sousTitre</label>
            <div class="col-md-4">
                <input id="sous_titre_f" name="sous_titre_f" type="text" placeholder="sous-titre" class="form-control input-md">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="date">date</label>
            <div class="col-md-4">
                <input id="dates_f" name="dates_f" type="text" placeholder="date" class="form-control input-md">
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">description</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description_f" name="description_f"></textarea>
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
