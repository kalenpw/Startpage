"use strict";

window.onload = function () {
    //createQuickLinks();
    var bodyElement = document.getElementById("body");
    bodyElement.addEventListener("keypress", keypressed);

    var h3s = document.getElementsByTagName("H3");
    for (var i = 0; i < h3s.length; i++) {
        h3s[i].addEventListener("click", handleH3Click);
    }
    updateImageSizes();
    handleClock();

    var topLevelLinks = $("#quickLinkList li");
    topLevelLinks.each(function(index){
        $(this).click(handleQuickLinkClick);
    });
}

window.onresize = updateImageSizes;

//Updates the frequent link icon sizes
function updateImageSizes(){
    let bodyEle = document.getElementsByTagName("BODY")[0];
    let screenWidth = bodyEle.offsetWidth;
    //10% is margin of page
    let tenPercent = screenWidth / 10;
    //50 is arbitrary amount to remove to account for padding 
    screenWidth = screenWidth - tenPercent - 50;
    //10 total icons so divide by 10
    let imgSize = screenWidth / 10;
    //Don't let images over 150px exist
    imgSize = (imgSize > 150) ? 150 : imgSize;
    let styleFormatted = imgSize + "px";
    let icons = document.getElementsByClassName("icon");
    for(let i = 0; i < icons.length; i++){
        icons[i].style.height = styleFormatted;
        icons[i].style.width = styleFormatted;
    }
}

//Display clock and keep updating every second
function handleClock(){
    setInterval(function(){
        var options = {hour12: false};
        var date = new Date();
        var dayOfWeek = date.getDay();
        var day = date.getDate();
        var month = date.getMonth();
        var year = date.getFullYear();

        var daysOfWeek = ["Sun", "Mon", "Tues", "Wed", "Thur", "Fri", "Sat"];
        var months = ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];

        document.getElementById("date").innerHTML = daysOfWeek[dayOfWeek] + " " + year + " " + months[month] + " " + day
            + "<br/>" + (new Date()).toLocaleTimeString('en-US', options);
    }, 1000)
}

//Toggles hiding inner content of each h3 tag
function handleH3Click(event) {
    var clickedContent = event.target.innerText;
    var elementToHide = getH3FromContents(clickedContent);

    var style = window.getComputedStyle(elementToHide);
    var display = style.getPropertyValue("display");

    if (display === "inline") {
        elementToHide.style.display = "none";
    }
    else {
        elementToHide.style.display = "inline";
    }
}

function handleQuickLinkClick(event){
    let clickedContent = event.target.innerText;
    let linksToShow = document.getElementsByClassName(clickedContent);
    event.target.classList.toggle("expanded");

    for(let i = 0; i < linksToShow.length; i++){
        linksToShow[i].classList.toggle("hidden");
    }
}

//Returns whatever h3 tag has the matching text
function getH3FromContents(str){
    let id = "";
    if (str === "Frequented") {
        id = "freqLinks";
    }
    else if (str === "Quick Links") {
        id = "quickLinkList";
    }
    else if (str === "//TODO") {
        id = "todoDisplay";
    }
    return document.getElementById(id);
}


//Handles key presses
function keypressed(event) {
    var key = event.keyCode;
    var keyBinds = createKeyBindArray();

    for (var i = 0; i < keyBinds.length; i++) {
        if (keyBinds[i][0] === key) {
            window.open(keyBinds[i][1], "_self");
        }
    }
}

//Creates and fills the keybinding array
function createKeyBindArray() {
    var keyBinds = [
        [49, "http://4chan.org/vg/vsg"],
        [50, "http://kalenpw.com:5222"],
        [51, "https://mail.google.com"],
        [52, "https://github.com/kalenpw"],
        [53, "http://elearn.isu.edu"],
        [54, "https://www.netflix.com"],
        [55, "https://mail.protonmail.com/login"],
        [56, "https://www.reddit.com"],
        [57, "http://www.twitter.com"],
        [48, "https://www.youtube.com"]
    ];
    return keyBinds;
}

