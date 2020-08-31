
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

		<main class="account-container padding-top-fact color-primary-fact">
            <h1 class="text-align-center-fact">
                Compte
            </h1>

            <!-- Icon compte -->
            <div class="account-main-icon text-align-center-fact">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="account-design-element margin-top-fact">
            </div>
            
            <!-- Link icon -->
            <div>
                
            </div>

            <form method="post" action="compte" class="text-align-center-fact margin-top-fact">
                <input type="submit" name="disconnection" value="Déconnexion" class="light-button-fact"/>
            </form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>