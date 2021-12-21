<?php
	if (isset($_POST["id"])) {
		$connect = mysqli_connect("localhost", "root", "", "laba9");
		$query = "SELECT * from xml where id = '".$_POST["id"]."'";
		$result = mysqli_query($connect, $query);
		$output = '';
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
			<h1>'.$row["title"].'</h1> 
			<p>'.$row["description"].'</p> 
			';
		}
		echo $output;
	}
?>