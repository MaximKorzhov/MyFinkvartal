<?php
                                
include "BaseModel.php";

class ContactsAdminModel extends BaseModel
{	
    public function __construct()
    {
       parent::__construct();		
    }

	public function getAdmin()
	{
            return $this->getStatusAdmin();
	}
	
}
