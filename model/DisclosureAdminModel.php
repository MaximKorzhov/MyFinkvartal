<?php
                                
    include "BaseModel.php";    

    class DisclosureAdminModel extends BaseModel
    {	
        //public $tablename = 'news';

	public function __construct()
	{
            parent::__construct();		
	}

	public function getDisclosureAdmin()
	{
            $this->getStatusAdmin();
            return $this->getRowsDisclosure();
	}	
    }