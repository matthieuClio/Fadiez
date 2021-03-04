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

             <!-- Error message -->
            <?php 
            if(!empty($infoMessageDataUser[0])) { ?>
                <div class="backoffice-compte-errorMessage text-align-center-fact">
                    <?php
                    echo $infoMessageDataUser[0];
                    ?>
                </div>
            <?php 
            } ?>

            <!-- Success message -->
            <?php 
            if(!empty($infoMessageDataUser[1])) { ?>
                <div class="backoffice-compte-successMessage text-align-center-fact">
                    <?php
                    echo $infoMessageDataUser[1];
                    ?>
                </div>
            <?php 
            } ?>
            <form action="backoffice/info" method="post" class="backoffice-compte-info-container-button text-align-center-fact">
                <?php if(!empty($info)) { ?>
                    <!-- Data table -->
                    <div class="backoffice-compte-bar-data-info">
                        <div class="backoffice-compte-user-info text-align-center-fact">
                            <label class="backoffice-compte-info-label font-weight-bold-fact text-align-left-fact">
                                Nom :
                            </label>

                            <span>
                                <input 
                                    type="text"
                                    name="name" 
                                    value="<?php echo $info['name']; ?>" 
                                    class="backoffice-compte-info-input"
                                />
                            </span>
                        </div>

                        <div class="backoffice-compte-user-info text-align-center-fact">
                            <label class="backoffice-compte-info-label font-weight-bold-fact text-align-left-fact">
                                Prénom :
                            </label>

                            <span class="color-secondary-fact">
                                <input 
                                    type="text"
                                    name="firstName" 
                                    value="<?php echo $info['first_name']; ?>" 
                                    class="backoffice-compte-info-input"
                                />
                            </span>
                        </div>

                        <div class="backoffice-compte-user-info text-align-center-fact">
                            <label class="backoffice-compte-info-label font-weight-bold-fact text-align-left-fact">
                                Email :
                            </label>

                            <span class="color-secondary-fact">
                                <input 
                                    type="email"
                                    name="email" 
                                    value="<?php echo $info['email']; ?>" 
                                    class="backoffice-compte-info-input"
                                    required
                                />
                            </span>
                        </div>

                        <div class="backoffice-compte-user-info text-align-center-fact">
                            <label class="backoffice-compte-info-label font-weight-bold-fact text-align-left-fact">
                                Premium :
                            </label>

                            <span class="color-secondary-fact">
                                <?php
                                    echo $info['premium'];
                                ?> 
                            </span>
                        </div>

                        <div class="backoffice-compte-user-info-custom backoffice-compte-user-info text-align-center-fact">
                            <label class="font-weight-bold-fact">
                                Compte bloqué :
                            </label>

                            <span class="color-secondary-fact">
                                <?php
                                    echo $info['blocked'];
                                ?> 
                            </span>
                        </div>
                    </div>
            
                    <!-- Input -->
                    <div class="margin-top-fact">
                        <input type="submit" name="modification" value="Modifier" class="backoffice-compte-info-button light-button-fact"/>
                    </div>

                    <div>
                        <input type="submit" name="blockAccount" value="Bloquer le compte" class="backoffice-compte-info-button light-button-fact"/>
                    </div>

                    <div>
                        <input type="submit" name="unblockAccount" value="Débloquer le compte" class="light-button-fact"/>
                    </div>

                    <div>
                        <input type="hidden" name="idAccount" value="<?php echo $info['id'];?>"/>
                    </div>
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
		<?php include'js/homeBackofficePage/jsLoadCompteInfoBackofficePage.php'; ?>
	</body>
</html>