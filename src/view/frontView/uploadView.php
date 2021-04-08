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
                Mettez en ligne votre musique
            </h1>

            <!-- Icon upload -->
            <div class="upload-main-icon text-align-center-fact">
                <i class="fa fa-upload" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="upload-design-element">
            </div>
            
            <!-- User data -->
            <form action="upload" method="post" class="margin-top-fact text-align-center-fact padding-bottom-fact" enctype="multipart/form-data">
                <section>
                    <h2 class="margin-bottom-fact">Informations requis</h2>

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

                    <div class="font-size-secondary-fact margin-top-fact">
                        <!-- Label -->
                        <label class="account-information-file font-weight-bold-fact text-align-left-fact">
                            Image :
                        </label>

                        <!-- Data -->
                        <input 
                            type="file" 
                            name="image"
                            required
                            class="upload-information-input-file"
                        >
                    </div>

                    <div class="font-size-secondary-fact margin-top-fact">
                        <!-- Label -->
                        <label class="account-information-file font-weight-bold-fact text-align-left-fact">
                            Audio :
                        </label>

                        <!-- Data -->
                        <input 
                            type="file" 
                            name="upload"
                            required
                            class="upload-information-input-file"
                        >
                    </div>

                    <input type="hidden" name="idUser" value="<?php if(!empty($info)) { echo $info['id']; }?>"/>
                    <input type="submit" name="submitButton" value="Envoyer" class="light-button-fact margin-top-fact"/>
                </section>
            </form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>