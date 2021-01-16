class SliderHero {
    constructor() {
        // HTML Elements 
        this.heroTextContainerElt = document.getElementById("hero-title-id");
        this.heroTextElt = document.querySelectorAll(".hero-text");
        this.heroButtonContainerElt = document.getElementById("button-container-id")
        this.heroButtonLeftElt = document.getElementById("hero-button-left-id");
        this.heroButtonRightElt = document.getElementById("hero-button-right-id");
        this.heroCircleOneElt = document.getElementById("hero-circle-one-id");
        this.heroCircleTwoElt = document.getElementById("hero-circle-two-id");
        this.heroCircleTreeeElt = document.getElementById("hero-circle-tree-id");
        this.heroSlideElt = document.querySelectorAll(".hero-slide");
        this.heroContainerId = document.getElementById("hero-container-id");

        // Define some default value
        this.currentSlide = 0;
        this.maxSlide = 2; // 0, 1 , 2...
        this.minSlide = 0;
        this.loop;
        this.allCircle = [this.heroCircleOneElt, this.heroCircleTwoElt, this.heroCircleTreeeElt];
    }

    // Animation play one time
    // .......................
    AnimationSlideOne() {
        setTimeout(() => {
            this.heroTextContainerElt.style.opacity = "1";
            this.heroButtonRightElt.style.marginLeft = "10px";
        }, 0);
    }

    SlideAuto() {
        // Start the auto change
        this.loop = setInterval(this.ChangeSlideAuto.bind(this), 15000);
    }

    ChangeSlideAuto() {
        // Opacity hero container
        this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 1)";
        
        setTimeout(() => {
            // Hide the current slide
            this.heroSlideElt[this.currentSlide].style.display = "none";
            this.heroTextElt[this.currentSlide].style.display = "none";

            // Turn off the current circle button
            this.allCircle[this.currentSlide].style.color= "#373737";

            // Update the current slide
            if(this.currentSlide < this.maxSlide) {
                this.currentSlide++;
            } 
            else if(this.currentSlide == this.maxSlide) {
                this.currentSlide = this.minSlide;
            }

            // Display the next slide
            this.heroSlideElt[this.currentSlide].style.display = "block";
            this.heroTextElt[this.currentSlide].style.display = "block";
            this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 0.2)";

            // Display/hide button slide one
            if(this.currentSlide == 0) {
                this.heroButtonContainerElt.style.opacity = "1";
            }
            else if(this.currentSlide != 0) {
                this.heroButtonContainerElt.style.opacity = "0";
            }

            // Turn on the new current circle button
            this.allCircle[this.currentSlide].style.color= "white";
        }, 1000);
    }

    // Button event
    // ............
    CircleButtonSlider() {

        // Circle number one
        this.heroCircleOneElt.addEventListener('click', () => {
            // Opacity hero container
            this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 1)";

            // Display slide
            setTimeout(() => {
                this.heroButtonContainerElt.style.opacity = "1";
                this.heroSlideElt[0].style.display = "block";
                this.heroSlideElt[1].style.display = "none";
                this.heroSlideElt[2].style.display = "none";
                this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 0.2)";
                this.currentSlide = 0;

                // Slide's Text
                this.heroTextElt[0].style.display = "block";
                this.heroTextElt[1].style.display = "none";
                this.heroTextElt[2].style.display = "none";
            }, 1000); 

            // Change cirlce color
            this.heroCircleOneElt.style.color = "white";
            this.heroCircleTwoElt.style.color = "#373737";
            this.heroCircleTreeeElt.style.color = "#373737";

            // Stop the loop
            clearInterval(this.loop);

            // Relaunch the loop
            this.loop = setInterval(this.ChangeSlideAuto.bind(this), 15000);
        });

        // Circle number two
        this.heroCircleTwoElt.addEventListener('click', () => {
            // Opacity hero container
            this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 1)";

            // Display slide
            setTimeout(() => {
                this.heroButtonContainerElt.style.opacity = "0";
                this.heroSlideElt[0].style.display = "none";
                this.heroSlideElt[1].style.display = "block";
                this.heroSlideElt[2].style.display = "none";
                this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 0.2)";
                this.currentSlide = 1;

                // Slide's Text
                this.heroTextElt[0].style.display = "none";
                this.heroTextElt[1].style.display = "block";
                this.heroTextElt[2].style.display = "none";
                this.heroTextContainerElt.style.opacity = "1";
            }, 1000);        
            
            // Change cirlce color
            this.heroCircleOneElt.style.color = "#373737";
            this.heroCircleTwoElt.style.color = "white";
            this.heroCircleTreeeElt.style.color = "#373737";

            // Stop the loop
            clearInterval(this.loop);

            // Relaunch the loop
            this.loop = setInterval(this.ChangeSlideAuto.bind(this), 15000);
        });

        // Circle number tree
        this.heroCircleTreeeElt.addEventListener('click', () => {
            // Opacity hero container
            this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 1)";

            // Display slide
            setTimeout(() => {
                this.heroButtonContainerElt.style.opacity = "0";
                this.heroSlideElt[0].style.display = "none";
                this.heroSlideElt[1].style.display = "none";
                this.heroSlideElt[2].style.display = "block";
                this.heroContainerId.style.backgroundColor = "rgba(56, 66, 73, 0.2)";
                this.currentSlide = 2;

                // Slide's Text
                this.heroTextElt[0].style.display = "none";
                this.heroTextElt[1].style.display = "none";
                this.heroTextElt[2].style.display = "block";
                this.heroTextContainerElt.style.opacity = "1";
            }, 1000);

            // Change cirlce color
           this.heroCircleOneElt.style.color = "#373737";
           this.heroCircleTwoElt.style.color = "#373737";
           this.heroCircleTreeeElt.style.color = "white";

           // Stop the loop
           clearInterval(this.loop);

           // Relaunch the loop
           this.loop = setInterval(this.ChangeSlideAuto.bind(this), 15000);
        });
    }
}