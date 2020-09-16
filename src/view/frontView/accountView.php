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

		<main class="account-container padding-top-fact color-primary-fact">
            <h1 class="text-align-center-fact">
                Compte
            </h1>

            <!-- Icon compte -->
            <div class="account-main-icon text-align-center-fact">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>

            <!-- Design element -->
            <div class="account-design-element">
            </div>
            
            <!-- User data -->
            <form action="compte" method="post" class="margin-top-fact text-align-center-fact padding-bottom-fact">
                <section>
                    <h2 class="margin-bottom-fact">Informations personnelles</h2>
                    <div class="margin-top-fact font-size-secondary-fact">
                        <!-- Label -->
                        <label class="account-information-name font-weight-bold-fact text-align-left-fact">
                            Nom :
                        </label>

                        <!-- Data -->
                        <input 
                            type="text" 
                            name="name" 
                            class="account-information-input"
                            value="<?php if(!empty($info)) { echo $info['name']; }?>"
                        >
                    </div>

                    <div class="font-size-secondary-fact">
                        <!-- Label -->
                        <label class="account-information-firstname font-weight-bold-fact text-align-left-fact">
                            Prénom :
                        </label>

                        <!-- Data -->
                        <input 
                            type="text" 
                            name="firstName" 
                            class="account-information-input"
                            value="<?php if(!empty($info)) { echo $info['first_name']; }?>"
                        >
                    </div>

                    <div class="font-size-secondary-fact">
                        <!-- Label -->
                        <label class="account-information-email font-weight-bold-fact text-align-left-fact">
                            Email :
                        </label>

                        <!-- Data -->
                        <input 
                            type="email" 
                            name="email"
                            class="account-information-input"
                            value="<?php if(!empty($info)) { echo $info['email']; }?>"
                        >
                    </div>

                    <input type="hidden" name="idUser" value="<?php if(!empty($info)) { echo $info['id']; }?>"/>
                    <input type="submit" name="modification" value="Modification" class="light-button-fact margin-top-fact"/>
                </section>

                <section class="account-password-container">
                    <h2>Changer votre mot de passe</h2>

                    <div class="margin-top-fact font-size-secondary-fact">
                        <label class="account-password-label font-weight-bold-fact text-align-left-fact">
                            Ancien :
                        </label>

                        <input type="password" name="oldPassword" class="account-information-input">
                    </div>

                    <div class="font-size-secondary-fact">
                        <label class="account-password-label font-weight-bold-fact text-align-left-fact">
                            Nouveau :
                        </label>

                        <input type="password" name="newPassword" class="account-information-input">
                    </div>
                </section>

                <section class="account-disconnection-container">
                    <h2>Se déconnecter</h2>
                    <input type="submit" name="disconnection" value="Déconnexion" class="light-button-fact margin-top-fact"/>
                </section>
            </form>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>