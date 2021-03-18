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

		<main class="music-container color-primary-fact">
            <h1 class="text-align-center-fact">
                Musique(s) mis en Ligne
            </h1>

            <!-- Icon upload -->
            <div class="music-main-icon text-align-center-fact">
                <i class="fa fa-music" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="music-design-element">
            </div>

            <!-- Title table -->
            <div class="music-bar-title text-align-center-fact font-size-secondary-fact">
                <div class="music-information-title-name text-align-center-fact">
                    Nom de la musique
                </div>

                <div class="music-information-title-stats text-align-center-fact">
                    Etat
                </div>
            </div>

            <?php
                while($musicData = $dataMusic->fetch()) 
                {
                ?>
                    <!-- Table -->
                    <div class="music-information-container padding-top-fact padding-bottom-fact">
                        <div class="music-information-name font-size-secondary-fact text-align-center-fact">
                            <?php echo $musicData['music_name']; ?>
                        </div>

                        <!-- Valid state -->
                        <?php 
                        if($musicData['uploaded'] == "valide") 
                        {
                        ?>
                            <div class="music-information-stats font-size-secondary-fact text-align-center-fact">
                                <span class="color-valid-fact"><?php echo $musicData['uploaded'];?></span>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Treatment state -->
                         <?php 
                        if($musicData['uploaded'] == "traitement") 
                        {
                        ?>
                            <div class="music-information-stats font-size-secondary-fact text-align-center-fact">
                                <span class="color-secondary-fact"><?php echo $musicData['uploaded'];?></span>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Refuse state -->
                         <?php 
                        if($musicData['uploaded'] == "refuse") 
                        {
                        ?>
                            <div class="music-information-stats font-size-secondary-fact text-align-center-fact">
                                <span class="color-error-fact"><?php echo $musicData['uploaded'];?></span>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                $counter++; // Variable create in the controller Music.php
                } // End while
            ?>
            
            <!-- Space --> 
            <div class="music-space clear-both-fact">
            </div>

            <!-- Paging --> 
            <form action="music" method="post" class="module-paging text-align-center-fact">
                <input type="submit" class="module-paging-button" value="<"/>
                <input type="submit" class="module-paging-button margin-left-fact" value="<?php echo $counter;?>"/>
                <input type="submit" class="module-paging-button margin-left-fact" value=">"/>

                <select name="pets" class="module-paging-button-page margin-top-fact">
                    <option value="">-- Choose an option--</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="hamster">Hamster</option>
                    <option value="parrot">Parrot</option>
                    <option value="spider">Spider</option>
                    <option value="goldfish">Goldfish</option>
                </select>
                <input type="submit" class="module-paging-button-page margin-top-fact" value="Aller à la page"/>
            </form>

            <!-- Space -->
            <div class="music-space">
            </div>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php';?>

		<!-- Js load -->
		<?php include'js/musicPage/jsLoadMusicPage.php';?>
	</body>
</html>