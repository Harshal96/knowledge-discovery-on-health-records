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
		<style>
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
		</style>
        <script type="text/javascript">
        
        function sendXHR(type, url, data, callback) {
          var newXHR = new XMLHttpRequest() || new window.ActiveXObject("Microsoft.XMLHTTP");
          newXHR.open(type, url, true);
          newXHR.send(data);
          newXHR.onreadystatechange = function() {
            if (this.status === 200 && this.readyState === 4) {
              callback(this.response);
            }
          };   
        }
        function myfunction() {
            var x = 0;
            if(x == 0) {
        sendXHR("GET", "description.txt", null, function(response) { // response contains the content of the description.txt file.
          document.getElementById("results").innerHTML = response; // Use innerHTML to get or set the html content.
        });
                var x = 1;
            }
            if(x == 1) {
                document.getElementById("results").innerHTML = " "; 
                x = 0;
            }
        }
    </script>  
	</head>
	<body>
		<div class="header"><h1>Analyze Medical Data and Search</h1></div>
        <div id="one" style="margin-left: 18%">
            <form action="one.php" method="post">
                <select id="opt">
                    <option value="diabetes" selected>Diabetes</option>
                    <option value="two">Option 2</option>
                    <option value="three">Option 3</option>
                </select>
                <div class="sample" style="width: 20%"><input type="text" name="col1" id="col1" placeholder="Number of Times Pregnant" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col2" id="col2" placeholder="P. Glucose C." required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col3" id="col3" placeholder="Diastolic BP" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col4" id="col4" placeholder="Triceps" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col5" id="col5" placeholder="2hr Serum insulin" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>

                <input type="submit" value="Add to TS" id="add" name="submit[add]" />
                <input type="button" value="Search" id="search" name="search" onclick="myfunction()" />
            </form>
        </div>
        <div id="two" class="divn" style="margin-left: 18%">
            <form action="one.php" method="post">
                <select id="opt2">
                    <option value="diabetes">Diabetes</option>
                    <option value="two" selected>Option 2</option>
                    <option value="three">Option 3</option>
                </select>
                <div class="sample" style="width: 20%"><input type="text" name="col1" id="col1" placeholder="Number of Times Pregnant" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col2" id="col2" placeholder="P. Glucose C." required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col3" id="col3" placeholder="Diastolic BP" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col4" id="col4" placeholder="Triceps" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col5" id="col5" placeholder="2hr Serum insulin" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>

                <input type="submit" value="Add to TS" id="add" name="submit[add]" />
                <input type="button" value="Search" id="search" name="search" onclick="myfunction()" />
            </form>
        </div>
        <div id="three" class="divn" style="margin-left: 18%">
            <form action="one.php" method="post">
                <select id="opt3">
                    <option value="diabetes">Diabetes</option>
                    <option value="two">Option 2</option>
                    <option value="three" selected>Option 3</option>
                </select>
                <div class="sample" style="width: 20%"><input type="text" name="col1" id="col1" placeholder="Number of Times Pregnant" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col2" id="col2" placeholder="P. Glucose C." required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col3" id="col3" placeholder="Diastolic BP" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col4" id="col4" placeholder="Triceps" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col5" id="col5" placeholder="2hr Serum insulin" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col6" id="col6" placeholder="BMI" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col7" id="col7" placeholder="D. Pedigree Fn" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col8" id="col8" placeholder="Age" required /></div>
                <div class="sample" style="width: 20%"><input type="text" name="col9" id="col9" placeholder="Result" required /></div>

                <input type="submit" value="Add to TS" id="add" name="submit[add]" />
                <input type="button" value="Search" id="search" name="search" onclick="myfunction()" />
            </form>
        </div>
        <div id="results"></div>
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
		</div>
	</body>
    <script type="text/javascript">
        $('select#opt').change(function() {
            if($('select#opt').find('option:selected').attr('value') === 'diabetes') {
                $('div#one').removeClass('divn');
                $('div#one').addClass('divt');
                $('div#two').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="diabetes"]').attr("selected",true);           
            }
            if($('select#opt').find('option:selected').attr('value') === 'two') {
                $('div#two').removeClass('divn');
                $('div#two').addClass('divt');
                $('div#one').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="two"]').attr("selected",true);
            }
            if($('select#opt').find('option:selected').attr('value') === 'three') {
                $('div#three').removeClass('divn');
                $('div#three').addClass('divt');
                $('div#one').addClass('divn');
                $('div#two').addClass('divn');
                $('select option[value="three"]').attr("selected",true);
            }
        });
        $('select#opt2').change(function() {
            if($('select#opt2').find('option:selected').attr('value') === 'diabetes') {
                $('div#one').removeClass('divn');
                $('div#one').addClass('divt');
                $('div#two').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="diabetes"]').attr("selected",true);
            }
            if($('select#opt2').find('option:selected').attr('value') === 'two') {
                $('div#two').removeClass('divn');
                $('div#two').addClass('divt');
                $('div#one').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="two"]').attr("selected",true);
            }
            if($('select#opt2').find('option:selected').attr('value') === 'three') {
                $('div#three').removeClass('divn');
                $('div#three').addClass('divt');
                $('div#one').addClass('divn');
                $('div#two').addClass('divn');
                $('select option[value="three"]').attr("selected",true);
            }
        });
        $('select#opt3').change(function() {
            if($('select#opt3').find('option:selected').attr('value') === 'diabetes') {
                $('div#one').removeClass('divn');
                $('div#one').addClass('divt');
                $('div#two').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="diabetes"]').attr("selected",true);
            }
            if($('select#opt3').find('option:selected').attr('value') === 'two') {
                $('div#two').removeClass('divn');
                $('div#two').addClass('divt');
                $('div#one').addClass('divn');
                $('div#three').addClass('divn');
                $('select option[value="two"]').attr("selected",true);
            }
            if($('select#opt3').find('option:selected').attr('value') === 'three') {
                $('div#three').removeClass('divn');
                $('div#three').addClass('divt');
                $('div#one').addClass('divn');
                $('div#two').addClass('divn');
                $('select option[value="three"]').attr("selected",true);
            }
        });
    </script>
</html>
