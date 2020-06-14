<?php
    include "BaseView.php";
	                           	
    class About_asView extends BaseView
    {
	public function __construct()
	{
            parent::__construct();
	}
						
	public function render()
	{                        
            echo $this->getPage(['{!current_about!}', '{!contentArea!}', '{!footerContent!}'], ['class="current"', 
            $this->getContent('view/contentArea_about_as'), 
            $this->getFooter()], $this->getLayout());
	}
    }	
