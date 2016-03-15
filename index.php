<?php
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
	  	  
	  if ($dcs == 'Yes') {
		  $editedtext = "";
		  
		  foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
			  	$line2 = substr($line, 8);
			 	if (!(substr( $line2, 0, 3 ) === "DCS")) {
			 		$editedtext = $editedtext . $line . "\r\n";
			 	}  
		  }
		  $text = $editedtext;
	  }
	  
	  if ($ooc == 'Yes') {
		  $editedtext = "";
		  
		  foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
			  	$line2 = substr($line, 8);
			 	if (!(substr( $line2, 0, 2 ) === "((") && !(substr( $line2, -2 ) === "))")) {
			 		$editedtext = $editedtext . $line . "\r\n";
			 	}  
		  }
		  $text = $editedtext;
	  }
	  
	  if ($online == 'Yes') {
		  $editedtext = "";
		  
		  foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
			  	$check = substr($line, -7);
			 	 
				if ($check !== "ffline." && $check !== "online."){
					$editedtext = $editedtext . $line . "\r\n";
				}
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

        "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>RP Log Cleaner</title>
</head>
<body>
	
	<a href="https://github.com/zacthespack/RP-Log-Cleaner"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
	
	ALPHA VERSION <a href="/changelog.html">0.2</a><br>

	<p>Born out of the laziness of one Denenthorn Masukami this tool is designed to quickly and easily clean Role Play Logs, currently designed for use on the Second Life sim Toxian City</p>
	<form method="post">
 	   <?=$error['error']?>
  	 	<p><label for="text">RP Text to Clean:<br></label><textarea type="text" id="text" name="text"><?=$text?></textarea></p>
  		<input type="checkbox" name="line" value="Yes" checked> Line Break Posts
  	  	<input type="checkbox" name="dcs" value="Yes" checked> Filter DCS spam
  	  	<input type="checkbox" name="ooc" value="Yes" checked> Remove OOC posts
  	  	<input type="checkbox" name="online" value="Yes" checked> Remove Online/Offline posts
  	  	<p><input type="submit" name="submit" value="Clean Text" /></p>
	</form>

	<p>Built by Lyrza (zp.lyric) if you find a bug or have a feature request please IM me on skype or in SL</p>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75168411-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>



