
var randomNumber = $("#button").on("click", function(){
randomNumber = Math.round(Math.random() * 10000);
$("ul").append("<li>" + randomNumber + "</li>");
});

var removeR = $(".textBoxes").on("click", "li", function (event){
event.stopPropagation();
$(this).remove();

});






