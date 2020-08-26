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
			<div class="backoffice-compte-bar-title">
				<div>
					Nom
				</div>

				<div>
					Prenom
				</div>

				<div>
					Email
				</div>

				<div>
					Info
				</div>
			</div>

			<?php while($info = $dataUser->fetch()) { ?>
				<!-- Data table -->
				<form action="backoffice/info" method="post" class="backoffice-compte-bar-data">
					<div>
						<?php 
							echo $info['name'];
						?>
					</div>

					<div>
						<?php
							echo $info['first_name']; 
						?> 
					</div>

					<div>
						<?php
							echo $info['email'];
						?> 
					</div>

					<div>
						<input type="submit" name="infoAccount" value="Info" class="backoffice-compte-button"/>
						<input type="hidden" name="idAccount" value="<?php echo $info['id'];?>"/>
					</div>
				</form>
			<?php } ?>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadHomeBackofficePage.php'; ?>
	</body>
</html>