<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include('header/headerView.php'); ?>
	</head>

	<body>
		<main class="bakoffice-login-container padding-top-fact color-primary-fact">
			<h1 class="text-align-center-fact margin-top-fact">
				<i class="fa fa-sign-in" aria-hidden="true"></i>
				Login Backoffice
			</h1>

			<!-- Login form -->
			<form action="backoffice" method="post" class="bakoffice-login-form margin-top-fact">
				<div class="bakoffice-login-center-container">	
					
					<div class="bakoffice-login-error-message margin-bottom-fact">
						<?php 
							if(!empty($_SESSION['error'])) {
								echo $_SESSION['error'];
							}
						?>
					</div>

					<label class="bakoffice-login-text">
						Email :
					</label>
					<input 
						type="email" 
						name="email" 
						class="bakoffice-login-input" 
						placeholder="Email" 
						value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"
						required
					/>

					<label class="bakoffice-login-text margin-top-fact">
						Mot de passe :
					</label>
					<input type="password" name="password" class="login-input" placeholder="Mot de passe" id="password" required/>

					<div class="bakoffice-login-eye-icon-container text-align-right-fact">
						<i class="fa fa-eye eye-icon-fact" aria-hidden="true" id="eye-icon-visible" ></i>
						<i class="fa fa-eye-slash eye-icon-crossed-fact" aria-hidden="true" id="eye-icon-invisible"></i>
					</div>

					<a href="accueil" class="bakoffice-login-link color-primary-fact">
						Revenir sur le site ? <span class="bakoffice-login-color-text">Cliquez-ici</span>
					</a>

					<div class="bakoffice-login-input-button">
						<input type="submit" name="submitConnexion" class="light-button-fact" value="Valider"/>
					</div>
				</div>
			</form>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadConnexionBackoffice.php'; ?>
	</body>
</html>