"use strict";


class MenuTab {

    constructor() {
        // Dom elements
        // ............
        this.menuElt = document.getElementById("menu-icon-tab-id");
        this.menuWindowElt = document.getElementById("menu-window-tab-id");
        
        // Variables
        // .........
        this.menuIsOpen = false;
    }

    openCloseMenuOnglet() {
        // Menu Button event
        this.menuElt.addEventListener("click", () => {
            if(!this.menuIsOpen){

                this.menuWindowElt.style.width = "140px";
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

var menuTabObject = new MenuTab();

// Open/close menu
menuTabObject.openCloseMenuOnglet();