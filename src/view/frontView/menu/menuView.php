<!-- Navigation bar -->
<nav class="menu-container font-size-default-fact">
    <div>
        <i class="fa fa-bars menu-icon color-tertiary-fact" aria-hidden="true" id="menu-icon-id"></i>
        <a href="accueil" class="menu-text">
            Fa-diez
            <i class="fa fa-music" aria-hidden="true"></i>
        </a>
    </div>

    <div>
        <a href="inscription" class="menu-button">
            Compte gratuit
        </a>
        <i class="fa fa-caret-down caret-icon color-tertiary-fact" aria-hidden="true" id="menu-icon-tab-id"></i>
    </div>
</nav>

<!-- Menu -->
<nav class="menu-window" id="menu-window-id">
    <div class="button-icon-container text-align-right-fact">
        <i class="fa fa-times-circle button-icon margin-right-fact" aria-hidden="true" id="menu-close-icon"></i>
    </div>
</nav>

<!-- Menu tab -->
<nav class="menu-window-tab" id="menu-window-tab-id">
    <?php
        // Display connexion link
        if(empty($_SESSION['pseudoUser'])) { 
    ?>
            <a href="connexion" class="menu-window-tab-link color-primary-fact text-align-center-fact">
                Connexion
            </a>
    <?php    
        }
        // Display compte link
        else if(!empty($_SESSION['pseudoUser'])) {
    ?>
            <a href="compte" class="menu-window-tab-link color-primary-fact text-align-center-fact">
                Compte
            </a>
    <?php
        }
    ?>
</nav>