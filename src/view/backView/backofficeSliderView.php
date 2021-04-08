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
            <section>
                <h1 class="text-align-center-fact">
                    Modification du slider
                </h1>

                <!-- Icon slider -->
                <i class="fa fa-picture-o backoffice-slider-icon text-align-center-fact" aria-hidden="true"></i>

                <!-- Error message -->
                <?php 
                    if(!empty($infoMessage[0])) 
                    { ?>
                        <div class="backoffice-slider-errorMessage text-align-center-fact">
                            <?php
                            echo $infoMessage[0];
                            ?>
                        </div>
                    <?php 
                    } ?>

                    <!-- Success message -->
                    <?php 
                    if(!empty($infoMessage[1])) 
                    { ?>
                        <div class="backoffice-slider-successMessage text-align-center-fact">
                            <?php
                            echo $infoMessage[1];
                            ?>
                        </div>
                    <?php 
                    }
                ?>
            </section>
		
            <!-- Title table -->
			<div class="backoffice-slider-bar-title text-align-center-fact font-size-secondary-fact">
				Slider :
			</div>

            <?php
            while($sliderInformation = $dataSlider->fetch()) 
            {
            ?>
                <form action="backoffice/slider" method="post" class="font-size-default-fact" enctype="multipart/form-data">
                    <figure class="backoffice-slider-element-container text-align-center-fact padding-top-fact padding-bottom-fact">
                        <!-- Image -->
                        <image src="public/images/homePage/slider/<?php echo $sliderInformation['url'];?>" class="backoffice-slider-image">

                        <figcaption>
                            <div class="width-full-fact margin-top-fact">
                                Image :
                            </div>
                            <!-- Data -->
                            <input 
                            type="file" 
                            name="upload"
                            required
                            class="backoffice-slider-input-file margin-top-fact"
                            >
                            <div>
                                (Eviter les majuscale, espace et caractère spéciaux)
                            </div>

                            <!-- Slide title -->
                            <div class="width-full-fact margin-top-fact">
                                Titre de la slide :
                            </div>
                            <input type="text" name="title<?php echo $counter;?>" class="margin-top-fact" required>

                            <!-- Description -->
                            <div class="width-full-fact margin-top-fact">
                                Description de l'image :
                            </div>
                            <input type="text" name="description<?php echo $counter;?>" class="margin-top-fact" required>

                            <div class="width-full-fact margin-top-fact">
                                <input type="submit" class="light-button-fact" value="Modifier">
                                <input type="hidden" name="idSlider<?php echo $counter;?>" value="<?php echo $sliderInformation['id'];?>">
                            </div>
                        </figcaption>
                    </figure>
                </form>
            <?php
                $counter++;
            }
            ?>
        </main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadHomeBackofficePage.php'; ?>
	</body>
</html>