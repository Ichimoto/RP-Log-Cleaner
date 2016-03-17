<?php
include 'functions.php';
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
		<h2>ALPHA VERSION <a href="/changelog.html">0.4</a><br></h2>

		<p>Born out of the laziness of one Denenthorn Masukami this tool is designed to quickly and easily clean Role Play Logs,<br>designed for use on the Second Life sim Toxian City but slowly developing to become a SL wide clener working with a range of combact systems</p>
		<form method="post">
			<?=$error['error']?>
			Combact System Used:<select name="cs">
				<option value="DCS">DCS2</option>
				<option value="GM">GM Meter</option>
				<option value="CCS">CCS</option>
			</select>
			<p><label for="text">RP Text to Clean:<br></label><textarea class="form-control" type="text" id="text" name="text" rows="10"><?=$text?></textarea></p>
			<div class="row">
			  <div class="col-md-4">
				  <input type="checkbox" name="line" value="Yes" checked> Line Break Posts<br>
				  <input type="checkbox" name="dcs" value="Yes" checked> Filter Combact System spam<br>
				  <input type="checkbox" name="ooc" value="Yes" checked> Remove OOC posts<br>
			  </div>
			  <div class="col-md-4">
				  <input type="checkbox" name="notimestamp" value="Yes" checked> Remove lines with no timestamp<br>
				  <input type="checkbox" name="simenter" value="Yes" checked> Remove sim leave/enter messages<br>
				  <input type="checkbox" name="landstream" value="Yes" checked> Remove Land Stream messages<br>
			  </div>
			  <div class="col-md-4">
				  <input type="checkbox" name="online" value="Yes" checked> Remove Online/Offline posts<br>
				  
			  </div>
			</div>
			
			<p><input type="submit" name="submit" value="Clean Text" /></p>
		</form>

		<p>Built by Lyrza (zp.lyric) if you find a bug or have a feature request please email: <a href="mailto:support@rplogcleaner.com" target="_top">support@rplogcleaner.com</a>
		</div>
	
	</p>

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
