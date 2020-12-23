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
            <section class="pricing-info-free-container" id="pricing-free-container">
                <div class="pricing-info-free-button">
                    <i class="fa fa-times-circle pricing-info-free-button-icon" aria-hidden="true" id="pricing-free-close-icon"></i>
                </div>

                <h2 class="pricing-info-free-title">
                    Starter
                </h2>

                <i class="fas fa-walking pricing-info-free-icon"></i>
                
                <p class="pricing-info-free-text">
                    Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. 
                    Cras tortor magna, porta eget efficitur vel,
                    pharetra nec turpis. 
                    Mauris mauris lectus, 
                    ultrices a condimentum vel, aliquet ac nisi.
                </p>

                <div class="pricing-info-free-paypal light-button-fact">
                    Button Paypal
                </div>
            </section>

            <section class="pricing-info-premium-container" id="pricing-premium-container">
                <div class="pricing-info-premium-button">
                    <i class="fa fa-times-circle pricing-info-premium-button-icon" aria-hidden="true" id="pricing-premium-close-icon"></i>
                </div>

                <h2 class="pricing-info-premium-title">
                    Premium
                </h2>
                <i class="fas fa-gem pricing-info-premium-icon"></i>
                
                <p class="pricing-info-premium-text">
                    Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. 
                    Cras tortor magna, porta eget efficitur vel,
                    pharetra nec turpis. 
                    Mauris mauris lectus, 
                    ultrices a condimentum vel, aliquet ac nisi.
                </p>

                <div class="pricing-info-premium-paypal light-button-fact">
                    Button Paypal
                </div>
            </section>

            <section class="page-container-fact">
                <h1 class="page-main-title-fact color-primary-fact">
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
                    <div class="pricing-button light-button-fact" id="pricing-free-button">
                        Choisir
                    </div>
                </article>

                <article class="pricing pricing-bottom-space">
                    <h2 class="pricing-title color-secondary-fact   ">
                        Premium
                    </h2>
                    <header class="pricing-icon color-secondary-fact">
                        <i class="fas fa-gem"></i>
                    </header>
                    <div class="pricing-description color-secondary-fact">
                        Ecoute et <span class="font-weight-bold-fact ">Téléchargement</span>
                    </div>
                    <p class="pricing-price color-secondary-fact">
                        10€
                    </p>
                    <div class="pricing-button" id="pricing-premium-button">
                        Choisir
                    </div>
                </article>
            </section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/pricingPage/jsLoadPricingPage.php'; ?>
	</body>
</html>