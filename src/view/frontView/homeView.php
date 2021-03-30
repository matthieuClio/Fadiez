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

		<!-- Notification -->
		<?php
		if(!empty($_SESSION['notification']))
		{
			?>
				<div class="module-notification text-align-center-fact font-size-secondary-fact" id="module-notification-id">
					<span class="module-notification-text" id="module-notification-text-id">Connexion résussie</span>
				</div>
			<?php
			// Erase the $_SESSION notifacation
			unset($_SESSION['notification']);
		}
		?>

		<section class="hero">
			<div class="hero-container text-align-center-fact" id="hero-container-id">
				<h1 class="hero-title" id="hero-title-id">
					<span class="hero-text">Obtenez de la musique en ilimitée</span>
					<span class="hero-text display-none-fact">Slide 2</span>
					<span class="hero-text display-none-fact">Slide 3</span>
				</h1>

				<div id="button-container-id">
					<a href="inscription" class="hero-button-primary light-button-fact" id="hero-button-left-id">
						Gratuit
					</a>
					<a href="tarification" class="hero-button-secondary default-button-fact" id="hero-button-right-id">
						Tarification
					</a>
				</div>
			</div>

			<figure class="hero-image-container">
				<?php
				$classCss = 'display-block-fact';

				while($sliderInformations = $dataSlider->fetch()) 
				{
				?>
					<img src="public/images/homePage/slider/<?php echo $sliderInformations['url'];?>" alt="<?php echo $sliderInformations['description'];?>" class="hero-slide <?php echo $classCss;?>">
				<?php
					// Hide the other slides
					$classCss = 'display-none-fact';
				}
				?>
			</figure>

			<div class="hero-circle-container text-align-center-fact color-quaternary-fact">
				<i class="fa fa-circle margin-right-fact color-primary-fact cursor-pointer-fact" aria-hidden="true" id="hero-circle-one-id"></i>
				<i class="fa fa-circle margin-right-fact cursor-pointer-fact" aria-hidden="true" id="hero-circle-two-id"></i>
				<i class="fa fa-circle cursor-pointer-fact" aria-hidden="true" id="hero-circle-tree-id"></i>
			</div>
		</section>

		<main>
			<article class="home-information padding-top-fact padding-bottom-fact">
				<h2> Présentation </h2>

				<p class="home-information-text text-align-left-fact margin-top-fact">
					Lorem ipsum dolor sit amet, 
					consectetur adipiscing elit. 
					Cras tortor magna, porta eget efficitur vel, 
					pharetra nec turpis. 
					Mauris mauris lectus,
					ultrices a condimentum vel, 
					aliquet ac nisi.
					<br><br>
					Lorem ipsum dolor sit amet, 
					consectetur adipiscing elit. 
					Cras tortor magna, porta eget efficitur vel, 
					pharetra nec turpis. 
					Mauris mauris lectus,
					ultrices a condimentum vel, 
					aliquet ac nisi.
				</p>

				<a href="tarification" class="home-link-premium light-button-fact">
					<i class="fas fa-gem"></i>
					Passer prenium
				</a>
			</article>
			
			<div class="container-background">
				<section class="playlist-container">
					<!-- Music name-->
					<div class="music-title"> 
						<h3 class="music-title-text">Playlist</h3>
					</div>

					<?php
					while($musicData = $dataMusic->fetch())
					{
					?>
						<!-- List secondary players -->
						<div class="player">
							<!-- Image -->
							<img src="public/images/music/<?php echo $musicData['image_name'] ?>" alt="image de la musique" class="player-image"/>

							<!-- Play icon -->
							<i class="fas fa-play player-play-icon" title="Jouer"></i>

							<!-- Pause icon -->
							<i class="fas fa-pause player-pause-icon" title="Pause"></i>

							<!-- Song name -->
							<p class="player-song-name"><?php echo $musicData['music_name'];?></p>

							<!-- Mute icon -->
							<i class="fas fa-volume-up player-mute-icon" title="Mettre en sourdine"></i>

							<!-- Unmute icon -->
							<i class="fas fa-volume-mute player-unmute-icon" title="Réactiver le son"></i>

							<!-- Timer -->
							<div class="player-timer">
								<span class="player-timer-minute">
									00
								</span>
									:
								<span class="player-timer-second">
									00
								</span>
							</div>

							<!-- Range bar -->
							<input type="range" class="player-seek-bar" value="0" min="0" max="100">

							<!-- Favorite icon -->
							<i class="far fa-star player-favorite"></i>
							
							<?php
								if(!empty($_SESSION['pseudoUser']) && $dataAccount == 'oui') 
								{
									?>
										<!-- Download icon -->
										<a href="public/music/<?php echo $musicData['file_name'];?>" class="margin-left-fact" download="<?php echo $musicData['file_name'];?>">
											<i class="fas fa-download player-download"></i>
										</a>
									<?php
								}
							?>
				
							<!-- File musique name -->
							<input type="hidden" value="public/music/<?php echo $musicData['file_name'];?>" class="music-file-name">

							<!-- Id player -->
							<input type="hidden" value="<?php echo $counter;?>" class="player-value">
						</div>
						<?php
						$counter++; // Variable create in the controller Home.php
					} // End while
					?>

					<!-- Space --> 
					<div class="music-space">
					</div>

					<!-- Paging module-->
					<form action="accueil" method="post" class="module-paging text-align-center-fact ">
						<div class="module-paging-button-container cursor-pointer-fact">
							<!-- Previous button --> 
							<?php
							if($currentPage != 1) 
							{
								?><input type="submit" name="previous" class="module-paging-button cursor-pointer-fact" value="<"/> <?php
							}
							?>

							<input type="button" name="current" class="module-paging-button module-paging-button-current margin-left-fact color-primary-fact" value="<?php echo $currentPage;?>"/>
							
							<!-- Next button --> 
							<?php
							if($currentPage < $nbPage)
							{
								?><input type="submit" name="next" class="module-paging-button margin-left-fact cursor-pointer-fact" value=">"/><?php
							}
							?>
						</div>

						<select name="pageSelect" class="module-paging-button-page margin-top-fact cursor-pointer-fact">
							<option value="<?php echo $counterPagination;?>"><?php echo $counterPagination; ?></option>
							<?php

							while($counterPagination < $nbPage) 
							{
								$counterPagination++;
								?><option value="<?php echo $counterPagination;?>"><?php echo $counterPagination; ?></option><?php
							}
							?>
						</select>

						<div class="width-max-fact">
							<input type="submit" name="validation" class="module-paging-button-page margin-top-fact cursor-pointer-fact" value="Aller à la page"/>
							<input type="hidden" name="currentPagePost" value="<?php echo $currentPage;?>"/>
						</div>
					</form>

					<!-- Sliding block -->
					<div class="main-player-container">
						<div class="sliding-block">
							<span class="display-player">
								Afficher le lecteur
								<i class="fa fa-arrow-up" aria-hidden="true"></i>
							</span>

							<span class="hide-player">
								<i class="fa fa-arrow-down" aria-hidden="true"></i>
							</span>
						</div>

						<!-- Main players -->
						<div class="main-player">
							<!-- Image -->
							<img src="public/images/homePage/slider/casque.jpg" alt="image de la musique" class="main-player-image"/>

							<!-- Step-backward container -->
							<div class="player-backward-container">
								<!-- Step-backward icon -->
								<i class="fa fa-step-backward player-backward-icon" aria-hidden="true" title="Musique précédante"></i>
							</div>

							<!-- Player icon -->
							<i class="fas fa-play main-player-play-icon font-size-secondary-fact" title="Jouer"></i>

							<!-- Pause icon -->
							<i class="fas fa-pause main-player-pause-icon font-size-secondary-fact" title="Pause"></i>

							<!-- Step-forward container -->
							<div class="player-forward-container">
								<!-- Step-forward icon -->
								<i class="fa fa-step-forward player-forward-icon" aria-hidden="true" title="Musique suivante"></i>
							</div>

							<!-- Song name -->
							<span class="main-player-song-name">---</span>

							<!-- Mute/unmute containter -->
							<div class="main-player-mute-container">
								<!-- Mute icon -->
								<i class="fas fa-volume-up main-player-mute-icon" title="Mettre en sourdine"></i>
							
								<!-- Unmute icon -->
								<i class="fas fa-volume-mute main-player-unmute-icon" title="Réactiver le son"></i>
							</div>

							<!-- Timer -->
							<div class="main-player-timer">
								<span class="main-player-timer-minute">
									00
								</span>
									:
								<span class="main-player-timer-second">
									00
								</span>
							</div>

							<!-- Range bar -->
							<input type="range" class="main-player-seek-bar" id="range" value="0" min="0">

							<!-- Favorite icon -->
							<i class="far fa-star main-player-favorite"></i>

							<!-- Download icon -->
							<i class="fas fa-download main-player-download"></i>

						</div> <!-- End main player -->
					</div> <!-- End main player container -->
				</section>
			</div>		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>