<?php
	$main = file_get_contents('view/template');		
	$main = str_replace('{!date!}', date('Y'), $main);
?>
