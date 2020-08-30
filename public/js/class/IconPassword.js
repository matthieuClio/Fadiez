"use strict";

class IconPassword {
    constructor() {
        // Dom elements
        // ............
        this.visibleIconElt = document.getElementById("eye-icon-visible");
        this.invisibleIconElt = document.getElementById("eye-icon-invisible");
        this.passwordElt = document.getElementById("password");
        
        this.visibleIconConfirmationElt = document.getElementById("eye-icon-visible-confirmation");
        this.invisibleIconConfirmationElt = document.getElementById("eye-icon-invisible-confirmation");
        this.passwordConfirmationElt = document.getElementById("password-confirmation");
        
        // Variables
        // .........
        this.passwordIsVisible = false;
        this.passwordConfirmationIsVisible = false;
    }

    iconPassword() {
        // Eye icon event
        this.visibleIconElt.addEventListener("click", () => {
            if(!this.passwordIsVisible){

                this.visibleIconElt.style.display = "none";
                this.invisibleIconElt.style.display = "inline-block";
                this.passwordElt.setAttribute("type", "text");
                this.passwordIsVisible = true;
            }
        });

        this.invisibleIconElt.addEventListener("click", () => {
            if(this.passwordIsVisible) {

                this.visibleIconElt.style.display = "inline-block";
                this.invisibleIconElt.style.display = "none";
                this.passwordElt.setAttribute("type", "password");
                this.passwordIsVisible = false;
            }
        });
    }

    iconPasswordConfirmation() {
        // Cheked existance
        if(this.visibleIconConfirmationElt) {
            // Eye icon event
            this.visibleIconConfirmationElt.addEventListener("click", () => {
                if(!this.passwordConfirmationIsVisible){

                    this.visibleIconConfirmationElt.style.display = "none";
                    this.invisibleIconConfirmationElt.style.display = "inline-block";
                    this.passwordConfirmationElt.setAttribute("type", "text");
                    this.passwordConfirmationIsVisible = true;
                }
            });

            this.invisibleIconConfirmationElt.addEventListener("click", () => {
                if(this.passwordConfirmationIsVisible) {

                    this.visibleIconConfirmationElt.style.display = "inline-block";
                    this.invisibleIconConfirmationElt.style.display = "none";
                    this.passwordConfirmationElt.setAttribute("type", "password");
                    this.passwordConfirmationIsVisible = false;
                }
            });
        }
    }
}

var IconPasswordObject = new IconPassword();

// Show/hide icon
IconPasswordObject.iconPassword();
IconPasswordObject.iconPasswordConfirmation();