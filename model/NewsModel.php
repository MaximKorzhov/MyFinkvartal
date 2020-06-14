<?php
                                
include "BaseModel.php";
//include "functions.php";

class NewsModel extends BaseModel
{	
//	public $tablename = 'news';

	public function __construct()
	{
            parent::__construct();		
	}

	public function getNews()
	{
            return $this->getAllRows();
	}
	public function getDisclosure()
	{
            return $this->getRows_id();
	}
}
