<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <title>Login Form</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                text-align: center;
            }

            h2 {
                color: black;
            }

            form {
                width: 300px;
                margin: 0 auto;
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            label {
                display: block;
                text-align: left;
            }

            input[type="text"], input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            input[type="button"] {
                background-color: blue;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            input[type="button"]:hover {
                background-color: green;
            }
        </style>
        <script>
            $(document).ready(function(){
            $("#submitbutton").click(function(ev) { 
            username  = $("#username").val();
            password  = $("#password").val();
            check     = 0;

            $("#enterform").text("");
            $("#usernameerror").text("");
            $("#passworderror").text("");

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            if(username == "" || password == "" ){
                check = 1;
                $("#enterform").text("enter all fields");
            }
            if(username.length<3){
                check = 1;
                $("#usernameerror").text("enter username properly");
            }
            if(password.length<3){
                check = 1;
                $("#passworderror").text("enter password properly");
            }
            if(check == 1){
                return false;
            }

            var form = $("#myForm"); 
            var url = form.attr('action'); 
            $.ajax({ 
                type: "POST", 
                url: url, 
                data: form.serialize(), 
                success: function(data) {
                    if (data.status === "admin") {
                        window.location.href = "Faqform.php";
                    } else if (data.status === "notadmin") {
                        window.location.href = "faqtable.php";
                    } else {
                        alert("Invalid credentials");
                        $('form :input:not(:button)').val('');
                    }
                },
                error: function(data) { 
                    alert("some Error"); 
                } 
            }); 
            }); 
            });
        </script>
    </head>
    <body>
        <h1>Login</h1>
        <div><span id="enterform"></span></div>
        <form id="myForm" method="post" action="loginbackend.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <span id="usernameerror"></span>
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <span id="passworderror"></span>
            <br>

            <input type="button" id="submitbutton" value="Submit Form">
        </form>
    </body>
</html>
