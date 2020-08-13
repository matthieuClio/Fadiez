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

		<section class="hero">
			<div class="hero-container">
				<h1 class="hero-text">
					Obtenez de la musique en ilimitée
				</h1>
				<a class="light-button-fact hero-button-primary">
					Gratuit
				</a>
				<a href="pricing" class="default-button-fact hero-button-secondary">
					Tarification
				</a>
			</div>
			<img src="public/images/homePage/slider/casque.jpg" alt="casque"/>
		</section>

		<main>
			<section class="playlist-container">
				<p class="playlist-text">
					Lecteur de musique en cours de développement
				</p>
			</section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>