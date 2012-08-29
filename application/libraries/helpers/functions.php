<?php 
	
	/* This is the functions file. Similar to the wordpress functions file */

	function encryption_hard($word, $salt = 'iwantcady'){
	 	$string = $salt . $word;
	 	return sha1($string);
	 }
?>