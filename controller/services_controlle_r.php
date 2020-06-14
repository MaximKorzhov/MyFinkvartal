<?php
	include "functions.php";
	include "model/services_model.php";
	
	class ServicesController
	{
		public $displayed;
		public $controller;
		public $view;
		public $params;

		public function __construct($params)
	    {
       		 $this->controller = new ApplicationModel();
       		 $this->view = new BaseView();
       		 $this->displayed = new BaseView();
       		 $this->params = $params;
	    }

            public function create_order()
            {
        	$this->controller->save_order($this->params);
            }

            public function services_displayed()
            {
	        $displayed = $this->displayed;
	        echo $displayed->getPage(['{!current_services!}', '{!contentArea!}', '{!footerContent!}'],
			['class="current"',$displayed->getContent('view/contentArea_services'), $displayed->getFooter()],
                                        $displayed->getLayout()); 				
            }
	}        
