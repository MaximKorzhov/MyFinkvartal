<?php
    include "BaseView.php";
	                           	
    class IndexView extends BaseView
    {
	public function __construct()
	{
            parent::__construct();
	}
						
	public function render()
	{
            echo $this->getPage(['{!contentArea!}', '{!footerContent!}'], 
            [$this->getContent('view/contentArea_index'), $this->getFooter()],
            $this->getLayout());
	}
    }	
