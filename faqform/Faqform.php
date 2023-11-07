<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <title>Faq Form</title>
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

            $("#logoutBtn").on("click", function() {
                $.ajax({
                    type: "POST",
                    url: "logout.php", 
                    success: function(data) {
                        window.location.href = "login.php"; 
                    },
                    error: function() {
                        alert("Logout failed. Please try again.");
                    }
                });
            });

            $("#submitbutton").click(function(ev) { 

            question  = $("#question").val();
            answer    = $("#answer").val();

            check = 0;

            $("#enterform").text("");
            $("#questionerror").text("");
            $("#answererror").text("");
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            if(question == "" || answer == "" ){
                check = 1;
                $("#enterform").text("enter all fields");
            }
            if(question.length<3){
                check = 1;
                $("#questionerror").text("enter question properly");
            }
            if(answer.length<3){
                check = 1;
                $("#answererror").text("enter answer properly");
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
                    alert("Form Submited Successfully"); 
                    $('form :input:not(:button)').val('');
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
        <h1>Faq Form</h1>
        <div><span id="enterform"></span></div>
        <form id="myForm" method="post" action="Faqformbackend.php">
            <label for="question">Question</label>
            <input type="text" id="question" name="question" required>
            <span id="questionerror"></span>
            <br>

            <label for="answer">Answer</label>
            <input type="text" id="answer" name="answer" required>
            <span id="answererror"></span>
            <br>

            <input type="button" id="submitbutton" value="Submit Form">
        </form>
        <button id="logoutBtn">Logout</button>
    </body>
</html>
