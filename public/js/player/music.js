"use strict";

// Player
//...
//...
//...

// Control of the audio player
//............................

// Dom elements
let musicElt = document.querySelector("#musicFileName");
let playElt = document.querySelector("#play");
let pauseElt = document.querySelector("#pause");
let rangeElt = document.querySelector("#range");
let muteElt = document.querySelector('#mute');
let unmuteElt = document.querySelector('#unmute');
let minuteElt = document.querySelector('#minute');
let secondElt = document.querySelector('#second');

// Default value
let duration = 0;
let currentSong = 0;
let isPlaying = false;
let isChanging = false;
let startSong = false;
let Song = new Audio();
let loop;
let time;
let second;
let minute;

window.addEventListener("load", function() {
	// Define the default song value
	Song.src = musicElt.value;

	// Events...
	//..........
	
	// Play button
	playElt.addEventListener('click', PlayButton);

	// Pause button
	pauseElt.addEventListener('click', PauseButton);

	// Stop the progress bar update
	rangeElt.addEventListener('mousedown', StopProgressBarUpdate);

	// Change the progress bar manualy (scroll progress bar)
	rangeElt.addEventListener('input', ChangeProgressBarInput);

	// Change the progress bar manualy (click)
	rangeElt.addEventListener('click', ChangeProgressBar);

	// Mute boutton
	muteElt.addEventListener('click', MuteButton);

	// Unmute boutton
	unmuteElt.addEventListener('click', UnmuteButton);

	// End of the song
	Song.addEventListener('ended', EndSong);


	// Function...
	//............

	function PlayButton() {
		// Start the song
		if(!isPlaying) {
			Song.play();
			isPlaying = true;
			duration = Song.duration;
			rangeElt.max = duration;
			// Hide the play icon
			playElt.style.display="none";
			// Display the pause icon
			pauseElt.style.display="block";
			// Progress bar update each second
			loop = setInterval(ProgressBar, 1000);
		} else {
			
		}
	}

	function PauseButton() {
		// Stop the song
		Song.pause();
		isPlaying = false;
		clearInterval(loop);

		// Hide the pause icon
		pauseElt.style.display = "none";

		// Display the play icon
		playElt.style.display = "block";
	}

	// Stop progress bar update
	function StopProgressBarUpdate() {
		console.log("Stop");
		isChanging = true;
	}

	// Progress bar update each second
	function ProgressBar() {
		if(!isChanging) {
			// Change the range bar value
			rangeElt.value = Song.currentTime;

			// Change the timer of the song
			ChangeTimer();
		}
	}

	// Change progress bar manualy
	function ChangeProgressBar() {
		Song.currentTime = rangeElt.value;
		console.log(rangeElt.value);
		console.log("change");
		isChanging = false;
	}

	// Change progress bar manualy
	function ChangeProgressBarInput() {

		// Change the timer of the song
		ChangeTimerInputValue();
	}

	// Mute button
	function MuteButton() {
		if (!Song.muted) {
			Song.muted = true;

			// Hide mute boutton
			muteElt.style.display = "none";

			// Show unmute boutton
			unmuteElt.style.display = "block";
			console.log("Muted");
		}
	}

	// Unmute button
	function UnmuteButton() {
		if (Song.muted) {
			Song.muted = false;

			// Hide unmute boutton
			unmuteElt.style.display = "none";

			// Show mute boutton
			muteElt.style.display = "block";
			console.log("Unmute");
		}
	}

	// End of the song
	function EndSong() {
		// Hide the pause icon
		pauseElt.style.display = "none";

		// Display the play icon
		playElt.style.display = "block";
		Song.pause();
		Song.currentTime = 0;
		isPlaying = false;
		rangeElt.value = 0;
		clearInterval(loop);
		// Change the timer of the song
		ChangeTimer();
	}

	// Function additionnal use many time

	// Update the timer
	function ChangeTimer() {
		// Calcul time compared to the time of the song
		time = Math.trunc(Song.currentTime); // Math.trunc() = Number without comma
		minute = time / 60;
		minute = Math.trunc(minute);
		second = time - minute * 60;

		// Add 0 to minute
		if(minute < 10) {
			minute = "0" + minute;
		}
		// Add 0 to second
		if(second < 10) {
			second = "0" + second;
		}
		// Change the timer value
		minuteElt.innerHTML = minute;
		secondElt.innerHTML = second;
	}

	// Timer updating depend of the progress bar scrolling
	function ChangeTimerInputValue() {
		// Calcul time compared to the time of the song
		time = Math.trunc(rangeElt.value); // Math.trunc() = Number without comma
		minute = time / 60;
		minute = Math.trunc(minute);
		second = time - minute * 60;

		// Add 0 to minute
		if(minute < 10) {
			minute = "0" + minute;
		}
		// Add 0 to second
		if(second < 10) {
			second = "0" + second;
		}
		// Change the timer value
		minuteElt.innerHTML = minute;
		secondElt.innerHTML = second;
	}
});
