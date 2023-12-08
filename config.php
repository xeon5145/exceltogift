<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="master.css" rel="stylesheet">
<script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
<meta charset="UTF-8">

<?php
$dbhost = '3.7.213.76';
$dbname = 'firstuniv_copy';
$dbuser = 'root';
$dbpass = 'D@t@aadd00#2022';

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function getSelect($conn, $query, $fetchType)
{
  $queryResponse = mysqli_query($conn, $query) or die($query . mysqli_error());
  $dbReturnArray = array();
  $i = 0;
  $fetchCommand = "mysqli_fetch_$fetchType";

  while (@$queryResponseRow = $fetchCommand($queryResponse)) {
    $dbReturnArray[$i] = $queryResponseRow;
    $i++;
  }

  return $dbReturnArray;
}
?>