"use strict";

// SLIDER HERO
// ...........

let Slider = new SliderHero();
Slider.CircleButtonSlider();
Slider.SlideAuto();

// SLIDING BLOC
// ............

let Sliding = new SlidingBlock();
Sliding.Run();

// LECTOR
// ......

// Define elements
// ...

// Main player (fixed player)
let mainBackwardButtonElt = document.querySelector(".player-backward-icon");
let mainPlayButtonElt = document.querySelector(".main-player-play-icon");
let mainPauseButtonElt = document.querySelector(".main-player-pause-icon");
let mainForwardButtonElt = document.querySelector(".player-forward-icon");
let mainSongElt = document.querySelector(".main-player-song-name");
let mainMuteButtonElt = document.querySelector(".main-player-mute-icon");
let mainUnmuteButtonElt = document.querySelector(".main-player-unmute-icon");
let mainTimerMinElt = document.querySelector(".main-player-timer-minute");
let mainTimerSecElt = document.querySelector(".main-player-timer-second");
let mainRangeElt = document.querySelector(".main-player-seek-bar");

// Secondary player
let secPlayButtonElt = document.querySelectorAll(".player-play-icon");
let secPauseButtonElt = document.querySelectorAll(".player-pause-icon");
let secSongNameElt = document.querySelectorAll(".player-song-name");
let secMuteButtonElt = document.querySelectorAll(".player-mute-icon");
let secUnmuteButtonElt = document.querySelectorAll(".player-unmute-icon");
let secTimerMinuteElt = document.querySelectorAll(".player-timer-minute");
let secTimerSecondElt = document.querySelectorAll(".player-timer-second");
let secFileNameElt = document.querySelectorAll(".music-file-name");
let secRangeElt = document.querySelectorAll(".player-seek-bar");

let secIdElt = document.querySelectorAll(".player-value");
let secNbPlayer = secIdElt.length;

// Create a counter
let counter = 0;

// Create locals storage
localStorage.setItem('play', 0); // Current state play
localStorage.setItem('musicPlayedId', 0); // Current music played

// Create a array
let lectorObject = [];


// Create lectors object
// ...

while(counter < secNbPlayer) {
	// Create a new audio object - Used here
	let Song = new Audio();

	// Create SecLector object
	lectorObject[counter] = new SecLector(
										  secPlayButtonElt[counter],
										  secPauseButtonElt[counter],
										  secMuteButtonElt[counter],
										  secUnmuteButtonElt[counter],
										  secRangeElt[counter],
										  secTimerMinuteElt[counter],
										  secTimerSecondElt[counter],
										  secSongNameElt[counter],
										  secFileNameElt[counter],
										  secIdElt[counter],

										  mainBackwardButtonElt,
										  mainPlayButtonElt,
										  mainPauseButtonElt,
										  mainForwardButtonElt,
										  mainMuteButtonElt,
										  mainUnmuteButtonElt,
										  mainRangeElt,
										  mainTimerMinElt,
										  mainTimerSecElt,
										  mainSongElt,
										  secNbPlayer,
										  Song
										  ); // class/SecLector.js

	// Stock secondary elements in variables
	let specificSecPlayButton = secPlayButtonElt[counter];
	let specificSecPauseButton = secPauseButtonElt[counter];
	let specificSecMuteButton = secMuteButtonElt[counter];
	let specificSecUnmuteButton = secUnmuteButtonElt[counter];
	let specificSecRangeElt = secRangeElt[counter];

	// Stock object in variable
	let specificLectorObject = lectorObject[counter];
		
	// Object initialisation (can be delete - using only for display nb object)
	specificLectorObject.Initialization();

	// Events creation
	//...

	// Play button lectors event
	specificSecPlayButton.addEventListener('click', () => {
		lectorObject[localStorage.musicPlayedId].TurnOffMusic();
		specificLectorObject.Play();
	});

	// Pause button lectors event
	specificSecPauseButton.addEventListener('click', () => {
		specificLectorObject.Pause();
	});

	// Mute button lectors event
	specificSecMuteButton.addEventListener('click', () => {
		specificLectorObject.Mute();
	});

	// Unmute button lectors event
	specificSecUnmuteButton.addEventListener('click', () => {
		specificLectorObject.Unmute();
	});

	// Progress bar mousedown lectors event
	specificSecRangeElt.addEventListener('mousedown', () => {
		specificLectorObject.StopProgressBarUpdating();
	});

	// Progress bar mousedown MOBILE version lectors event
	specificSecRangeElt.addEventListener('touchstart', () => {
		specificLectorObject.StopProgressBarUpdating();
	});

	// Progress bar manualy (click) lectors event
	specificSecRangeElt.addEventListener('click', () => {
		specificLectorObject.ChangeProgressBar();
	});

	// Progress bar manualy (click) MOBILE version lectors event
	specificSecRangeElt.addEventListener('touchend', () => {
		specificLectorObject.ChangeProgressBar();
	});

	// Change the progress bar manualy (scroll progress bar)
	specificSecRangeElt.addEventListener('input', () => {
		specificLectorObject.ChangeProgressBarInput();
	});

	//specificLectorObject.EndSong(); <- A supprimer
	// Stop the song and play the next one
	Song.addEventListener('ended', () => {
		// Throw EndSong() method only with the current player
		if(specificLectorObject.idElt.value == localStorage.musicPlayedId) {

			console.log(specificLectorObject.idElt.value);
			specificLectorObject.EndSong();

			// Start the next song
			if(localStorage.musicPlayedId < secNbPlayer-1) {
				localStorage.musicPlayedId++;
				lectorObject[localStorage.musicPlayedId].Play();
			}
		}
	});

	counter++;
}


// - Main player -
//...

// Lectors event

// Backward button main lectors event
mainBackwardButtonElt.addEventListener('click', () => {
	// Start the next song
	if(localStorage.musicPlayedId > 0) {
		// Turn off current music
		lectorObject[localStorage.musicPlayedId].TurnOffMusic();
		// Change music ID
		localStorage.musicPlayedId--;
		// Start the other music
		lectorObject[localStorage.musicPlayedId].Play();
	}
});

// Play button main lectors event
mainPlayButtonElt.addEventListener('click', () => {
	lectorObject[localStorage.musicPlayedId].Play();
});

// Pause button main lectors event
mainPauseButtonElt.addEventListener('click', () => {
	lectorObject[localStorage.musicPlayedId].Pause();
});

// Forward button main lectors event
mainForwardButtonElt.addEventListener('click', () => {
	// Start the next song
	if(localStorage.musicPlayedId < secNbPlayer-1) {
		// Turn off current music
		lectorObject[localStorage.musicPlayedId].TurnOffMusic();
		// Change music ID
		localStorage.musicPlayedId++;
		// Start the other music
		lectorObject[localStorage.musicPlayedId].Play();
	}
});

// Mute button main lectors event
mainMuteButtonElt.addEventListener('click', () => {
	lectorObject[localStorage.musicPlayedId].Mute();
});

// Unmute button main lectors event
mainUnmuteButtonElt.addEventListener('click', () => {
	lectorObject[localStorage.musicPlayedId].Unmute();
});

// Progress bar mousedown main lectors event
mainRangeElt.addEventListener('mousedown', () => {
	lectorObject[localStorage.musicPlayedId].StopProgressBarUpdating();
});

// Progress bar mousedown MOBILE version main lectors event
mainRangeElt.addEventListener('touchstart', () => {
	lectorObject[localStorage.musicPlayedId].StopProgressBarUpdating();
});

// Progress bar manualy (click) main lectors event
mainRangeElt.addEventListener('click', () => {
	lectorObject[localStorage.musicPlayedId].ChangeMainProgressBar();
	lectorObject[localStorage.musicPlayedId].ChangeProgressBar();
});

// Progress bar manualy (click) MOBILE version main lectors event
mainRangeElt.addEventListener('touchend', () => {
	lectorObject[localStorage.musicPlayedId].ChangeMainProgressBar();
	lectorObject[localStorage.musicPlayedId].ChangeProgressBar();
});

// Change the main progress bar manualy (scroll progress bar)
mainRangeElt.addEventListener('input', () => {
	lectorObject[localStorage.musicPlayedId].ChangeMainProgressBarInput();
});