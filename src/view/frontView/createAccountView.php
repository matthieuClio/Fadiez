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

		<main>
            <section class="page-container-fact">
                <h1 class="page-main-title-fact color-primary-fact">
                    Inscription
                </h1>

                <article class="registration-details">
                    <div class="registration-details-icon text-align-center-fact">
                        <i class="fas fa-walking"></i>
                    </div>

                    <h2 class="text-align-center-fact">
                        <span class="registration-details-title">Starter</span>
                    </h2>

                    <p class="registration-details-text">
                        Lorem ipsum dolor sit amet, 
                        consectetur adipiscing elit. 
                        Cras tortor magna, porta eget efficitur vel,
                        pharetra nec turpis.<br><br>
                        Mauris mauris lectus, 
                        ultrices a condimentum vel, aliquet ac nisi.
                    </p>
                </article>

                <!-- Information creation account -->
                <div class="registration-account-message text-align-center-fact">
                    <?php 
                        if(!empty($_POST['registrationValidation']) && !empty($_SESSION['erreurCreateAccount'])) {
                            echo $_SESSION['erreurCreateAccount'];
                        }
                    ?>
                </div>
               
                <!-- Registration -->
                <form action="inscription" method="post" class="registration-container">
                    <div class="registration-info">
                        <span class="registration-text-mandatory">*</span>
                        Champs obligatoires
                    </div>

                    <label class="registration-text">
                        Nom <span class="registration-text-mandatory">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        class="registration-input" 
                        placeholder="Nom"
                        value="<?php if(!empty($_POST['name'])){echo $_POST['name'];}?>" 
                        required/>

                    <label class="registration-text">
                        Prénom <span class="registration-text-mandatory">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="firstName" 
                        class="registration-input" 
                        placeholder="Prénom" 
                        value="<?php if(!empty($_POST['firstName'])){echo $_POST['firstName'];}?>"
                        required/>

                    <label class="registration-text">
                        Email <span class="registration-text-mandatory">*</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        class="registration-input" 
                        placeholder="Email" 
                        value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>"
                        required/>

                    <label class="registration-text registration-text-modification">
                        Mot de passe <span class="registration-text-mandatory">*</span>
                        <span class="registration-text-detail">
                            (Le mot de passe doit comprendre : 12 caractères,
                            une majuscule, au moins un chiffre et un caractère spécial)
                        <span>
                    </label>
                    <input type="password" name="password" class="registration-input" placeholder="Mot de passe" id="password" required/>
                    <i class="fa fa-eye eye-icon" aria-hidden="true" id="eye-icon-visible" ></i>
                    <i class="fa fa-eye-slash eye-icon-crossed" aria-hidden="true" id="eye-icon-invisible"></i>

                    <label class="registration-text">
                        Confirmation <span class="registration-text-mandatory">*</span>
                    </label>
                    <input type="password" name="passwordConfirmation" class="registration-input" placeholder="Confirmer le mot de..." id="password-confirmation" required/>
                    <i class="fa fa-eye eye-icon" aria-hidden="true" id="eye-icon-visible-confirmation" ></i>
                    <i class="fa fa-eye-slash eye-icon-crossed" aria-hidden="true" id="eye-icon-invisible-confirmation"></i>

                    <div class="registration-input-button">
                        <input type="submit" name="registrationValidation" class="light-button-fact" value="Valider"/>
                    </div>
                </form>
            </section>
		</main>

		<!-- Footer -->
		<?php include'footer/footerView.php'; ?>

		<!-- Js load -->
		<?php include'js/accountPage/jsLoadAccountPage.php'; ?>
	</body>
</html>