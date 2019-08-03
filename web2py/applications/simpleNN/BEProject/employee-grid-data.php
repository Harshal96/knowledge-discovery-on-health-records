<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pima";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'COL1', 
	1 => 'COL2',
	2=> 'COL3',
	3=> 'COL4',
	4=> 'COL5',
	5=> 'COL6',
	6=> 'COL7',
	7=> 'COL8',
	8=> 'COL9',
);

// getting total number records without any search
$sql = "SELECT COL1, COL2, COL3, COL4, COL5, COL6, COL7, COL8, COL9";
$sql.=" FROM table1";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT COL1, COL2, COL3, COL4, COL5, COL6, COL7, COL8, COL9";
$sql.=" FROM table1 WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( COL2 = '".$requestData['search']['value']."%' ";   
	$sql.=" OR COL2 LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR COL2 LIKE '".$requestData['search']['value']."%' )";
}
if( !empty($requestData['columns'][0]['search']['value']) ){   //name
	$sql.=" AND COL1 LIKE '".$requestData['columns'][0]['search']['value']."%' ";
}
if( !empty($requestData['columns'][1]['search']['value']) ){  //salary
	$sql.=" AND COL2 LIKE '".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){   //name
	$sql.=" AND COL3 LIKE '".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){  //salary
	$sql.=" AND COL4 LIKE '".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){   //name
	$sql.=" AND COL5 LIKE '".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){  //salary
	$sql.=" AND COL6 LIKE '".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){   //name
	$sql.=" AND COL7 LIKE '".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){  //salary
	$sql.=" AND COL8 LIKE '".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){   //name
	$sql.=" AND COL9 LIKE '".$requestData['columns'][8]['search']['value']."%' ";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["COL1"];
	$nestedData[] = $row["COL2"];
	$nestedData[] = $row["COL3"];
	$nestedData[] = $row["COL4"];
	$nestedData[] = $row["COL5"];
	$nestedData[] = $row["COL6"];
	$nestedData[] = $row["COL7"];
	$nestedData[] = $row["COL8"];
	$nestedData[] = $row["COL9"];
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format
?>