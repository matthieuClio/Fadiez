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

		<main class="backoffice-compte-container">
            <h1 class="text-align-center-fact">
				Gestion des comptes
			</h1>
			
			<!-- Icon compte -->
			<i class="fa fa-user backoffice-compte-icon-compte text-align-center-fact" aria-hidden="true"></i>

			<!-- Title table -->
			<div class="backoffice-compte-bar-title text-align-center-fact font-size-secondary-fact">
				Email
			</div>

			<div class="backoffice-compte-bar-title text-align-center-fact font-size-secondary-fact">
				Info
			</div>

			<?php while($info = $dataUser->fetch()) { ?>
				
				<!-- Data table -->
				<form action="backoffice/info" method="post" class="backoffice-compte-bar-container text-align-center-fact">
					<div class="backoffice-compte-bar-data">
						<?php
							echo $info['email'];
						?> 
					</div>

					<div class="backoffice-compte-bar-data">
						<input type="submit" name="infoAccount" value="Info" class="backoffice-compte-button"/>
						<input type="hidden" name="idAccount" value="<?php echo $info['id'];?>"/>
					</div>
				</form>
			<?php } ?>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadCompteBackofficePage.php'; ?>
	</body>
</html>