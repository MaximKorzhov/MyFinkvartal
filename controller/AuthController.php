<?php
    include "view/AuthView.php";
    include "model/AuthModel.php";
    include "BaseController.php";

    class AuthController //extends BaseController
    {	
        public $model;
	public function __construct()
	{
            
	}					

	public function run()		
	{
            $this->model = new AuthModel();           
	}
    }	