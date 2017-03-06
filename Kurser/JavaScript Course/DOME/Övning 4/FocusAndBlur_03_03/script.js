var emailField = document.getElementById("email");
emailField.onfocus = function () {
    if (emailField.value === "your email") {
        emailField.value = "";
    }
};