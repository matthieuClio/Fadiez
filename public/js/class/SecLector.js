"use strict";

class SecLector {

	constructor(playButtonElt,
			    pauseButtonElt,
			    muteButtonElt, 
			    unmuteButtonElt, 
			    rangeElt, 
			    timerMinuteElt, 
			    timerSecondElt, 
			    songNameElt,
			    fileNameElt,
			    idElt,

			    mainPlayButtonElt,
			    mainPauseButtonElt,
			    mainMuteButtonElt,
			    mainUnmuteButtonElt,
			    mainRangeElt,
			    mainTimerMinElt,
				mainTimerSecElt,
			    mainSongElt) {

		// HTML secondary player elements 
		this.playButtonElt = playButtonElt;
		this.pauseButtonElt = pauseButtonElt;
		this.muteButtonElt = muteButtonElt;
		this.unmuteButtonElt = unmuteButtonElt;
		this.timerMinuteElt = timerMinuteElt;
		this.timerSecondElt = timerSecondElt;
		this.rangeElt = rangeElt;
		this.songNameElt = songNameElt;
		this.fileNameElt = fileNameElt;
		this.idElt = idElt;

		// HTML main player elements 
		this.mainPlayButtonElt = mainPlayButtonElt;
		this.mainPauseButtonElt = mainPauseButtonElt;
		this.mainMuteButtonElt = mainMuteButtonElt;
		this.mainUnmuteButtonElt = mainUnmuteButtonElt;
		this.mainRangeElt = mainRangeElt;
		this.mainSongElt = mainSongElt;
		this.mainTimerMinElt = mainTimerMinElt;
		this.mainTimerSecElt = mainTimerSecElt;

		// Define some default value
		this.currentSong = 0;
		this.isPlaying = false;
		this.isChanging = false;
		this.startSong = false;
		this.loop;
		this.time;
		this.sec;
		this.min;

		// Audio object
		this.Song = new Audio();
		this.Song.src = this.fileNameElt.value;
	}

	Initialization() {
		// Display object
		console.log('Object create : ', this.fileNameElt.value);
	}

	Play() {
		// - Secondary player -
		// ....................

		// Play the song
		this.Song.play();

		// Change some values
		this.isPlaying = true;
		this.rangeElt.max = this.Song.duration; // Define the bar duration
		
		// Update localStorage
		localStorage.play = 1;
		localStorage.musicPlayedId = this.idElt.value;

		// Updating progress bar each second
		this.loop = setInterval(this.ProgressBar.bind(this), 1000);

		// Display pause button
		this.playButtonElt.style.display = "none";
		this.pauseButtonElt.style.display = "inline-block";

		// - Main player -
		// ....................

		// Define the bar duration
		this.mainRangeElt.max = this.Song.duration;

		// Change the range bar value - Main player
		this.mainRangeElt.value = this.Song.currentTime;

		// Change the timer
		this.ChangeTimer(this.Song.currentTime);

		// Display pause button
		this.mainPlayButtonElt.style.display = "none";
		this.mainPauseButtonElt.style.display = "inline-block";
		
		// Change the song name
		this.mainSongElt.innerHTML = this.songNameElt.innerHTML;

		// Display unmute buttton
		if(this.Song.muted) {
			this.mainMuteButtonElt.style.display = "none";
			this.mainUnmuteButtonElt.style.display = "inline-block";
		} 
		// Display mute buttton
		else if(!this.Song.muted) {
			this.mainMuteButtonElt.style.display = "inline-block";
			this.mainUnmuteButtonElt.style.display = "none";
		}
	}

	Pause() {
		// Pause the song
		this.Song.pause();

		// Change some values
		this.isPlaying = false;

		// Update localStorage
		localStorage.play = 0;

		// Stop updating progress bar
		clearInterval(this.loop);

		// Display pause button - Secondary player
		this.pauseButtonElt.style.display = "none";
		this.playButtonElt.style.display = "inline-block";

		// Display pause button - Main player
		this.mainPauseButtonElt.style.display = "none";
		this.mainPlayButtonElt.style.display = "inline-block";
	}

	TurnOffMusic() {
		// If an player is running
		if(localStorage.play == 1) {

			// Turn off the previous song
			this.Song.pause();

			// Replace the music to the start
			this.Song.currentTime = 0;
			this.rangeElt.value = 0;
			this.timerMinuteElt.innerHTML = "00";
			this.timerSecondElt.innerHTML = "00";

			// Change some values
			this.isPlaying = false;

			// Update localStorage
			localStorage.play = 0;

			// Stop updating progress bar
			clearInterval(this.loop);

			// Display play button
			this.playButtonElt.style.display = "inline-block";
			this.pauseButtonElt.style.display = "none";
			console.log('Music turned off');
		}
	}

	Mute() {
		// Mute the song
		this.Song.muted = true;

		// Display unmute button - Secondary player
		this.muteButtonElt.style.display = "none";
		this.unmuteButtonElt.style.display = "inline-block";

		// Display unmute button - Main player
		if(localStorage.musicPlayedId == this.idElt.value) {
			this.mainMuteButtonElt.style.display = "none";
			this.mainUnmuteButtonElt.style.display = "inline-block";
		}
	}

	Unmute() {
		// Unmute the song
		this.Song.muted = false;

		// Display mute button - Secondary player
		this.unmuteButtonElt.style.display = "none";
		this.muteButtonElt.style.display = "inline-block";

		// Display mute button - Main player
		if(localStorage.musicPlayedId == this.idElt.value) {
			this.mainMuteButtonElt.style.display = "inline-block";
			this.mainUnmuteButtonElt.style.display = "none";
		}
	}

	ProgressBar() {
		if(!this.isChanging) {
			// Change the range bar value - Secondary player
			this.rangeElt.value = this.Song.currentTime;

			// Change the range bar value - Main player
			this.mainRangeElt.value = this.Song.currentTime;

			// Change the timer of the song
			this.ChangeTimer(this.Song.currentTime);

			console.log('changement auto');
		}
	}

	StopProgressBarUpdating() {
		// Stop the progress bar update
		this.isChanging = true;

		console.log("Stop");
	}

	ChangeProgressBar() {
		// Change the range bar value - Secondary player
		this.Song.currentTime = this.rangeElt.value;

		// Change the range bar value - Main player
		if(localStorage.musicPlayedId == this.idElt.value) {
			this.mainRangeElt.value = this.Song.currentTime;
		}

		// Enable updating range bar
		this.isChanging = false;

		console.log(this.rangeElt.value);
		console.log("change");
	}

	ChangeProgressBarInput() { // Change the progress bar manualy (scroll progress bar)
		// Change the timer of the song
		this.ChangeTimer(this.rangeElt.value);
	}

	ChangeMainProgressBar() {
		// Change the currente range value
		this.rangeElt.value = this.mainRangeElt.value;
	}

	ChangeMainProgressBarInput() { // Change the main progress bar manualy (scroll progress bar)
		// Change the timer of the song
		this.ChangeTimer(this.mainRangeElt.value);
	}

	EndSong() {
		this.Song.addEventListener('ended', () => {
			console.log('End');

			// Hide the pause icon
			this.pauseButtonElt.style.display = "none";

			// Display the play icon
			this.playButtonElt.style.display = "inline-block";

			// Change some values
			this.Song.pause();
			this.Song.currentTime = 0;
			this.isPlaying = false;
			this.rangeElt.value = 0;
			clearInterval(this.loop);

			// Change the timer of the song
			this.ChangeTimer(this.Song.currentTime);

			// - Main player -

			if(localStorage.musicPlayedId == this.idElt.value) {
				// Display the play icon
				this.mainPauseButtonElt.style.display = "none";
				this.mainPlayButtonElt.style.display = "inline-block";

				// Change range bar
				this.mainRangeElt.value = 0;
			}
		});
	}


	// Method additionnal use many time (called only by other method not by an event)
	// ...

	// Update the timer
	ChangeTimer(value) {
		// Calcul time compared to the time of the song
		// this.time = Math.trunc(this.Song.currentTime); // Math.trunc() = Number without comma
		this.time = Math.trunc(value); // Math.trunc() = Number without comma
		this.min = this.time / 60;
		this.min = Math.trunc(this.min);
		this.sec = this.time - this.min * 60;

		// Add 0 to min
		if(this.min < 10) {
			this.min = "0" + this.min;
		}
		// Add 0 to sec
		if(this.sec < 10) {
			this.sec = "0" + this.sec;
		}
		// Change the timer value - Secondary player
		this.timerMinuteElt.innerHTML = this.min;
		this.timerSecondElt.innerHTML = this.sec;

		// Change the timer value - Main player
		if(localStorage.musicPlayedId == this.idElt.value) {
			this.mainTimerMinElt.innerHTML = this.min;
			this.mainTimerSecElt.innerHTML = this.sec;
		}
	} // End method Update the timer
}// End class SecLector
