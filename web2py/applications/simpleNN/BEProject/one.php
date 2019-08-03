<?php
$servername = "localhost";
$username = "root";
$password = "";
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
    
        $sql = "insert into table1 values ($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
?>