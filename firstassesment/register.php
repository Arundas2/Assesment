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
                    <td><label for="username">username</label></td>
                    <td><input type="text" name="username" id="username" required>
                </tr>
                <tr>
                    <td><label for="password">password</label></td>
                    <td><input type="password" name="password" id="password" required>
                </tr>
                <tr>
                    <td><label for="role">role</label></td>
                    <td><input type="role" name="role" id="role" required>
                </tr>
                <tr>
                    <td> <input type="button" id="submit" value="Submit" ></td>
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
                url : "regtable.php",
                data : $('#formData').serialize(),
                success : function(response){
                    $("#ajax-data").html(response);
                },
                error:function(){
                    alert("error");
                }
            });
        });
        </script>