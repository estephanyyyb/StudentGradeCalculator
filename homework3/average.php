<html>
<head> 
    <title>Cumulative Grade</title>
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
    <p>Enter you student ID number: </p>
    <input type ='text' name='studentID' placeholder='Enter Student ID'>
    <input type = 'submit' name = 'search' value='Search By Student ID'>
    </form>

   <br>";




if (isset($_POST['search'])) {
    $studentID = $_POST['studentID'];

    $sql = "SELECT  AVG(grade) FROM StudentTable WHERE studentID='$studentID'";
    $query_run = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_array($query_run)) {
        echo "<h1>Hi Student # " . $studentID . ", </h1><br>";
        echo "<p>Your cumulative average of all your grades is: " . $row['AVG(grade)'] . "%</p><br><br>";
    }
}

echo("<button onclick =\"location.href='index.html'\">Insert More Grades</button><br><br>");
echo("<button onclick =\"location.href='viewAll.php'\">View All Grades for All Students</button><br><br>");
echo("<button onclick =\"location.href='viewStudentGrades.php'\">View Your Grades</button><br><br>");
?>

</div>
</body>
</html>
