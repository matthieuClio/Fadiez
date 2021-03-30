"use strict";


class Menu {

    constructor() {
        // Dom elements
        // ............
        this.menuElt = document.getElementById("menu-icon-id");
        this.menuWindowElt = document.getElementById("menu-window-id");
        this.menuClosedIconElt = document.getElementById("menu-close-icon");
        
        // Variables
        // .........
        this.menuIsOpen = false;
    }

    openCloseMenu() {
        // Menu Button event
        this.menuElt.addEventListener("click", () => {
            if(!this.menuIsOpen)
            {
                if(document.body)
                {
                    var larg = (document.body.clientWidth);

                    if(larg >= 500) 
                    {
                        this.menuWindowElt.style.width = "320px";
                        this.menuWindowElt.style.opacity = "1";
                        this.menuIsOpen = true;
                    }
                    else if(larg < 500) 
                    {
                        this.menuWindowElt.style.width = "100%";
                        this.menuWindowElt.style.opacity = "1";
                        this.menuIsOpen = true;
                    }
                }

            } else {

                this.menuWindowElt.style.width = "0";
                this.menuWindowElt.style.opacity = "0";
                this.menuIsOpen = false;
            }
        });

        // Close Button event
        this.menuClosedIconElt.addEventListener("click", () => {
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
menuObject.openCloseMenu();