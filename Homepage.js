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
    
    getTopLevelQuickLinkArray();

    var topLevelLinks = new Array();
    for(var key in QuickLinkTypes){
        topLevelLinks.push(document.getElementById(key));
    }

    for(let i = 0; i < topLevelLinks.length; i++){
        topLevelLinks[i].addEventListener("click", handleQuickLinkClick);
    }
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
    let style = window.getComputedStyle(event.target);
    let clickedBackgroundColor = style.getPropertyValue("background-color");
    
    let lightBlueInRgb = "rgb(99, 217, 255)";
    let blueInRgb = "rgb(68, 202, 246)";
    let darkerBlueInRgb = "rgb(8, 130, 170)";


    if(clickedBackgroundColor === blueInRgb || clickedBackgroundColor === lightBlueInRgb){
        event.target.style.backgroundColor = darkerBlueInRgb;
    }
    else{
        event.target.style.backgroundColor = blueInRgb + "!important";
    }

    for(let i = 0; i < linksToShow.length; i++){
        let style = window.getComputedStyle(linksToShow[i]);
        let display = style.getPropertyValue("display");

        if(display === "none"){
            linksToShow[i].style.display = "block";
        }
        else{
            linksToShow[i].style.display = "none";
        }
//        linksToShow[i].removeClass("hidden");
//        linksToShow[i].addClass("showLink");
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
    else if(str === "Info 4430 Links"){
        id = "homework";
    }
    return document.getElementById(id);
}

function getArrayFor(arrayType){
    let array = new Array();
    if(arrayType === QuickLinkTypes.School){
        array.push(["https://bengalweb.isu.edu/cp/home/displaylogin", "Bengal Web"]);
        array.push(["http://www2.cose.isu.edu/~edwajohn/teaching/2017fall/cs4481/index.html", " CS4481"]);
    }
    else if(arrayType === QuickLinkTypes.Work){
        array.push(["https://cms.isu.edu/terminalfour/login.jsp", "T4 Login"]);
        array.push(["https://community.terminalfour.com/info/api/terminalfour-8.0/index.html", "T4 Api"]);
        array.push(["https://t4community.slack.com", "T4 Slack"]);
        array.push(["https://selfservice.terminalfour.com/servicedesk/customer/portal/1", "T4 Support"]);
        array.push(["https://cms.isu.edu/terminalfour/SiteManager?ctfn=query", "T4 SQL Query"]);
    }
    else if(arrayType === QuickLinkTypes.Programming){
        array.push(["https://hub.spigotmc.org/javadocs/bukkit/", "Bukkit API"]);
        array.push(["http://stackexchange.com/", "Stack Exchange"]);
        array.push(["https://gitlab.com", "GitLab"]);
        array.push(["https://code.excelereight.tk/wrcwpk", "Excel Git"]);
        array.push(["http://kalenpw.com:81", "Dev Server"]);
    }
    else if(arrayType === QuickLinkTypes.Misc){
        array.push(["https://mail.protonmail.com/login", "Proton Mail"]);
        array.push(["http://www.amazon.com", "Amazon"]);
        array.push(["http://xkcd.com/", "XKCD"]);
        array.push(["https://www.imgur.com", "Imgur"]);
        array.push(["https://www.isucu.org/", "ISU CU"]);
    }
    else if(arrayType === QuickLinkTypes.Torrent){
        array.push(["https://www.thepiratebay.se", "Pirate Bay"]);
        array.push(["https://www.torrentdownloads.me", "Torrent Downloads"]);
        array.push(["https://gazellegames.net/", "Gazelle Games"]);
        array.push(["https://redacted.ch/", "Redacted"]);
        array.push(["https://animebytes.tv", "Animebytes"]);
        array.push(["http://kalenpw.com:9091", "Web client"]);
        
    }

    array.sort(function (a, b){
        var one = a[1];
        var two = b[1];

        if(one < two){
            return -1;
        }
        if(one > two){
            return 1;
        }
        return 0;
    });

    return array;
}


function formatQuickLink(url, name, className){
    return '<a href="' + url + '" class="quickLink hidden innerLink ' + className + '">' + name + '</a>';
}

function formatTopLevelLink(name){
    return "<li id='" + name + "' class='quickLink'>" + name + "</li>";
}

function getTopLevelQuickLinkArray(){
    let formatted = "";
    for(var key in QuickLinkTypes){
        formatted += formatTopLevelLink(key);
        let linkArray = getArrayFor(key);
        for(let i = 0; i < linkArray.length; i++){
            formatted += formatQuickLink(linkArray[i][0], linkArray[i][1], key);
        }
    }
    document.getElementById("quickLinkList").innerHTML = formatted;
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
        [50, "http://kalenpw.com:8096"],
        [51, "https://mail.google.com"],
        [52, "https://github.com/kalenpw"],
        [53, "http://kalenpw.com"],
        [54, "http://elearn.isu.edu"],
        [55, "https://www.netflix.com"],
        [56, "https://www.reddit.com"],
        [57, "http://www.twitter.com"],
        [48, "https://www.youtube.com"]
    ];
    return keyBinds;
}

var QuickLinkTypes = Object.freeze({
    School: 'School',
    Work: 'Work',
    Programming: 'Programming',
    Misc: 'Misc',
    Torrent: 'Torrent'

});
