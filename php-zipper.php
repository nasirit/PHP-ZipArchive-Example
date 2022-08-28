<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP ZipArchive Example 2</title>
</head>

<body>
<center>
	<form action="" method="post">
		zip file Name: <br>
		<input name="zipfile" value="test.zip"><br><br>
		Location: <br>
		<input name="location" value="location" ><br><br>
		
		<input type="submit" name="do" value="zip" > | 
		<input type="submit" name="do" value="extract" >
	</form>

<?php 

if(!empty($_REQUEST['do'])){
	if($_REQUEST['do'] == 'zip'){
		// Coded by NASIR IT (www.nasirit.com)

		echo "<h3>Adding files...</h3>";
		$zipfile = "$_REQUEST[zipfile]";
		$location = "$_REQUEST[location]";
		
		$zip = new ZipArchive;
		$zip->open($zipfile, ZipArchive::CREATE);
		if(is_file($location)) $zip->addFile($location);
		elseif(is_dir($location))
		for($i=0; $i<100; $i++){ // highest folder depth
		    if($location != '.' OR $location != '..')
		    foreach (glob("$location/*") as $file){
		        if(is_file($file)) $zip->addFile($file);
		        else $location = $file;
		    }
		}
		$zip->close();
		
		echo "<h2>Done</h2>";

	}elseif($_REQUEST['do'] == 'extract'){
		
		echo "<h3>Extracting files...</h3>";
		$zipfile = "$_REQUEST[zipfile]";
		$location = "$_REQUEST[location]";
		
		$zip = new ZipArchive();
		$zip->open($zipfile);
		$zip->extractTo($location);
		$zip->close();
		
		echo "<h2>Done</h2>";
	}

} 

?>
</center>
</body>

</html>
