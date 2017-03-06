/*1. Can you double the length of the list, 
so that it looks like the image on the left?*/

/*var z = $("ul").html();

$("ul").append(z);
*/

/*var add = $( "ul" ).text();
$("ul").append("<p>" + add + "</p>");
*/



/*var addSmallText = $("ul").children().html();
$("ul").children().append("<i>fresh figs</i>");*/

/*var addSmallText = $("ul").html();
$("li").children().add(addSmallText);*/



//question 2

//Exercises jQuery 2017-02-07 Use a fresh copy of the file 05_get_html_fragment.zip.
//question 3
/*$("li").on("click", function (event){
    $("li span").remove();
    var date = new Date();
    var clicked = date.toDateString();
    $(this).append("<pan class='date'>" + clicked + " " + event.type + "</span>");
});*/

//question 4

$("ul").append("<p id='notes'></p>");

$("ul").on("click mouseover", "li", {status: "important"}, function (event){
    var listItems = "Item: " + event.target.textContent + "<br />";
    var itemStatus = "Status: " + event.data.status + "<br />";
    var itemType = "Type: " + event.type + "<br />";
    $('#notes').html(listItem + itemStatus + itemStatus);


} );