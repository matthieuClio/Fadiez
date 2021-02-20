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
        <?php 
            if(empty($_SESSION['pseudoUser'])) { 
        ?>
                <a href="inscription" class="menu-button">
                    Compte gratuit
                </a>
        <?php 
            }
            else if(!empty($_SESSION['pseudoUser'])) { 
        ?>
                <a href="compte" class="menu-button">
                    <i class="fa fa-user" aria-hidden="true"></i>  
                    Compte
                </a>
        <?php
            }
        ?>
        <i class="fa fa-caret-down caret-icon color-tertiary-fact" aria-hidden="true" id="menu-icon-tab-id"></i>
    </div>
</nav>

<!-- Menu -->
<nav class="menu-window" id="menu-window-id">
    <div class="button-icon-container text-align-right-fact">
        <i class="fa fa-times-circle button-icon margin-right-fact" aria-hidden="true" id="menu-close-icon"></i>
    </div>
    
    <ul class="menu-tab-front-container">
        <li class="menu-user-front menu-tab-front text-align-center-fact">
            <!-- Display the user name -->
            <?php if(!empty($_SESSION['pseudoUser'])){ echo $_SESSION['pseudoUser'];} ?>
        </li>

        <li class="menu-tab-front">
            <a href="accueil" class="menu-link-front color-primary-fact">
                <i class="fa fa-home margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Accueil
            </a>
        </li>

        <?php 
        if(!empty($_SESSION['pseudoUser'])) { ?>
            <li class="menu-tab-front">
                <a href="compte" class="menu-link-front color-primary-fact">
                    <i class="fa fa-user margin-left-fact margin-right-fact" aria-hidden="true"></i>
                    Compte
                </a>
            </li>

            <li class="menu-tab-front">
                <a href="music" class="menu-link-front color-primary-fact">
                    <i class="fa fa-music margin-left-fact margin-right-fact" aria-hidden="true"></i>
                    Voir les musiques publiés
                </a>
            </li>

            <li class="menu-tab-front">
                <a href="upload" class="menu-link-front color-primary-fact">
                    <i class="fa fa-upload margin-left-fact margin-right-fact" aria-hidden="true"></i>
                    Publier une musique
                </a>
            </li>
        <?php 
        } 
        if(empty($_SESSION['pseudoUser'])) { ?>
            <li class="menu-tab-front">
                <a href="connexion" class="menu-link-front color-primary-fact">
                    <i class="fa fa-sign-in margin-left-fact margin-right-fact" aria-hidden="true"></i>
                    Connexion
                </a>
            </li>
        <?php
        } ?>

        <?php
        if(!empty($_SESSION['pseudoUser'])) { ?>
            <li class="menu-tab-front">
                <form method="post" action="compte" class="menu-disconnection-front text-align-center-fact">
                    <input type="submit" name="disconnection" value="Déconnexion" class="light-button-fact">
                </form>
            </li>
        <?php
        } ?>
    </ul>
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
        // Display all link for a connected user
        else if(!empty($_SESSION['pseudoUser'])) {
    ?>
 
            <form method="post" action="compte" class="menu-window-tab-link color-primary-fact text-align-center-fact">
                <input type="submit" name="disconnection" value="Déconnexion" class="light-button-fact">
            </form>
    <?php
        }
    ?>
</nav>