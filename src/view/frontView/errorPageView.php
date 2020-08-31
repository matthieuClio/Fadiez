<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include'header/headerView.php'; ?>
	</head>

	<body>
		<header>
			<!-- Menu -->
			<?php include'menu/menuView.php'; ?>
		</header>

		<main class="error-container page-container-fact color-primary-fact">
			<section class="text-align-center-fact">
				<h1>Erreur 404</h1>
				<p class="error-text">Veuillez vérifier le lien entré</p>
				<a href="accueil" class="light-button-fact">Retourner à l'accueil</a>
			</section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/pricingPage/jsLoadPricingPage.php'; ?>
	</body>
</html>