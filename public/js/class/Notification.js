"use strict";

class Notification {
    constructor() 
    {
        // Dom elements
        this.moduleNotificationIdElt = document.getElementById("module-notification-id");
        this.moduleNotificationTextElt = document.getElementById("module-notification-text-id");

        // variables
        //..........
    }

    NotificationOpen() 
    {
        if(this.moduleNotificationIdElt && this.moduleNotificationTextElt)
        {
            // Open notification
            this.moduleNotificationIdElt.style.width = "300px";

            //  Display text
            setTimeout(() => {
                this.moduleNotificationTextElt.style.color = "black";
            }, 300);

            //  Hide text
            setTimeout(() => {
                this.moduleNotificationTextElt.style.color = "#ffda2a";
            }, 4000);

            // Hide notification
            setTimeout(() => {
                this.moduleNotificationIdElt.style.width = "0";
                
            }, 4500);
        }
    }

} // End Notification class

// Notification object
var notificationFreeObject = new Notification();

// Open the notification
notificationFreeObject.NotificationOpen();