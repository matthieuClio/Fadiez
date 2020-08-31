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

		<main class="login-container padding-top-fact color-primary-fact">
			<h1 class="text-align-center-fact margin-top-fact">Login</h1>
			<!-- Login form -->
			<form action="connexion" method="post" class="login-form margin-top-fact">
				<div class="login-center-container">	
					
					<div class="login-error-message margin-bottom-fact">
						<?php 
							if(!empty($_SESSION['error'])) {
								echo $_SESSION['error'];
							}
						?>
					</div>

					<label class="login-text">
						Email :
					</label>
					<input 
						type="email" 
						name="email" 
						class="login-input" 
						placeholder="Email" 
						value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"
						required
					/>

					<label class="login-text margin-top-fact">
						Mot de passe :
					</label>
					<input type="password" name="password" class="login-input" placeholder="Mot de passe" id="password" required/>

					<div class="login-eye-icon-container text-align-right-fact">
						<i class="fa fa-eye eye-icon-fact" aria-hidden="true" id="eye-icon-visible" ></i>
						<i class="fa fa-eye-slash eye-icon-crossed-fact" aria-hidden="true" id="eye-icon-invisible"></i>
					</div>

					<div class="login-input-button">
						<input type="submit" name="submitConnexion" class="light-button-fact" value="Valider"/>
					</div>
				</div>
			</form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/loginPage/jsLoadLoginPage.php'; ?>
	</body>
</html>