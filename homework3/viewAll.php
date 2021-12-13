<html>
<head> 
    <title> View Student ID</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>



<?php
$servername = "database1.csg7z7cfbmxm.us-east-1.rds.amazonaws.com";
$username = "steph";
$password = "Angie183923!";
$dbname = "Calculator";
$connection = mysqli_connect($servername, $username, $password, $dbname);

?>
<div class="view">
<?php

echo "<p> Below is a list of all the student ID's in the database: </p>

    <table>
    <tr>
        <th>Student ID</th>
    </tr> <br>";






$query = "SELECT DISTINCT studentID
            FROM StudentTable
            ORDER BY studentID
            ";


$query_run = mysqli_query($connection, $query);

if ($connection->multi_query($query) === TRUE) {
    while ($row = mysqli_fetch_array($query_run)) {

        echo "<tr>";
        echo "<td>" . $row['studentID'] . "</td>";
        echo "</tr>";
    }
}
echo "</table> <br>";


echo("<button onclick =\"location.href='index.html'\">Insert More Grades</button><br><br>");
echo("<button onclick =\"location.href='viewStudentGrades.php'\">View Your Grades</button><br><br>");
echo("<button onclick =\"location.href='average.php'\">Average</button><br><br>");
?>

</div>

</body>
</html>
