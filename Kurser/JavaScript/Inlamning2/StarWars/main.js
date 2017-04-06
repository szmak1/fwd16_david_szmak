$(function () {
// background sound for Star Wars theme, here for volume ajustment
var vid = $(".starWarsDemo");
vid[0].volume = 0.05;

var swapiApi = function () {};
swapiApi.prototype = {
pageIterator: 1,
init: function (callback) {
    this.swapi();
//if a callback function is sent, run it
    if (callback && typeof callback === "function") {
    callback();
    }
},

swapi: function (callback) {
var self = this;

$.ajax({
    //Getting Data from Swapi site
    url: "http://swapi.co/api/people?page=" + self.pageIterator,
    success: function (response) {
    self.parseSwapi(response);
    self.pageIterator++;
},
});
//if a callback function is sent, run it
    if (callback && typeof callback === "function") {
       callback();
}
},
    parseSwapi: function (response) {
    var resultArray = response.results;
    //Making new Arrays for all the charecters so I can animate & give them sound
    var divChars = new Array("#luke", "#c-3po", "#r2-d2", "#darth", "#leia", "#owen", "#beru", "#r5-d4", "#biggs", "#obi-wan");
    var i = 0;

    $.each(resultArray, function () {
    var character = resultArray[i];
    var name = character.name;
    //Retriving Data from the API data from properties such as "name, height, weight, eye color, gender"
    $(divChars[i]).prepend("<div class='name'>" + name + "</div><div class='hiddenContent'><div>Height: " + character.height + "cm</div><div>Weight: " + character.mass + "kg</div><div>Eyes: " + character.eye_color + "</div><div>Gender: " + character.gender + "</div></div>");
       i++;
    });
  }
};

//callback function to send to module
function tryCallback() {
//really no reason for this, just wanted to make a callback function
//callbackIterator++;
}
//init module once
var newSwapiApi = new swapiApi();
newSwapiApi.init();

//ON MOUSEOUT SETTING CSS PROPERTY BACK TO NORMAL FOR ALL THE (n) childs
$(".wrapper > div:nth-of-type(n)").mouseout(function () {
    $(this).css("border-color", "white")
});

//Animations on click with fadeIn & Out for Luke,
//Adding sound on mouseenter, ajusting volume & adding CSS properties
/*Luke Skywalker
***************************************************/
$("#luke").click(function () {
    $("#luke").fadeOut(3000);
    $("#luke").fadeIn(3000);
});
$("#luke").mouseenter(function () {
    var audio = new Audio("music/swluke01.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")

});
/*C-C3PO
***************************************************/
$("#c-3po").click(function () {
    $("#c-3po").fadeOut(3000);
    $("#c-3po").fadeIn(3000);
    $("#c-3po").css("color", "yellow");
});
$("#c-3po").mouseenter(function () {
    var audio = new Audio("music/Im C3PO.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
$("#c-3po").mouseout(function () {
    audio.stop();
});
/*R2D2
***************************************************/
$("#r2-d2").click(function () {
    $("#r2-d2").addClass("animated hinge");
});
$("#r2-d2").mouseenter(function () {
    var audio = new Audio("music/R2D2-yeah.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*DARTH VADER
***************************************************/
$("#darth").click(function () {
    $("#darth").addClass("animated shake");
});
$("#darth").mouseenter(function () {
    var audio = new Audio("music/swvader01.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*LEILA ORGANA
***************************************************/
$("#leia").click(function () {
    $("#leia").addClass("animated rollIn");
});
$("#leia").mouseenter(function () {
    var audio = new Audio("music/nerfherder.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*OWEN LARS
***************************************************/
$("#owen").click(function () {
    $("#owen").addClass("animated rollOut");
});
$("#owen").mouseenter(function () {
    var audio = new Audio("music/swvader02.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*Beru Whitesun lars
***************************************************/
$("#beru").click(function () {
    $("#beru").addClass("animated zoomOut");
});
$("#beru").mouseenter(function () {
    var audio = new Audio("music/swvader02.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*R5-D4
***************************************************/
$("#r5-d4").click(function () {
    $("#r5-d4").addClass("animated zoomInDown");
});
$("r5-d4").mouseenter(function () {
    var audio = new Audio("music/swvader01.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*BIGGS DARKLIGHTER
***************************************************/
$("#biggs").click(function () {
    $("#biggs").addClass("animated slideInUp");
});
$("#biggs").mouseenter(function () {
    var audio = new Audio("music/swvader01.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
/*OBI-WAN KENOBI
***************************************************/
$("#obi-wan").click(function () {
    $("#obi-wan").addClass("animated bounceInUp");
});
$("#obi-wan").mouseenter(function () {
    var audio = new Audio("music/force.mp3");
    audio.play();
    audio.volume = 0.05;
    $(this).css("border-color", "yellow")
});
//ADDING ANIMATION TO H1
$("h1").css("color","yellow").addClass("animated zoomInDown");
//ADDING ANUMATUIN TO WRAPPER ALL THE CHARACTERS
$(".wrapper").css("color","yellow").addClass("animated rubberBand");




});