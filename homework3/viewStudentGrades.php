<html>
<head> 
    <title>View Student Grades</title>
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

echo "<form action ='' method='post'>
    <p>Enter your student ID:</p>
    <input type ='text' name='studentID' placeholder='Enter Student ID'>
    <input type = 'submit' name = 'search' value='Search By Student ID'>
    </form>
    <p>Below is table of all of the grades you inserted into the database. </p>
    <table>
    <tr>
        <th>Student ID</th>
        <th>Grades</th>
    </tr> <br>";




if (isset($_POST['search'])) {
    $studentID = $_POST['studentID'];

    $query = "SELECT *
            FROM `StudentTable`
            WHERE studentID='$studentID'
            ORDER BY grade DESC
            ";


    $query_run = mysqli_query($connection, $query);

    if ($connection->multi_query($query) === TRUE) {
        while ($row = mysqli_fetch_array($query_run)) {

            echo "<tr>";
            echo "<td>" . $row['studentID'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "</tr>";
        }
    }
}

echo "</table> <br>";
//echo ("<a href='index.html'>View All Student Grades</a>");
echo("<button onclick =\"location.href='index.html'\">Insert More Grades</button><br><br>");
echo("<button onclick =\"location.href='viewAll.php'\">View All Grades for All Students</button><br><br>");
echo("<button onclick =\"location.href='average.php'\">Average</button><br><br>");
?>

</div>

</body>
</html>
