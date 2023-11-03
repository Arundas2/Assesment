<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>FAQ</title>
        <style>
            h1{
                font-size:300%;
                text-align: center;
            }
            input[type=text],textarea{
                width: 500px;
                padding:10px;
                display: inline-block;
                box-sizing:border-box;
            }
            input[type=submit]{
                background-color:blue;
            }
            #ajax-data{
            text-align: left;
            font-size: 20px;
            }
        </style>
    </head>
    <body>
        <h1>FAQ</h1>
        <center><div>
        <form method="POST" id="formData">
                <table>
                <tr>
                    <td><label for="question">Question</label></td>
                    <td><input type="text" name="question" id="question" required>
                    <span id="questionError" style="color:red;"></span></td>
                </tr>
                <tr>
                    <td><label for="answer">Answer</label></td>
                    <td><textarea name="answer" id="" cols="30" rows="10" placeholder="Enter answer" required></textarea>
                    <span id="answerError" style="color:red;"></span></td>
                </tr>
                <tr>
                    <td> <input type="button" id="submit" value="Submit" onclick="validateForm()"></td>
                </tr>
                </table>
            </form>
        <div id="ajax-data">
        </div>
     </div></center>
    </body>
    </html>
    <script type="text/javascript"></script>
    <script>
        $('#submit').on('click',function(){
            $.ajax({
                type : 'post',
                url : "faqmain.php",
                data : $('#formData').serialize(),
                success : function(response){
                    $("#ajax-data").html(response);
                },
                error:function(){
                    alert("error");
                }
            });
        });
        $('#submit').on('click', function () {
        validateForm();
    });

    function validateForm() {
        var question = $("#question").val();
        var answer = $("#answer").val();

        $("#questionError").text("");
        $("#answerError").text("");

        var check = 0;

        if (question === "" || answer === "") {
            check = 1;
            $("#questionError").text("Please enter both question and answer.");
            return false;
        }

        if (check === 0) {
            $.ajax({
                type: 'post',
                url: "faqmain.php",
                data: $('#formData').serialize(),
                success: function (response) {
                    $("#ajax-data").html(response);
                },
                error: function () {
                    alert("error");
                }
            });
        }
    }
    </script>