<?php
    include "functions.php";

    echo getPage(['{!contentArea!}', '{!footerContent!}'], [getContent('view/contentArea_form'), getFooter()], getLayout());
