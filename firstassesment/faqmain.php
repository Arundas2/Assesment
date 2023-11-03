<?php
$con=mysqli_connect("localhost","root","ceymox123","test");
if(!$con){
    die("Connection failed".mysqli_connect_error());
}
$question = $_POST['question'];
$answer=$_POST['answer'];
if ($question != "" || $answer != ""){
$sql1="insert into faq(question,answer)values('$question','$answer')";
mysqli_query($con,$sql1);
}
$sql="select * from faq";
$result=mysqli_query($con,$sql);
echo "<table border>
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Answer</th>
    </tr>";
    while($row=mysqli_fetch_array($result)){
       echo " <tr>
        <td>".$row['id']."</td>
        <td>".$row['question']."</td>
        <td>".$row['answer']."</td>
        </tr>";
    }
echo "</table>";
?>
