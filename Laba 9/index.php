<?php
$connect = mysqli_connect("localhost", "root", "", "laba9");
 $var = $connect->query("SELECT COUNT(*) from xml");
 if ($var != "") {
     $connect->query("TRUNCATE TABLE  xml");
 }
 
$xml = simplexml_load_file("data.xml")
    or die("Error: Cannot create object");
 

foreach ($xml->children() as $row) {
    $tab = $row->tab;
    $title = $row->title;
    $description = $row->description;
     
    // SQL query to insert data into xml table
    $sql = "INSERT INTO xml(tab, title,
        description) VALUES ('"
        . $tab . "','" . $title . "','"
        . $description . "')";
     
    $result = mysqli_query($connect, $sql);
     
}
?>

<html> 
<head> 
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head> 
<body> 
	<nav class="one">
  <ul class="topmenu">
    <?php

    $result = $connect->query("SELECT id, tab from xml");

    $tabs = $result->fetch_all(MYSQLI_ASSOC);
    foreach($tabs as $value) {
      echo ' <li id="'. $value['id'] .'"><a href="#">' . $value['tab'] . '</a></li>
      ';
    }
    ?>
  </ul>
</nav>
<span id="page_details"></span>
</body> 
</html> 
