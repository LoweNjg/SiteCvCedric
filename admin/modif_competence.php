<?php require '../connexion/connexion.php' ?>
<?php

// Gestion des contenus, mise à jour d'une compétence
	if(isset($_POST['competence'])){
		$competence = addslashes($_POST['competence']);
		$id_competence = $_POST['id_competence'];
		$pdoCV->exec(" UPDATE t_competences SET competence='$competence' WHERE id_competence='$id_competence' ");
		header('location: index.php');
		exit();
	}

// Je recupere la competence
	$id_competence = $_GET['id_competence']; // par l'id et $_GET
	$sql = $pdoCV->query(" SELECT * FROM t_competences WHERE id_competence = '$id_competence' "); // la requête égale à l'id
	$ligne_competence = $sql->fetch(); //

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
				<a class="navbar-brand page-scroll" href="index.php">Accueil Admin</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<li class="hidden">
						<a class="page-scroll" href="#page-top"></a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- /.contenue modif-->

    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<section id="intro" class="intro-section">
						<form class="form-horizontal" method="post" action="modif_competence.php">
							<fieldset>

							<!-- Form Name -->
							<legend>Modification competence</legend>

							<!-- Text input-->
							<div class="form-group">
								<label for="competence" class="col-md-4 control-label" >Compétence</label>
								<div class="col-md-4">
									<input name="competence" type="text" class="form-control input-md" value="<?= $ligne_competence['competence']; ?>">
									<input name="id_competence" hidden value="<?= $ligne_competence['id_competence']; ?>">
								</div>
							</div>

							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for=""></label>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">Mettre à jour</button>
								</div>
							</div>

							</fieldset>
						</form>
					</section>
                    </div>
                </div>
            </div>
        </div>

		<!-- jQuery -->
	    <script src="js/jquery.js"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>

	    <!-- Scrolling Nav JavaScript -->
	    <script src="js/jquery.easing.min.js"></script>
	    <script src="js/scrolling-nav.js"></script>

	</body>

	</html>
