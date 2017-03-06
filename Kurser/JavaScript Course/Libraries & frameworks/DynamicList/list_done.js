var rand;

$("#button").on("click", function () {
    "uase strict";
    rand = Math.round(Math.random() * 10000);

    $("ul").append("<li>" + rand + "</li>");
});

// now write some code to remove items when you click on them

$(".textBoxes").on("click", "li", function (e) {
    "use strict";
    e.stopPropagation();
    $(this).remove();
});