<html>
<head> 
    <title> VIEW </title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

<?php

include 'index.php';

$servername = "database1.csg7z7cfbmxm.us-east-1.rds.amazonaws.com";
$username = "steph";
$password = "Angie183923!";
$dbname = "Calculator";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<div class = 'insert'>
<?php
$sql = "INSERT INTO StudentTable (studentID, grade)
VALUES ('$studentID', '$grade')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Hello, Student #{$studentID} </h1>
  
  <p>Your grade of {$grade}% was successfully added into the database. 
  <br><br>";
  
  echo ("<button onclick =\"location.href='index.html'\">Insert More Grades</button><br><br>");
  echo ("<button onclick =\"location.href='viewAll.php'\">View All Grades for All Students</button><br><br>");
  echo ("<button onclick =\"location.href='viewStudentGrades.php'\">View Your Grades</button><br><br>");
  echo ("<button onclick =\"location.href='average.php'\">Average</button><br><br>");

 } 

 else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 } 


$conn->close();
?>
</div>
</body>
</html>

