<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include('header/headerView.php'); ?>
	</head>

	<body>
        <main class="backoffice-connexion-background">
			<section class="backoffice-connexion-container">
				<figure class="backoffice-connexion-image">
					<img src="public/images/homePage/slider/casque.jpg" alt="casque"/>
				</figure>

				<div class="backoffice-connexion-error">
					<h3 style="font-size: 0.4em">
						<?php if(!empty($_SESSION['error'])){ echo $_SESSION['error'];} ?>
					</h3>
				</div>
				
				<form method="post" action="backoffice" class="backoffice-connexion-form">
					<p class="backoffice-connexion-paragraph">
						Email :
					</p>
					<input type="text" name="email" class="backoffice-connexion-input" required>

					<p class="backoffice-connexion-paragraph">
						Mot de passe :
					</p>
					<input type="password" name="password" class="backoffice-connexion-input" required>
							
					<div class="backoffice-connexion-container-submit">
						<input type="submit" name="submitConnexion" value="Connexion" class="default-button-fact">
					</div>
				</form>
			</section>
		</main>

		<!-- Js load -->
		<?php //include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>