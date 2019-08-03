<?php
$one = $_GET['one'];
$two = $_GET['two'];
$two = $two + 1;
$col = "COL".$two;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pima";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$sql=mysqli_query($conn, "select count(".$col.") as c, sum(".$col.") as s1, min(".$col.") as m1, max(".$col.") as m2 from table1 where COL9 = ".$one);
//echo "select count(".$col.") as c, sum(".$col.") as s1, min(".$col.") as m1, max(".$col.") as m2 from table1 where COL9 = ".$one;
$row = mysqli_fetch_array($sql);

$count = $row['c'];
$sum = $row['s1'];
$m1 = $row['m1'];
$m2 = $row['m2'];

$mean = $m1 + $m2;
$mean = $mean/2;

$mean1 = ($m1 + $mean)/2;
$mean2 = ($m2 + $mean)/2;

$sql2 = mysqli_query($conn, "select count(".$col.") as c from table1 where ".$col." between ".$m1." and ".$mean1);
$sql3 = mysqli_query($conn, "select count(".$col.") as c from table1 where ".$col." between ".$mean1." and ".$mean);
$sql4 = mysqli_query($conn, "select count(".$col.") as c from table1 where ".$col." between ".$mean." and ".$mean2);
$sql5 = mysqli_query($conn, "select count(".$col.") as c from table1 where ".$col." between ".$mean2." and ".$m2);
 
$row2 = mysqli_fetch_array($sql2);
$row3 = mysqli_fetch_array($sql3);
$row4 = mysqli_fetch_array($sql4);
$row5 = mysqli_fetch_array($sql5);

$val1 = $row2['c'];
$val2 = $row3['c'];
$val3 = $row4['c'];
$val4 = $row5['c'];

$per1 = $val1/$count;
$per2 = $val2/$count;
$per3 = $val3/$count;
$per4 = $val4/$count;

$name = "";
if($_GET['two'] == 0) {
  $name = "Number of Times Pregnant";
}
else if($_GET['two'] == 1) {
  $name = "Plasma glucose concentration a 2 hours in an oral glucose tolerance test";
}
else if($_GET['two'] == 2) {
  $name = "Diastolic blood pressure (mm Hg)";
}
else if($_GET['two'] == 3) {
  $name = "Triceps skin fold thickness (mm)";
}
else if($_GET['two'] == 4) {
  $name = "2-Hour serum insulin (mu U/ml)";
}
else if($_GET['two'] == 5) {
  $name = "Body mass index (weight in kg/(height in m)^2)";
}
else if($_GET['two'] == 6) {
  $name = "Diabetes pedigree function";
}
else if($_GET['two'] == 7) {
  $name = "Age (years)";
}
else{}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Pie Chart Pima Indians Neural Network"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		yValueFormatString: "##0.00''",
		indexLabel: "{name}",
		dataPoints: [
			{ y: <?=$per1?>, name: "Range <?=$m1?> to <?=$mean1?>", exploded: true },
			{ y: <?=$per2?>, name: "Range <?=$mean1?> to <?=$mean?>" },
			{ y: <?=$per3?>, name: "Range <?=$mean?> to <?=$mean2?>" },
			{ y: <?=$per4?>, name: "Range <?=$mean2?> to <?=$m2?>" }
		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>