<?php
$one = $_GET['one'];
$two = $_GET['two'];
$two = $two + 1;
$col = "COL".$two;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lungs";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$sql=mysqli_query($conn, "select count(".$col.") as c, sum(".$col.") as s1, min(".$col.") as m1, max(".$col.") as m2 from table1 where COL17 = ".$one);
//echo "select count(".$col.") as c, sum(".$col.") as s1, min(".$col.") as m1, max(".$col.") as m2 from table1 where COL9 = ".$one;
$row = mysqli_fetch_array($sql);

$count = $row['c'];
$sum = $row['s1'];
$m1 = $row['m1'];
$m2 = $row['m2'];
$q2 = $count/2;
$q1 = $q2/2;
$q2 = round($q2);
$q1 = round($q1);
$q3 = $q1 + $q2;

$c = 0;
$q1v = 0;
$q2v = 0;
$q3v = 0;
$mean = $sum/$count;
$name = "Column Name";

$sql2 = mysqli_query($conn, "select ".$col." from table1 where COL17 =".$one." order by ".$col);

while($row2 = mysqli_fetch_array($sql2)){
  $c = $c + 1;
  if($c == $q1) {
    $q1v = $row2[$col];
  }
  else if($c == $q2) {
    $q2v = $row2[$col];
  }
  else if($c == $q3) {
    $q3v = $row2[$col];
  }
  else {}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Pima Indians Dataset"
	},
	data: [{
		type: "boxAndWhisker",
		upperBoxColor: "#FFC28D",
		lowerBoxColor: "#9ECCB8",
		color: "black",
		yValueFormatString: "#,##0",
		dataPoints: [
			{ label: "<?=$name?>", y: [<?=$m1?>, <?=$q1v?>, <?=$q3v?>, <?=$m2?>, <?=$q2v?>] }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>