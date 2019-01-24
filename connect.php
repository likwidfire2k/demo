<?php

include 'config.php';

try {
   $link = new PDO('dbname', $GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']);
}

catch (PDOException $e){
   echo 'Connection failed: ' . $e->getMessage();
   }

try {
  $link2 = new PDO('dbname', $GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']);
}

catch (PDOException $e){
  echo 'Connection failed: ' . $e->getMessage();
}
try {
  $link3 = new PDO('dbname', $GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']);
}

catch (PDOException $e){
  echo 'Connection failed: ' . $e->getMessage();
}
try {
  $link4 = new PDO('dbname', $GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']);
}

catch (PDOException $e){
  echo 'Connection failed: ' . $e->getMessage();
}
try {
  $link5 = new PDO('dbname', $GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']);
}

catch (PDOException $e){
  echo 'Connection failed: ' . $e->getMessage();
}
?>
