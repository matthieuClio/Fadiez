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

		<main class="upload-container color-primary-fact">
            <h1 class="text-align-center-fact">
                Musique(s) mis en Ligne
            </h1>

            <!-- Icon upload -->
            <div class="upload-main-icon text-align-center-fact">
                <i class="fa fa-music" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="upload-design-element">
            </div>
            
            <!-- User data -->
            <form action="upload" method="post" class="margin-top-fact text-align-center-fact padding-bottom-fact" enctype="multipart/form-data">
                <section>
                    <h2 class="margin-bottom-fact">En cours de développement...</h2>

                    <!-- Error message -->
                    <?php 
                    if(!empty($infoMessage[0])) { ?>
                        <div class="upload-information-errorMessage">
                            <?php
                            echo $infoMessage[0];
                            ?>
                        </div>
                    <?php 
                    } ?>

                    <!-- Success message -->
                    <?php 
                    if(!empty($infoMessage[1])) { ?>
                        <div class="upload-information-successMessage">
                            <?php
                            echo $infoMessage[1];
                            ?>
                            
                            <div> <!-- Use for put the button below the text -->
                                <a href="music" class="upload-information-button">
                                    Voir la musique
                                </a>
                            </div>
                        </div>
                    <?php 
                    } ?>

                    <!-- Title table -->
                    <div class="backoffice-music-bar-title text-align-center-fact font-size-secondary-fact">
                        Etat des musiques mis en ligne :
                    </div>

                </section>
            </form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>