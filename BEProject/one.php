<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pima";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (isset($_POST["submit"])) {
    $col1 = $_POST["col1"];
    $col2 = $_POST["col2"];
    $col3 = $_POST["col3"];
    $col4 = $_POST["col4"];
    $col5 = $_POST["col5"];
    $col6 = $_POST["col6"];
    $col7 = $_POST["col7"];
    $col8 = $_POST["col8"];
    $col9 = $_POST["col9"];
    
    if($col1 < 0 && $col1 > 100)
    	header("location:index.php?error=1");
    else if($col2 < 0 && $col2 > 200)
    	header("location:index.php?error=1");
    else if($col3 < 0 && $col3 > 300)
    	header("location:index.php?error=1");
    else if($col4 < 0 && $col4 > 150)
    	header("location:index.php?error=1");
    else if($col5 < 0 && $col5 > 150)
    	header("location:index.php?error=1");
    else if($col6 < 0 && $col6 > 80)
    	header("location:index.php?error=1");
    else if($col7 < 0 && $col7 > 5)
    	header("location:index.php?error=1");
    else if($col8 < 20 && $col8 > 110)
    	header("location:index.php?error=1");
    else if($col9 > 1)
    	header("location:index.php?error=1");
    else {}
        $sql = "insert into table1 values ($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
?>
