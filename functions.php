<?php
//Objects to remove post of
$objectsToRemove = array(
    "(Chemistry) Hair", "Magika Updates", "VISTA ANIMATIONS", ":TOX:", "L&B \"Dress Shoe\""
);

//remove the timestamp from a line for parsing
function stripTimeStamp($line){
	
	$newline = "";
	$arr1 = str_split($line);
	$foundtimestamp = false;
	$foundendtime = false;
	$foundspace = false;
	$foundchat = false;
	for ($x = 0; $x <= count($arr1); $x++) {
		if ($arr1[$x] === '[' && !$foundtimestamp) $foundtimestamp = true;
		
		if ($foundtimestamp && $arr1[$x] === ']') $foundendtime = true;
	    
		if ($foundendtime && $arr1[$x] === ' ') $foundspace = true;
		
		if ($foundspace && $arr1[$x] !== ' ') $foundchat = true;
		
		if ($foundchat) $newline = $newline . $arr1[$x];
	} 
	if (!$foundtimestamp){
		return false;
	}else{
		return $newline;
	}
}

function delete_all_between($beginning, $end, $string) {
	$beginningPos = strpos($string, $beginning);
	$endPos = strpos($string, $end);
	if ($beginningPos === false || $endPos === false) {
		return $string;
	}

	$textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

	return str_replace($textToDelete, '', $string);
}

//Form submitted
if(isset($_POST['submit'])) {
	
		//Error checking
		if(!$_POST['text']) {
			$error['error'] = "<p>Please supply your RP Text.</p>\n";
		}
	
	//No errors, process
	if(!is_array($error)) {
		
		$text = $_POST['text'];
				
		$linegap = $_POST['line'];
		$dcs = $_POST['dcs'];
		$ooc = $_POST['ooc'];
		$online = $_POST['online']; 
		$notimestamp = $_POST['notimestamp']; 
		$simenter = $_POST['simenter'];
		$landstream = $_POST['landstream'];
		$csUsed = $_POST['cs'];
		$secondlife = $_POST['secondlife'];
		$objects = $_POST['objects'];
		$chatrange = $_POST['chatrange'];
			
		if ($notimestamp == 'Yes') {
			$editedtext = "";
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (!($line2 === false)) {
					$editedtext = $editedtext . $line . "\r\n";
				}
			}
			$text = $editedtext;
		}
		if ($dcs == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (!(substr( $line2, 0, strlen($csUsed) ) === $csUsed)) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
	  
		if ($ooc == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (!(substr( $line2, 0, 2 ) === "((" || substr( $line2, 0, 2 ) === "[[") && !(substr( $line2, -2 ) === "))" || substr( $line2, -2 ) === "]]")) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
	  
		if ($online == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$linecheck = preg_replace("/[^A-Za-z0-9 ]/", '', $line);
				$check = substr($linecheck, -6);
			 	 
				if ($check !== "ffline" && $check !== "online"){
					$editedtext = $editedtext . $line . "\r\n";
				}
			}
			$text = $editedtext;
		}
	  
		if ($simenter == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (strpos($line2, 'left the region') === false && strpos($line2, 'entered the region') === false) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
		
		if ($chatrange == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (strpos($line2, 'entered chat range') === false && strpos($line2, 'left chat range') === false) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
	  
		if ($landstream == 'Yes'){
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (!(substr( $line2, 0, 11 ) === "Now playing")) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
		
		if ($secondlife == 'Yes'){
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$line2 = stripTimeStamp($line);
				if (!(substr( $line2, 0, 11 ) === "Second Life")) {
					$editedtext = $editedtext . $line . "\r\n";
				}  
			}
			$text = $editedtext;
		}
		
		if ($objects == 'Yes'){
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$removeline = false;
				$line2 = stripTimeStamp($line);
				foreach ($objectsToRemove as $toremove){
					if (substr( $line2, 0, strlen($toremove) ) === $toremove){
						$removeline = true;
					}
				}
				if (!$removeline) $editedtext = $editedtext . $line . "\r\n";
			}
			$text = $editedtext;
		}
	  	  
		if ($linegap == 'Yes') {
			$editedtext = "";
		  
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
				$editedtext = $editedtext . $line . "\r\n" ."\r\n";
			} 
		  
			$text = $editedtext;
		}
	}
}
?>