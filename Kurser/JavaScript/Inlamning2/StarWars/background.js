//function myFunction() {
//location.reload(true);
//}
//
//function myFunction2() {
//var photo = new UnsplashPhoto();
//var testArr = [];
//testArr = photo.fetch();
//console.log("url:" + testArr);
//document.getElementById("myImg").src = testArr.toString();
//
//}

//When the page has loaded start executing the following code
$(function () {
    "use strict";
    var body = $(".myUnsplash img");
    var i = 1;

//this function will change the background of site every 7 seconds 
    function nextBackground() {
        var backgrounds = new Array("", "", "");
        backgrounds[0] = "https://source.unsplash.com/collection/407480";
        backgrounds[1] = "https://source.unsplash.com/collection/474208";
        backgrounds[2] = "https://source.unsplash.com/collection/332574";

        if (i % 3 === 0) {
            body.attr("src", backgrounds[0]);
        } else if (i % 3 === 1) {
            body.attr("src", backgrounds[1]);
        } else {
            body.attr("src", backgrounds[2]);
        }

        i++;
        setTimeout(nextBackground, 7700);
    }
    setTimeout(nextBackground, 7700);
});