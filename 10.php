<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tycse";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


if(isset($_POST['submit']))
{
    $rollno=$_POST['rollno'];
    $name= $_POST['name'];
    $contact=$_POST['contact'];
    $marks= $_POST['marks'];

    $sql = "INSERT INTO student VALUES ('$rollno','$name','$contact','$marks')";

    if ($conn->query($sql) === TRUE) 
    {
    echo "New record created successfully";
    } 
    else 
    {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
if (isset($_POST["update"]))
{
  $rollno=$_POST['rollno'];
  $name= $_POST['name'];
  $contact=$_POST['contact'];
  $marks= $_POST['marks'];
  $sql="update student set name='$name',contact='$contact',marks='$marks' where rollno='$rollno'";

  if ($conn->query($sql) === TRUE)
  {
    echo "record updated";

  }
  else
  {
    echo "error". $sql . "<br>" . $conn->error;
  }
}
if (isset($_POST["delete"]))
{
  $rollno=$_POST['rollno'];
  $name= $_POST['name'];
  $contact=$_POST['contact'];
  $marks= $_POST['marks'];
  $sql="delete from student where rollno='$rollno'";

  if ($conn->query($sql) === TRUE)
  {
    echo "record updated";

  }
  else
  {
    echo "error". $sql . "<br>" . $conn->error;
  }
}
?>
<html>
    <body bgcolor="slateblue">
        <form method="post">
        <label>roll no<input type="text" id="rollno" name="rollno"></label><br><br>
        <label>name<input type="text" id="name" name="name"></label><br><br>
        <label>contact<input type="text" id="contact" name="contact"></label><br><br>
        <label>marks<input type="text" id="marks" name="marks"></label><br><br>
        <input type="submit" id="submit" name="submit">
        <button id="update" name="update">update</button>
        <button id="delete" name="delete">delete</button>
        </form>

    </body>
</html>