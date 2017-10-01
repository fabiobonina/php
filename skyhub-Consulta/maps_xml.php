<?php
//require("config.php");

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&apos;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 
// Opens a connection to a mySQL server

// Set the active mySQL database
/*$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}*/
$connection= mysqli_connect("localhost", "root", "", "system_tec");

if (!$connection) {
  die("Not connected : " . mysql_error());
}


// Select all the rows in the markers table
/*$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}*/
$sql = "SELECT id, cliente, nome, municipio, uf, latitude, longitude, ativo FROM tb_localidades";
$consulta = mysqli_query($connection, $sql);
if (!$consulta)
  die("Erro ao fazer consulta!");


header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<tb_localidades>';
// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_array($consulta)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'cliente="' . parseToXML($row['cliente']) . '" ';
  echo 'nome="' . parseToXML($row['nome']) . '" ';
  echo 'municipio="' . $row['municipio'] . '" ';
  echo 'uf="' . $row['uf'] . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'ativo="' . $row['ativo'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>