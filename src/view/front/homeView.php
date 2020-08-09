<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include'header/header_view.php'; ?>
	</head>

	<body>
		<header>
			<!-- Menu -->
			<?php include'menu/menuView.php'; ?>
		</header>

		<section class="hero">
			<div class="hero-container">
				<h1 class="hero-text">
					Get unlimited music & SFX for your videos
				</h1>
				<a class="light-button-fact hero-button-primary">
					Start free now
				</a>
				<a class="default-button-fact hero-button-secondary">
					Pricing
				</a>
			</div>
			<img src="public/images/homePage/slider/casque.jpg" alt="casque"/>
		</section>

		<main>
			<section class="playlist-container">

			</section>
		</main>

		<!-- Footer -->
		<?php include'footer/footer_view.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>