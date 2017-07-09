<?php require '../connexion/connexion.php' ?>
<?php

// Gestion des contenus, mise à jour d'une compétence
	if(isset($_POST['titre'])){
		$titre = addslashes($_POST['titre']);
        $sousTitre = addslashes($_POST['sousTitre']);
        $date = addslashes($_POST['date']);
        $description = addslashes($_POST['description']);
		$id_experience = $_POST['id_experience'];
		$pdoCV->exec(" UPDATE t_experiences SET titre_e = '$titre',sous_titre_e='$sousTitre',dates_e = '$date',description_e = '$description' WHERE id_experience='$id_experience' ");
		header('location: index.php');
		exit();
	}

// Je recupere les info experience
	$id_experience = $_GET['id_experience']; // par l'id et $_GET
	$sql = $pdoCV->query(" SELECT * FROM t_experiences WHERE id_experience = '$id_experience' "); // la requête égale à l'id
	$ligne_experience = $sql->fetch(); //

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
                        <a class="page-scroll" href="#about">Loisirs</a>
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

    <!-- /.contenue modif-->

    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<h2>Modification d'une experience</h2>
                        <table class="table table-striped">
							<thead>
								<tr class="info">
                                    <th scope="col">Titre</th>
                                    <th scope="col">Sous-titre</th>
                                    <th scope="col">Date</th>
									<th scope="col">Description</th>
									<th scope="col">Modifier</th>
									<th scope="col">Supprimer</th>
								</tr>
							</thead>
							<tbody>
								<?php while($ligne = $sql->fetch()){ ?>
								<tr>
									<td>
                                        <?= $ligne['titre_e']; ?>
                                    </td>
                                    <td>
                                        <?= $ligne['sous_titre_e']; ?>
                                    </td>
                                    <td>
                                        <?= $ligne['dates_e']; ?>
                                    </td>
                                    <td>
										<?= $ligne['description_e']; ?>
                                    </td>
									<td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
									<td><a href="index.php?id_experience=<?= $ligne['id_experience']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<form class="form-horizontal" method="post">
							<fieldset>

							<!-- Form Name -->
							<legend>Modification experience</legend>

                            <!-- Text input--> 
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">titre</label>  
            <div class="col-md-4">
                <input name="titre" type="text" class="form-control input-md" value="<?= $ligne_experience['titre_e']; ?>">
                <input name="id_experience" hidden value="<?= $ligne_experience['id_experience']; ?>">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="sousTitre">sousTitre</label>  
            <div class="col-md-4">
                <input name="sousTitre" type="text" class="form-control input-md" value="<?= $ligne_experience['sous_titre_e']; ?>">
                <input name="id_experience" hidden value="<?= $ligne_experience['sous_titre_e']; ?>">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="date">date</label>  
            <div class="col-md-4">
                <input name="date" type="text" class="form-control input-md" value="<?= $ligne_experience['dates_e']; ?>">
                <input name="id_experience" hidden value="<?= $ligne_experience['dates_e']; ?>">
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">description</label>
            <div class="col-md-4">                     
                <input name="description" type="text" class="form-control input-md" value="<?= $ligne_experience['description_e']; ?>">
                <input name="id_experience" hidden value="<?= $ligne_experience['description_e']; ?>">
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
