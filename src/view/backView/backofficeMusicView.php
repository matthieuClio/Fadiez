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

		<main class="backoffice-music-container">
            <h1 class="text-align-center-fact">
				Validation des musiques
			</h1>
			
			<!-- Icon music -->
            <i class="fa fa-music backoffice-music-icon text-align-center-fact" aria-hidden="true"></i>

			<!-- Title table -->
			<div class="backoffice-music-bar-title text-align-center-fact font-size-secondary-fact">
				Musique(s) en cours de validation : <span class="font-weight-bold-fact"><?php echo $nbMusic;?></span>
			</div>

			<form action="backoffice/musique" method="post">
				<?php
					while($musicData = $dataMusic->fetch()) 
					{
					?>
						<!-- Audio -->
						<figure class="backoffice-music-audio-container text-align-center-fact padding-top-fact padding-bottom-fact">
							<figcaption class="font-size-default-fact margin-bottom-fact">
								<?php echo $musicData['music_name']; ?>
							</figcaption>

							<audio
								controls
								src="public/music/<?php echo $musicData['file_name'];?>"> Your browser does not support the
								<code>audio</code> element.
							</audio>
							
							<div class="backoffice-music-radio-accepted margin-top-fact">
								<input type="radio" name="<?php echo $counter;?>" id="<?php echo $counter.'accepted';?>" value="valide">
								<label for="<?php echo $counter.'accepted';?>" class="font-size-secondary-fact margin-right-fact">Accepté</label>

								<input type="radio" name="<?php echo $counter;?>" class="margin-left-fact" id="<?php echo $counter.'refuse';?>" value="refuse">
								<label for="<?php echo $counter.'refuse';?>" class="font-size-secondary-fact">Refusé</label>

								<input type="hidden" name="<?php echo 'id'.$counter;?>" value="<?php echo $musicData['id'];?>">
							</div>
						</figure>

						<?php
						$counter++; // Variable create in the controller BackofficeMusic.php
					} // End while
				?>

				<!-- Space element -->
				<div class="backoffice-music-space">
				</div>

				<div class="backoffice-music-validation-container text-align-center-fact">
					<input type="hidden" name="nbMusic" value="<?php echo $counter;?>">
					<input type="submit" name="submitted" value="valider la séléction" class="light-button-fact">
				</div>
			</form>

			<!-- Paging module --> 
			<form action="backoffice/musique" method="post" class="module-paging text-align-center-fact font-size-tertiary-fact">
				<div class="module-paging-button-container">
					<!-- Previous button --> 
					<?php
					if($currentPage != 1) {
						?><input type="submit" name="previous" class="module-paging-button" value="<"/> <?php
					}
					?>

					<input type="button" name="current" class="module-paging-button module-paging-button-current margin-left-fact color-primary-fact" value="<?php echo $currentPage;?>"/>
					
					<!-- Next button --> 
					<?php
					if($currentPage <= $nbPage) {
						?><input type="submit" name="next" class="module-paging-button margin-left-fact" value=">"/> <?php
					}
					?>
				</div>

				<select name="pageSelect" class="module-paging-button-page margin-top-fact">
					<option value="<?php echo $counterPagination;?>"><?php echo $counterPagination; ?></option>
					<?php

					while($counterPagination < $nbPage) {
						$counterPagination++;
						?><option value="<?php echo $counterPagination;?>"><?php echo $counterPagination; ?></option><?php
					}
					?>
				</select>
				<input type="submit" name="validation" class="module-paging-button-page margin-top-fact" value="Aller à la page"/>
				<input type="hidden" name="currentPagePost" value="<?php echo $currentPage;?>"/>
			</form>

			<!-- Space --> 
            <div class="music-space padding-bottom-fact">
            </div>

			<!-- Space --> 
            <div class="music-space">
            </div>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadMusicBackofficePage.php';?>
	</body>
</html>