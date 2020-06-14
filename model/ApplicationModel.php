<?php
include "BaseModel.php";

class ApplicationModel extends BaseModel
{
	public $tablename = 'application';
    
    //Занести заявку в базу
	function save_order($params)
	{	
		if($params['phone'] != null && $params['text'] != null && $params['address'] != null)
		{
			$sql="INSERT INTO {$this->tablename} (date,name,address,phone,email,text) values (:date,:name,:address,:phone,:email,:text)";
			$this->query($sql, $params);
		}
   	 	else // а вот это модель не должна решать, ей незачем знать ни о чем, кроме базы
		{
			header("Location: http://finkvartal.org.ru/no_data.php");	
			exit;
		}
	}
}

?>