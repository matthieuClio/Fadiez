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

		<main class="backoffice-compte-container">
            <h1 class="text-align-center-fact">
				Gestion des comptes
			</h1>
			
			<!-- Icon compte -->
			<i class="fa fa-user backoffice-compte-icon-compte text-align-center-fact" aria-hidden="true"></i>

			<!-- Title table -->
			<div class="backoffice-compte-bar-title text-align-center-fact font-size-secondary-fact">
				Email
			</div>

			<div class="backoffice-compte-bar-title text-align-center-fact font-size-secondary-fact">
				Info
			</div>

			<?php while($info = $dataUser->fetch()) { ?>
				
				<!-- Data table -->
				<form action="backoffice/info" method="post" class="backoffice-compte-bar-container text-align-center-fact">
					<div class="backoffice-compte-bar-data">
						<?php
							echo $info['email'];
						?> 
					</div>

					<div class="backoffice-compte-bar-data">
						<input type="submit" name="infoAccount" value="Info" class="backoffice-compte-button"/>
						<input type="hidden" name="idAccount" value="<?php echo $info['id'];?>"/>
					</div>
				</form>
			<?php } ?>

			<!-- Space --> 
            <div class="music-space margin-top-fact clear-both-fact">
            </div>

			<!-- Paging module --> 
			<form action="music" method="post" class="module-paging text-align-center-fact font-size-tertiary-fact">
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

				<div class="width-max-fact">
					<input type="submit" name="validation" class="module-paging-button-page margin-top-fact" value="Aller à la page"/>
					<input type="hidden" name="currentPagePost" value="<?php echo $currentPage;?>"/>
				</div>
            </form>

			<!-- Space --> 
            <div class="music-space">
            </div>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadCompteBackofficePage.php'; ?>
	</body>
</html>