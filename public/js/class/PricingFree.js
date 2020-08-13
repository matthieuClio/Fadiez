"use strict";

class PricingFree {
    constructor() {
        // Dom elements

        // Pricing info
        this.pricingFreeContainerElt = document.getElementById("pricing-free-container");
        this.pricingPremiumContainerElt = document.getElementById("pricing-premium-container");
        this.pricingFreeCloseIconElt = document.getElementById("pricing-free-close-icon");
        this.pricingPremiumCloseIconElt = document.getElementById("pricing-premium-close-icon");
        
        // Pricing button
        this.pricingFreeButtonElt = document.getElementById("pricing-free-button");
        this.pricingPremiumButtonElt = document.getElementById("pricing-premium-button");

        // variables
        //..........
    }

    PricingInfoFree() {
        this.pricingFreeButtonElt.addEventListener("click", () => {
            this.pricingFreeContainerElt.style.height="100%";
            this.pricingFreeContainerElt.style.opacity="1";
        });

        this.pricingFreeCloseIconElt.addEventListener("click", () => {
            this.pricingFreeContainerElt.style.height="0";
            this.pricingFreeContainerElt.style.opacity="0";
        });
    }

    PricingInfoPremium() {
        this.pricingPremiumButtonElt.addEventListener("click", () => {
            this.pricingPremiumContainerElt.style.height="100%";
            this.pricingPremiumContainerElt.style.opacity="1";
        });

        this.pricingPremiumCloseIconElt.addEventListener("click", () => {
            this.pricingPremiumContainerElt.style.height="0";
            this.pricingPremiumContainerElt.style.opacity="0";
        });
    }
}

// PricingFree object
var PricingFreeObject = new PricingFree();

// Open the free pricing info
PricingFreeObject.PricingInfoFree();

// Open the premium pricing info
PricingFreeObject.PricingInfoPremium();