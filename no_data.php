<?php
	include "functions.php";

	$content = getContent('view/contentArea_no_data');	
	echo getPage(['{!contentArea!}', '{!footerContent!}'], [$content, getFooter()], getLayout());
?>