<?php require '../connexion/connexion.php' ?>
<?php

// Gestion des contenus, mise à jour d'une compétence
if(isset($_POST['titre_f'])){
	$titre_f = addslashes($_POST['titre_f']);
	$sous_titre_f = addslashes($_POST['sous_titre_f']);
	$dates_f = addslashes($_POST['dates_f']);
	$description_f = addslashes($_POST['description_e']);
	$id_formation = $_POST['id_formation'];
	$pdoCV->exec(" UPDATE t_formations SET titre_f = '$titre_f', sous_titre_f='$sous_titre_f', dates_f = '$dates_f', description_f = '$description_f' WHERE id_formation='$id_formation' ");
	header('location: index.php');
	exit();
}

// Je recupere les info experience
$id_formation = $_GET['id_formation']; // par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_formations WHERE id_formation = '$id_formation' "); // la requête égale à l'id
$ligne_formation = $sql->fetch(); //

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<?php
	$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur= '$connecter' ");
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
						<form class="form-horizontal" method="post" action="modif_formation.php">
							<fieldset>

								<!-- Form Name -->
								<legend>Modification formation</legend>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="titre">titre</label>
									<div class="col-md-4">
										<input name="titre_f" type="text" class="form-control input-md" value="<?= $ligne_formation['titre_f']; ?>">
										<input hidden name="id_formation" value="<?= $ligne_formation['id_formation']; ?>">
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="sousTitre">sousTitre</label>
									<div class="col-md-4">
										<input name="sous_titre_f" type="text" class="form-control input-md" value="<?= $ligne_formation['sous_titre_f']; ?>">
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="date">date</label>
									<div class="col-md-4">
										<input name="dates_f" type="text" class="form-control input-md" value="<?= $ligne_formation['dates_f']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="description">description</label>
									<div class="col-md-4">
										<input name="description_f" type="text" class="form-control input-md" value="<?= $ligne_formation['description_f']; ?>">
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
	<script src="//cdn.ckeditor.com/4.7.1/basic/ckeditor.js"></script>

</body>

</html>
