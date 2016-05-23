<?php
//an API Key is used to stop third parties using my limited bandwidth

if ($_POST['key'] == ""){
	
	if ($_POST['logID'] != "" ){
		include 'functions.php';

		include 'dbconnect.php';

		$text = trim($text);
		$text = $text . "\r\n" . "\r\n";
		$text = $conn->real_escape_string($text);
		
		$postid = $_POST['logID'];

		$sql = "INSERT INTO post (logID, rp) VALUES ('$postid', '$text')";

		if ($conn->query($sql) === TRUE) {
			
			$sql = "SELECT * FROM log WHERE id = '$postid'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        $logurl =  $row["url"];
					 echo "http://rplogcleaner.com/api-view.php?log=".$logurl;
			    }
			}
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}else{
		echo "Error: No Log ID supplied";
	}		
}else{
	echo "Error: Invalid Key";
}

?>