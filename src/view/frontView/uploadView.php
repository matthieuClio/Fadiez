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

		<main class="upload-container padding-top-fact color-primary-fact">
            <h1 class="text-align-center-fact">
                Upload votre musique
            </h1>

            <!-- Icon upload -->
            <div class="upload-main-icon text-align-center-fact">
                <i class="fa fa-upload" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="upload-design-element">
            </div>
            
            <!-- User data -->
            <form action="" method="post" class="margin-top-fact text-align-center-fact padding-bottom-fact">
                <section>
                    <h2 class="margin-bottom-fact">Informations requis</h2>

                    <!-- Error message -->
                    <?php 
                    if(!empty($infoMessageDataUser[0])) { ?>
                        <div class="upload-information-errorMessage">
                            <?php
                            echo $infoMessageDataUser[0];
                            ?>
                        </div>
                    <?php 
                    } ?>

                    <!-- Success message -->
                    <?php 
                    if(!empty($infoMessageDataUser[1])) { ?>
                        <div class="upload-information-successMessage">
                            <?php
                            echo $infoMessageDataUser[1];
                            ?>

                            <a href="compte" class="upload-information-button">
                                Voir l'état de la mise en ligne de votre musique
                            </a>
                        </div>
                    <?php 
                    } ?>

                    <div class="margin-top-fact font-size-secondary-fact">
                        <!-- Label -->
                        <label class="upload-information-music font-weight-bold-fact text-align-left-fact">
                            Musique :
                        </label>

                        <!-- Data -->
                        <input 
                            type="text" 
                            name="music" 
                            required
                            class="upload-information-input"
                            value="<?php if(!empty($info)) { echo $info['name']; }?>"
                        >
                    </div>

                    <div class="font-size-secondary-fact">
                        <!-- Label -->
                        <label class="upload-information-artist font-weight-bold-fact text-align-left-fact">
                            Artiste :
                        </label>

                        <!-- Data -->
                        <input 
                            type="text" 
                            name="artist" 
                            required
                            class="upload-information-input"
                            value="<?php if(!empty($info)) { echo $info['first_name']; }?>"
                        >
                    </div>

                    <div class="font-size-secondary-fact">
                        <!-- Label -->
                        <label class="account-information-file font-weight-bold-fact text-align-left-fact">
                            Fichier :
                        </label>

                        <!-- Data -->
                        <input 
                            type="file" 
                            name="fileName"
                            required
                            class="upload-information-input-file"
                        >
                    </div>

                    <input type="hidden" name="idUser" value="<?php if(!empty($info)) { echo $info['id']; }?>"/>
                    <input type="submit" name="uploadMusic" value="Envoyer" class="light-button-fact margin-top-fact"/>
                </section>
            </form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>