<nav class="menu-container font-size-default-fact">
    <div>
        <i class="fa fa-bars menu-icon color-tertiary-fact" aria-hidden="true" id="menu-icon-id"></i>
        <a href="backoffice" class="menu-text">
            Backoffice
            <i class="fa fa-music" aria-hidden="true"></i>
        </a>
    </div>

    <div class="margin-right-fact">
        <form method="post" action="backoffice" class="text-align-center-fact" >
            <input type="submit" name="disconnection" value="Déconnexion" class="light-button-fact margin-right-fact menu-disconnection-button">
        </form>
    </div>
</nav>

<nav class="menu-window" id="menu-window-id">
    <div class="backoffice-button-icon-container text-align-right-fact">
        <i class="fa fa-times-circle backoffice-button-icon margin-right-fact" aria-hidden="true" id="menu-close-icon"></i>
    </div>

    <ul class="backoffice-menu-tab-container">
        <li class="backoffice-menu-user backoffice-menu-tab text-align-center-fact">
            <!-- Display the user name -->
            <?php if(!empty($_SESSION['pseudoUser'])){ echo $_SESSION['pseudoUser'];} ?>
        </li>

        <li class="backoffice-menu-tab">
            <a href="backoffice" class="backoffice-menu-link color-primary-fact">
                <i class="fa fa-home margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Accueil
            </a>
        </li>

        <li class="backoffice-menu-tab">
            <a href="backoffice/compte" class="backoffice-menu-link color-primary-fact">
                <i class="fa fa-user margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Gestion des comptes
            </a>
        </li>

        <li class="backoffice-menu-tab">
            <a href="backoffice/musique" class="backoffice-menu-link color-primary-fact">
                <i class="fa fa-music margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Vaidation des musiques
            </a>
        </li>

        <li class="backoffice-menu-tab">
            <a href="backoffice/slider" class="backoffice-menu-link color-primary-fact">
                <i class="fa fa-picture-o margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Slider
            </a>
        </li>

        <li class="backoffice-menu-tab">
            <a href="accueil" class="backoffice-menu-link color-primary-fact">
                <i class="fa fa-reply margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Revenir sur le site
            </a>
        </li>
    </ul>
</nav>