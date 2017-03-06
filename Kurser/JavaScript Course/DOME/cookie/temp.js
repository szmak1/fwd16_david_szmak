var f = document.getElementById("fname");
var l = document.getElementById("lname");
var cookiesArray = document.cookie.split(";");






window.onload = function () {
    if (document.cookie.length !== 0) {
        var myCookie = document.cookie.split("=");
        document.getElementById("fname").value = myCookie[1];
        document.getElementById("lname").value = myCookie[2];
    }
}

f.onblur = function () {
    var v = f.value;
    console.log(v);
    document.cookie = "firstName=" + v + ";max-age=3600";
}

l.onblur = function () {
    var v = l.value;
    console.log(v);
    document.cookie = "lastName=" + v + ";max-age=3600";
}