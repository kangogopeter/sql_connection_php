<?php
  try {
  $host = 'localhost:3306';
  $dbname = 'bookexamples';
  $user = 'sampleuser';
  $pass = '3C9038A509BE6145AAD6827B4568AD918BC3DAC0';
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user,
,→ $pass);
 } catch(PDOException $e) {echo $e;}

 function getNumberOfPositive($date){
global $DBH;
$diiiate = explode(' ', $date);
$justYear = $date[0];
$sql = "SELECT COUNT(score) as score FROM pastime WHERE
,→ TIMESTAMP LIKE '$justYear%' AND score > 5 LIMIT 7;";
$sth = $DBH->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();
return $res[0][0];
 }
function getNumberOfNegative($date){
global $DBH;
$date = explode(' ', $date);
$justYear = $date[0];
$sql = "SELECT COUNT(score) as score FROM pastime WHERE , TIMESTAMP LIKE '$justYear%' AND score <= 5 LIMIT 7;";
$sth = $DBH->prepare($sql);
$sth->execute();
 $res = $sth->fetchAll();

  return $res[0][0];
 }

// Get a list of unique dates from the
// database
$sql = 'SELECT DISTINCT timestamp FROM pastime';
$sth = $DBH->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();
$labels = '';
$positive = '';
$negative = '';
 foreach ($res as $row){
$labels = $labels . "'" .$row[0]. "',";
$positive = $positive . getNumberOfPositive($row[0]) . ',';
$negative = $negative . getNumberOfNegative($row[0]) . ',';
 }
$labels = substr($labels, 0, -1); // remove the final colon from
,→ the end of the string
$positive = substr($positive, 0, -1);
$negative = substr($negative, 0, -1);
 ?>

