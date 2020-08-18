<nav class="menu-container font-size-default-fact">
    <div>
        <i class="fa fa-bars menu-icon color-tertiary-fact" aria-hidden="true" id="menu-icon-id"></i>
        <a href="accueil" class="menu-text">
            Backoffice
            <i class="fa fa-music" aria-hidden="true"></i>
        </a>
    </div>

    <div class="backoffice-menu-name">
        <!-- Display the user name -->
        <?php if(!empty($_SESSION['pseudoUser'])){ echo $_SESSION['pseudoUser']; } ?>
    </div>
</nav>

<nav class="menu-window" id="menu-window-id">
    <div class="backoffice-button-icon-container text-align-right-fact">
        <i class="fa fa-times-circle backoffice-button-icon margin-right-fact" aria-hidden="true" id="menu-close-icon"></i>
    </div>

    <ul class="backoffice-menu-tab-container">
        <li class="backoffice-menu-tab">
            <a>
                <i class="fa fa-home margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Accueil
            </a>
        </li>

        <li class="backoffice-menu-tab">
            <a>
                <i class="fa fa-user margin-left-fact margin-right-fact" aria-hidden="true"></i>
                Gestion des comptes
            </a>
        </li>
    </ul>
</nav>