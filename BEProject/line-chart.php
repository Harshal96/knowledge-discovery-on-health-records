<?php
$one = $_GET['one'];
$two = $_GET['two'];
$name = $_GET['name'];
if($name == "Diabetes") {
  $url = "https://gist.githubusercontent.com/ktisha/c21e73a1bd1700294ef790c56c8aec1f/raw/819b69b5736821ccee93d05b51de0510bea00294/pima-indians-diabetes.csv";
}
else {
  $url = "https://raw.githubusercontent.com/SaprativRay/palomino/master/lungs.csv";
}
?>

<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: "<?=$url?>",
        dataType: "text",
        success: function (data) { processData(data); }
    });

    function processData(allText) {
        var allLinesArray = allText.split('\n');
        if (allLinesArray.length > 0) {
            var dataPoints = [];
            for (var i = 0; i <= allLinesArray.length - 1; i++) {
	        var rowData = allLinesArray[i].split(',');
	        if(rowData && rowData.length > 1)
	            dataPoints.push({ label: rowData[<?=$one?>], y: parseInt(rowData[<?=$two?>]) });
            }
            chart.options.data[0].dataPoints = dataPoints;
            chart.render();
        }
    }

            
    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: "<?=$name?> Line Chart"
        },
        axisX:{
          gridThickness: 0,
          tickLength: 0,
          lineThickness: 0,
          labelFormatter: function(){
            return " ";
          }
        },
        data: [
        {
            type: "line",
            dataPoints: []
        }
        ]
    });
            
});
</script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>