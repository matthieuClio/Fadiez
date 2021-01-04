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

		<section class="hero">
			<div class="hero-container">
				<h1 class="hero-text">
					Obtenez de la musique en ilimitée
				</h1>
				<a href="inscription" class="light-button-fact hero-button-primary">
					Gratuit
				</a>
				<a href="tarification" class="default-button-fact hero-button-secondary">
					Tarification
				</a>
			</div>
			<img src="public/images/homePage/slider/casque.jpg" alt="casque"/>
		</section>

		<main>
			<article class="home-information padding-top-fact padding-bottom-fact">
				<h2> Titre </h2>

				<p class="home-information-text text-align-left-fact margin-top-fact">
					Lorem ipsum dolor sit amet, 
					consectetur adipiscing elit. 
					Cras tortor magna, porta eget efficitur vel, 
					pharetra nec turpis. 
					Mauris mauris lectus,
					ultrices a condimentum vel, 
					aliquet ac nisi.
				</p>
			</article>

			<section class="playlist-container">
				<!-- Music name-->
				<div class="music-title">
					<i class="fas fa-music"></i>
					<span class="music-title-text">-MUSIC NAME-</span>
					<i class="fas fa-music"></i>
				</div>

				<?php
				while($musicData = $dataMusic->fetch()) {
				?>
					<!-- List secondary players -->
					<div class="player">
						<!-- Image -->
						<img src="public/images/homePage/slider/casque.jpg" alt="image de la musique" class="player-image"/>

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

						<!-- Download icon -->
						<i class="fas fa-download player-download"></i>

						<!-- File musique name -->
						<input type="hidden" value="public/music/<?php echo $musicData['file_name'];?>" class="music-file-name">

						<!-- Id player -->
						<input type="hidden" value="<?php echo $counter;?>" class="player-value">
					</div>
					<?php
					$counter++; // Variable create in the controller Home.php
				} // End while
				?>

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

						<!-- File musique name -->
						<!-- <input type="hidden" value="musique.mp3" id="musicFileName"> -->
					</div> <!-- End main player -->
				</div> <!-- End main player container -->
			</section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>