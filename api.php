<?php
include 'functions.php';

include 'dbconnect.php';


$postID = uniqid();
$text = $conn->real_escape_string($text);


$sql = "INSERT INTO logs (url, rp) VALUES ('$postID', '$text')";

if ($conn->query($sql) === TRUE) {
    echo "http://rplogcleaner.com/view.php?log=".$postID;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>