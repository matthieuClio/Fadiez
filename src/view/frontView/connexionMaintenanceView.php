<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include'header/headerView.php'; ?>
	</head>

	<body>
		<main style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; height: 100vh; background-color: #373737; color: white; font-size: 2em; text-align: center;">
			<i class="fa fa-music" aria-hidden="true" style="width: 100%; font-size: 5em"></i>
			<form method="post" action="admin">
				Password :
				<br>
				<input type="password" name="passwordMaintenance" style="margin-top:10px;">
				<br>
				<input type="submit" name="validationMaintenance" value="Valider" style="margin-top:10px; padding: 5px">
				<?php 
					if(!empty($_SESSION['admin'])) {
					?>
						<input type="submit" name="disconnectionMaintenance" value="Deconnexion" style="margin-top:10px; padding: 5px">
					<?php
					}
				?>
			</form>
		</main>
	</body>
</html>