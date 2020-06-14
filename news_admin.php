<?php
	
    include "controller/NewsAdminController.php";
    $givenews = new NewsAdminController();	
    $givenews->run();