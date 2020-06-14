<?php
                                
    include "BaseModel.php";    

    class DisclosureModel extends BaseModel
    {	
        //public $tablename = 'news';

	public function __construct()
	{
            parent::__construct();		
	}

	public function getDisclosure()
	{
            return $this->getRowsDisclosure();
	}	
    }