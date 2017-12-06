<?php // config.php :: Low-level app/database variables.

		$server = "localhost";                   //MySQL Host, usually Localhost
		$user = "";                         //MySQL Username
	    $pass = "";              //MySQL Password for above user
		$name = "";                        //MySQL Database name
		$prefix = "dn";                          //Table prefix.. Being with a letter, no more than 3 letters recommended
		
		$link = new mysqli($server,$user,$pass,$name);
		
	
		
		
?>
