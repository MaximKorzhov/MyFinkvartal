<?php
	include "functions.php";

   	echo getPage(['{!current_services!}', '{!contentArea!}', '{!footerContent!}'],
		 ['class="current"', getContent('view/contentArea_services'), getFooter()], 
			 getLayout());
?>
