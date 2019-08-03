<!DOCTYPE html>
<html>
	<title>BE Project</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" >
                $(document).ready(function() {
                  // Setup - add a text input to each footer cell
                  $('#employee-grid tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" style="padding: 5px; width: 100%" placeholder="Search ' + title + '" />');
                  });

                  var table = $('#employee-grid').dataTable({
                    "processing": true,
                    "serverSide": true,
                    "bFilter": true,
                    "ajax": "employee-grid-data.php",
                    initComplete: function() {
                      var api = this.api();

                      // Apply the search
                      api.columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change', function() {
                          if (that.search() !== this.value) {
                            that.search(this.value).draw();
                          }
                        });
                      });
                    }
                  });
                });
		</script>
      <script type="text/javascript" language="javascript" >
                $(document).ready(function() {
                  // Setup - add a text input to each footer cell
                  $('#employee-grid2 tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" style="padding: 5px; width: 100%" placeholder="Search ' + title + '" />');
                  });

                  var table = $('#employee-grid2').dataTable({
                    "processing": true,
                    "serverSide": true,
                    "bFilter": true,
                    "ajax": "employee-grid-data-2.php",
                    initComplete: function() {
                      var api = this.api();

                      // Apply the search
                      api.columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change', function() {
                          if (that.search() !== this.value) {
                            that.search(this.value).draw();
                          }
                        });
                      });
                    }
                  });
                });
		</script>
		<style>
            .dataTables_filter, .dataTables_info { display: none; }
			div.container {
			    margin: 0 auto;
			    max-width:760px;
			}
			div.header {
			    margin: 50px auto;
			    line-height:30px;
			    max-width:760px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			    font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
			}
            .sample {
                display: inline;
            }
            input[type=text], select {
                width: 20%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit], input[type=button] {
                width: 20%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover, , input[type=button]:hover {
                background-color: #45a049;
            }
            tfoot {
                display: table-header-group;
            }
            .divt {
                display: block;
            }
            .divn {
                display: none;
            }
          
            /* Style the tab */
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
		</style> 
	</head>
	<body>
		<div class="header"><h1>Analyze Medical Data and Search</h1></div>
      
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'Diabetes')">Diabetes</button>
          <button class="tablinks" onclick="openCity(event, 'Lung Resection')">Lung Resection</button>
        </div>

        <div id="Diabetes" class="tabcontent">          
        <div id="one" style="margin-left: 18%">
            <form action="one.php" method="post">
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col1" id="col1" placeholder="Number of Times Pregnant" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col2" id="col2" placeholder="P. Glucose C." required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col3" id="col3" placeholder="Diastolic BP" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col4" id="col4" placeholder="Triceps" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col5" id="col5" placeholder="2hr Serum insulin" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="col9" id="col9" placeholder="Result" required /></div>

                <input type="submit" value="Add to TS" id="add" name="submit[add]" />
                <a style="background-color: #4CAF50; color: white; 
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;" href="http://localhost:8000/simpleNN/pima1/predict1" target="_blank">Try Predictions </a>
            </form>
        </div>
          
		<div class="container" style="margin-top: 50px">
			<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>Number of Times Pregnant</th>
							<th>P. Glucose C.</th>
							<th>Diastolic BP</th>
							<th>Triceps</th>
							<th>2hr Serum Insulin</th>
							<th>BMI</th>
							<th>D. Pedigree Fn</th>
							<th>Age</th>
							<th>Result</th>
						</tr>
					</thead>
                    <tfoot>
                        <tr>
                            <th>Number of Times Pregnant</th>
                            <th>P. Glucose C.</th>
                            <th>Diastolic BP</th>
                            <th>Triceps</th>
                            <th>2hr Serum Insulin</th>
                            <th>BMI</th>
                            <th>D. Pedigree Fn</th>
                            <th>Age</th>
                            <th>Result</th>
                        </tr>
                    </tfoot>
			</table>
          
        <div style="margin-top: 2%">
          <form action="line-chart.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="X Axis" required /></div>
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="two" id="two" placeholder="Y Axis" required /></div>
            <div class="sample" style="width: 20%"><input type="text" name="name" id="two" placeholder="Y Axis" readonly value="Diabetes" required /></div>
            <input type="submit" value="Plot Line Graph" />
          </form>
        </div>
          <div style="margin-top: 2%">
          <form action="box-plot.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="Diabetes or No Diabetes (0 or 1)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" name="two" id="two" placeholder="Column Number" required /></div>
            <div class="sample" style="width: 20%"><input type="text" name="name" id="two" readonly value="Diabetes" required /></div>
            <input type="submit" value="Plot Box-Plot" />
          </form>
        </div>
          <div style="margin-top: 2%">
          <form action="piechart.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="Diabetes or No Diabetes (0 or 1)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" name="two" id="two" placeholder="Column Number" required /></div>
            <div class="sample" style="width: 20%"><input type="text" name="name" id="two" readonly value="Diabetes" required /></div>
            <input type="submit" value="Plot Pie Chart" />
          </form>
        </div>
		</div>
        </div>

        <div id="Lung Resection" class="tabcontent">
          <div class="container" style="margin-top: 50px">
          <a style="background-color: #4CAF50; color: white; 
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;" href="http://localhost:8000/simpleNN/palomino1/predict" target="_blank">Try Predictions </a>
			<table id="employee-grid2"  cellpadding="0" cellspacing="0" border="0" class="display">
					<thead>
						<tr>
						  <th>DGN: Diagnosis</th>
                          <th>Forced vital capacity</th>
                          <th>Forced expiration</th>
                          <th>Performance status</th>
                          <th>Pain before surgery</th>
                          <th>Haemoptysis before surgery
                          <th>Dyspnoea before surgery</th>
                          <th>Cough before surgery</th>
                          <th>Weakness before surgery</th>
                          <th>T in clinical TNM</th>
                          <th>Type 2 DM</th>
                          <th>MI up to 6 months
                          <th>PAD - peripheral arterial diseases</th>
                          <th>Smoking</th>
                          <th>Asthma</th>
                          <th>Age at surgery</th>
                          <th>1 year survival period</th>
						</tr>
					</thead>
                    <tfoot>
                        <tr>
                          <th>DGN: Diagnosis</th>
                          <th>Forced vital capacity</th>
                          <th>Forced expiration</th>
                          <th>Performance status</th>
                          <th>Pain before surgery</th>
                          <th>Haemoptysis before surgery
                          <th>Dyspnoea before surgery</th>
                          <th>Cough before surgery</th>
                          <th>Weakness before surgery</th>
                          <th>T in clinical TNM</th>
                          <th>Type 2 DM</th>
                          <th>MI up to 6 months
                          <th>PAD - peripheral arterial diseases</th>
                          <th>Smoking</th>
                          <th>Asthma</th>
                          <th>Age at surgery</th>
                          <th>1 year survival period</th>
                        </tr>
                    </tfoot>
			</table>
          <div style="margin-top: 2%">
          <form action="line-chart.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="X Axis" required /></div>
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="two" id="two" placeholder="Y Axis" required /></div>
            <div class="sample" style="width: 20%"><input type="text" readonly name="name" id="two" placeholder="Lung Resection" value="Lung Resection" required /></div>
            <input type="submit" value="Plot Line Graph" />
          </form>
        </div>
            <div style="margin-top: 2%">
          <form action="box-plot-2.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="Yes or No (0 or 1)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="two" id="two" placeholder="Column Number (0 to 15)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" readonly name="name" id="two" placeholder="Lung Resection" value="Lung Resection" required /></div>
            <input type="submit" value="Plot Box-Plot" />
          </form>
        </div>
            <div style="margin-top: 2%">
          <form action="piechart-2.php" method="get">
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="one" id="one" placeholder="Yes or No (0 or 1)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" pattern="\d*" name="two" id="two" placeholder="Column Number (0 to 15)" required /></div>
            <div class="sample" style="width: 20%"><input type="text" readonly name="name" id="two" placeholder="Lung Resection" value="Lung Resection" required /></div>
            <input type="submit" value="Plot Pie Chart" />
          </form>
        </div>
        </div>
      </div>

        
  <script>
  function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
  }
  </script>
  <script type="text/javascript">
        function getQueryVariable(variable)
        {
               var query = window.location.search.substring(1);
               var vars = query.split("&");
               for (var i=0;i<vars.length;i++) {
                       var pair = vars[i].split("=");
                       if(pair[0] == variable){return pair[1];}
               }
               return(false);
        }
    </script>
    <script>
        window.onload = function () {
            var x = getQueryVariable("error");
            if(x == 1) {
                alert("There was a problem adding the record");
                window.location.href = "index.php";
            }
          }
      </script>
    </body>
</html>
