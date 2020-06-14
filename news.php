<?php

    include "controller/NewsController.php";
    $givenews = new NewsController();	
    $givenews->run();