<?php
include 'dbconnect.php';

if (isset($_GET['log'])){
	$logurl = $_GET['log'];
	
	$sql = "SELECT * FROM log WHERE url = '$logurl'";
	$result = $conn->query($sql);
	$text = "";
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $logid =  $row["id"];
	    }
		
		
		$sql = "SELECT * FROM post WHERE logID = '$logid'";
		$result2 = $conn->query($sql);
		if ($result2->num_rows > 0) {
		    // output data of each row
		    while($row1 = $result2->fetch_assoc()) {
		       $text .=  $row1["rp"];
		    }
		
		} else {
		    echo "0 results";
		}
	} else {
	    echo "0 results";
	}
	$conn->close();
	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>RP Log Cleaner</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
	
		<style>#forkongithub a{background:#000;color:#fff;text-decoration:none;font-family:arial,sans-serif;text-align:center;font-weight:bold;padding:5px 40px;font-size:1rem;line-height:2rem;position:relative;transition:0.5s;}#forkongithub a:hover{background:#c11;color:#fff;}#forkongithub a::before,#forkongithub a::after{content:"";width:100%;display:block;position:absolute;top:1px;left:0;height:1px;background:#fff;}#forkongithub a::after{bottom:1px;top:auto;}@media screen and (min-width:800px){#forkongithub{position:fixed;display:block;top:0;right:0;width:200px;overflow:hidden;height:200px;z-index:9999;}#forkongithub a{width:200px;position:absolute;top:40px;right:-60px;transform:rotate(45deg);-webkit-transform:rotate(45deg);-ms-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);box-shadow:4px 4px 10px rgba(0,0,0,0.8);}}</style><span id="forkongithub"><a href="https://github.com/zacthespack/RP-Log-Cleaner">Fork me on GitHub</a></span>
	
		<div class="container">
			<h1>RP Log Cleaner</h1>
				<p><label for="text">RP Text Cleaned:<br></label><textarea class="form-control" type="text" id="text" name="text" rows="10"><?=$text?></textarea></p>
			<p>Built by Lyrza (zp.lyric) if you find a bug or have a feature request, please email: <a href="mailto:support@rplogcleaner.com" target="_top">support@rplogcleaner.com</a>
			</div>
	
		</p>
	</body>
	</html>
	<?
}else{
	echo "Error no log found";
}

?>