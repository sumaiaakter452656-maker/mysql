
document.addEventListener("DOMContentLoaded", function () {

    let form = document.querySelector(".login-container form");

    if (!form) {
        return;
    }

    
    form.addEventListener("submit", function (event) {

        let email    = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value;
        let error    = document.getElementById("error");

       
        if (email === "" || password === "") {
            error.innerText = "Please enter email and password";
            event.preventDefault();
            return;
        }

        if (!email.includes("@") || !email.includes(".")) {
            error.innerText = "Enter a valid email";
            event.preventDefault(); 
            return;
        }

        error.innerText = "";
    });

});