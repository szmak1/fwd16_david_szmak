/*1. Open the web page in your browser. On the right of the page there is
an image of a person standing on a beach.
Using the empty JavaScript file provided, write some code to create
event handlers so that when a user left-clicks on the image, an alert
box pops-up. You may need to modify the html file to do this, but do
not add in-line scripts.
Make sure your event handlers are in a function, and that the
function that calls them is in an onload event, as shown in the
presentation.*/


var click22 = document.getElementsByClassName("articleImage");

click22[0].onclick = function () {
    alert("Muahaha!");
};

/*2. Right-click event. Modify the JavaScript file to work with the
following event:
window.oncontextmenu = function ()
{
 alert("Content on this page is copyright
protected");
 return false; // cancel default menu
};
This is not really a right-click event, but an event that occurs when
the context menu appears, which is usually accessed by a right-click
or equivalent mouse action*/

window.oncontextmenu = function () {
    alert("Content on this page is copyright protected");
    return false; 
};

function changeText(id) {
    id.innerHTML = "Bam!";
}

