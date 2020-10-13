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

				<!-- List players -->
				<div class="player">
					<!-- Image -->
					<img src="public/images/homePage/slider/casque.jpg" alt="image de la musique" class="player-image"/>

					<!-- Play icon -->
					<i class="fas fa-play player-play-icon" title="Jouer" id="play"></i>

					<!-- Pause icon -->
					<i class="fas fa-pause player-pause-icon" title="Pause" id="pause"></i>

					<!-- Song name -->
					<p class="player-song-name" id="musicName">[Musique Name]</p>

					<!-- Mute icon -->
					<i class="fas fa-volume-up player-mute-icon" title="Mettre en sourdine" id="mute"></i>

					<!-- Unmute icon -->
					<i class="fas fa-volume-mute player-unmute-icon" title="Réactiver le son" id="unmute"></i>

					<!-- Timer -->
					<div class="player-timer">
						<span id="minute">
							00
						</span>
							:
						<span id="second">
							00
						</span>
					</div>

					<!-- Range bar -->
					<input type="range" class="player-seek-bar" id="range" value="0" min="0">

					<!-- Favorite icon -->
					<i class="far fa-star player-favorite"></i>

					<!-- Download icon -->
					<i class="fas fa-download player-download"></i>

					<!-- File musique name -->
					<input type="hidden" value="musique.mp3" id="musicFileName">
				</div>
				<p class="playlist-text">
					Player (Alpha)
				</p>
			</section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/homePage/jsLoadHomePage.php'; ?>
	</body>
</html>