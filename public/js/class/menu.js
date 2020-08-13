"use strict";

class Menu {
    constructor() {
        // Dom elements
        this.menuElt = document.getElementById("menu-icon-id");
        this.menuWindowElt = document.getElementById("menu-window-id");

        // variables
        this.menuIsOpen = false;
    }

    openMenu() {
        this.menuElt.addEventListener("click", () => {
            if(!this.menuIsOpen){

                this.menuWindowElt.style.width = "100%";
                this.menuWindowElt.style.opacity = "1";
                this.menuIsOpen = true;
            } else {

                this.menuWindowElt.style.width = "0";
                this.menuWindowElt.style.opacity = "0";
                this.menuIsOpen = false;
            }
        });
    }
}

var menuObject = new Menu();

// Open/close menu
menuObject.openMenu();