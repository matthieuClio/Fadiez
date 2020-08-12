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

		<main>
            <section class="pricing-container">
                <h1 class="pricing-main-title color-primary-fact">
                    Choisis ton plan
                </h1>

                <article class="pricing">
                    <h2 class="pricing-title">
                        Starter
                    </h2>
                    <header class="pricing-icon">
                       <i class="fas fa-walking"></i>
                    </header>
                    <div class="pricing-description">
                        Ecoute en <span class="font-weight-bold-fact ">illimité</span>
                    </div>
                    <p class="pricing-price">
                        Gratuit
                    </p>
                    <div class="pricing-button light-button-fact ">
                        Choisir
                    </div>
                </article>

                <article class="pricing">
                    <h2 class="pricing-title color-secondary-fact   ">
                        Premium
                    </h2>
                    <header class="pricing-icon color-secondary-fact">
                        <i class="fas fa-gem"></i>
                    </header>
                    <div class="pricing-description color-secondary-fact">
                        Ecoute + Téléchargement
                    </div>
                    <p class="pricing-price color-secondary-fact">
                        10€
                    </p>
                    <div class="pricing-button">
                        Choisir
                    </div>
                </article>
            </section>
		</main>

		<!-- Footer -->
		<?php //include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>