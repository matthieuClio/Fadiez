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

		<main class="backoffice-compte-container-info">
            <h1 class="text-align-center-fact">
                Gestion des comptes
            </h1>
            
            <!-- Icon compte -->
            <i class="fa fa-user backoffice-compte-icon-compte-info text-align-center-fact" aria-hidden="true"></i>
            
            <!-- Icon retour -->
            <a href="backoffice/compte">
                <i class="fa fa-arrow-left backoffice-compte-icon-arrow-info margin-left-fact color-primary-fact" aria-hidden="true"></i>
            </a>
            
            <?php if(!empty($info)) { ?>
                <!-- Data table -->
                <div class="backoffice-compte-bar-data-info">
                    <div class="backoffice-compte-user-info text-align-center-fact">
                        <span class="font-weight-bold-fact">
                            Nom :
                        </span>

                        <span class="color-secondary-fact">
                            <?php 
                                echo $info['name'];
                            ?>
                        </span>
                    </div>

                    <div class="backoffice-compte-user-info text-align-center-fact">
                        <span class="font-weight-bold-fact">
                            Prénom :
                        </span>

                        <span class="color-secondary-fact">
                            <?php 
                               echo $info['first_name'];
                            ?>
                        </span>
                    </div>

                    <div class="backoffice-compte-user-info text-align-center-fact">
                        <span class="font-weight-bold-fact">
                            Email :
                        </span>

                        <span class="color-secondary-fact">
                            <?php
                                echo $info['email'];
                            ?> 
                        </span>
                    </div>

                    <div class="backoffice-compte-user-info-custom backoffice-compte-user-info text-align-center-fact">
                        <span class="font-weight-bold-fact">
                            Compte bloqué :
                        </span>

                        <span class="color-secondary-fact">
                            <?php
                                echo $info['blocked'];
                            ?> 
                        </span>
                    </div>
                </div>
            
                <form action="backoffice/info" method="post" class="backoffice-compte-info-container-button text-align-center-fact">
                    <input type="submit" name="blockAccount" value="Bloquer le compte" class="backoffice-compte-info-button light-button-fact"/>
                    <input type="submit" name="unblockAccount" value="Débloquer le compte" class="light-button-fact"/>
                    <input type="hidden" name="idAccount" value="<?php echo $info['id'];?>"/>
                </form>
            <?php }
            
            // ID empty
             else if(empty($info)) {
                ?>
                    <h2 class="text-align-center-fact">
                        Pas de compte sélectionné
                    </h2>
                <?php
            } ?>
		</main>

		<!-- Js load -->
		<?php include'js/homeBackofficePage/jsLoadHomeBackofficePage.php'; ?>
	</body>
</html>