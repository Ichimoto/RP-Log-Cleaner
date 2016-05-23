<?php
//an API Key is used to stop third parties using my limited bandwidth
if ($_POST['key'] == ""){
	include 'dbconnect.php';


	$postID = uniqid();

	$sql = "INSERT INTO log (url) VALUES ('$postID')";

	if ($conn->query($sql) === TRUE) {
	
	    echo $conn->insert_id;
		
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}else{
	echo "Error: Invalid Key";
}


?>