<?php
	include "functions.php";
	$content = getContent('view/contentArea_thank_you');
	echo getPage(['{!contentArea!}', '{!footerContent!}'], [$content, getFooter()], getLayout());
?>
