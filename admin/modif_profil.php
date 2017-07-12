<?php require '../connexion/connexion.php' ?>
<?php

// Gestion des contenus, mise à jour d'une compétence
if(isset($_POST['email'])){
	$email = addslashes($_POST['email']);
	$telephone = addslashes($_POST['telephone']);
	$pseudo = addslashes($_POST['pseudo']);
	$avatar = addslashes($_POST['avatar']);
	$adresse = addslashes($_POST['adresse']);
	$code_postal = addslashes($_POST['code_postal']);
	$ville = addslashes($_POST['ville']);
	$pays = addslashes($_POST['pays']);
	$id_utilisateur = $_POST['id_utilisateur'];
	$pdoCV->exec(" UPDATE t_utilisateurs SET email = '$email', telephone = '$telephone', pseudo = '$pseudo' , avatar = '$avatar' , adresse = '$adresse' , code_postal = '$code_postal', ville = '$ville', pays = '$pays' WHERE id_utilisateur='$id_utilisateur' ");
	header('location: index.php');
	exit();
}


// Je recupere les info experience
$id_utilisateur = $_GET['id_utilisateur']; // par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur' "); // la requête égale à l'id
$ligne_utilisateur = $sql->fetch(); //

?>
<?php
$_FILES['avatar']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['avatar']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».

?>

<!DOCTYPE html>
<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

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
						<form class="form-horizontal" method="post" action="modif_profil.php">
							<fieldset>

								<!-- Form Name -->
								<legend>Modification profil</legend>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="email">email</label>
									<div class="col-md-4">
										<input name="email" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['email']; ?>">
										<input hidden name="id_utilisateur" value="<?= $ligne_utilisateur['id_utilisateur']; ?>">
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="telephone">Téléphone</label>
									<div class="col-md-4">
										<input name="telephone" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['telephone']; ?>">
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="date">pseudo</label>
									<div class="col-md-4">
										<input name="pseudo" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['pseudo']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="avatar">avatar</label>
									<div class="col-md-4">
										<input type="hidden" name="MAX_FILE_SIZE" value="12345" />
										<input name="avatar" type="file" class="form-control input-md" value="<?= $ligne_utilisateur['avatar']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="adresse">adresse</label>
									<div class="col-md-4">
										<input name="adresse" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['adresse']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="code_postal">code postal</label>
									<div class="col-md-4">
										<input name="code_postal" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['code_postal']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="ville">ville</label>
									<div class="col-md-4">
										<input name="ville" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['ville']; ?>">
									</div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
									<label class="col-md-4 control-label" for="pays">pays</label>
									<div class="col-md-4">
										<input name="pays" type="text" class="form-control input-md" value="<?= $ligne_utilisateur['pays']; ?>">
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
