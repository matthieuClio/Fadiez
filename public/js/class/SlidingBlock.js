"use strict";

class SlidingBlock {

	constructor() {

		// Define some default value
		this.blockContainerElt = document.querySelector(".sliding-block");
		this.mainPlayerElt = document.querySelector(".main-player");
		this.displayPlayerElt = document.querySelector(".display-player");
		this.hidePlayerElt = document.querySelector(".hide-player");

		// Define some default value
		this.display = false;
	}

	Run() {
		this.blockContainerElt.addEventListener("click", () => {

			if(!this.display) {
				// Display main player
				this.mainPlayerElt.style.opacity = "1";
				this.mainPlayerElt.style.height = "60px";
				this.mainPlayerElt.style.paddingTop = "22px";
				this.mainPlayerElt.style.paddingBottom = "22px";

				// Change block container
				this.blockContainerElt.style.minWidth = "100%";
				this.blockContainerElt.style.textAlign = "right";

				// Change the text
				this.displayPlayerElt.style.display = "none";
				this.hidePlayerElt.style.display = "block";

				this.display = true;

			} else if(this.display) {

				// hide main player
				this.mainPlayerElt.style.opacity = "0";
				this.mainPlayerElt.style.height = "0px";
				this.mainPlayerElt.style.paddingTop = "0px";
				this.mainPlayerElt.style.paddingBottom = "0px";

				// Change block container
				this.blockContainerElt.style.minWidth = "10%";
				this.blockContainerElt.style.textAlign = "center";

				// Change the text
				this.displayPlayerElt.style.display = "block";
				this.hidePlayerElt.style.display = "none";

				this.display = false;
			}
			
		});
	}
}