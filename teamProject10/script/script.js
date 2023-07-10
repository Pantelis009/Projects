const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

      //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

    function validateForm() {
        var password = document.getElementById("password").value;
        var name = document.getElementById("name");
        var username = document.getElementById("username");
        var confpassword = documen.getElementById("confpassword");
        var email = document.getElementById("email");

        if (email == "") {
            alert("Email field cannot be empty");
            return false;
        }
        if (name == "") {
            alert("Please enter your name!");
            return false;
        }
        if (username == "") {
             alert("Please enter a username!");
            return false;
        }
        if (password == "") {
            alert("Password field cannot be empty");
            return false;
        }
         return true;
    }