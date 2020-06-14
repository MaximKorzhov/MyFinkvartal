<?php

include "Config.php";

abstract class BaseModel
{
	public $connection;
	public $tablename;

	function __construct()
	{	
            $this->connection = new PDO('mysql:host=' . Config::$host . ';dbname=' . Config::$dbname . ";charset=utf8", Config::$login, Config::$pass);
            $this->connection->exec('SET NAMES utf8 COLLATE utf8_unicode_ci');
	}

/*	public function query($sql, array $params = null)
	{
		$sth = $this->connection->prepare($sql);

		if ($params)
		{
			foreach ($params as $k => $v)
				$sth->bindValue(":$k", $v);
		}

		$sth->execute();

		return $sth;
	}*/

	public function getAllRows()
	{		
		$sqln = $this->connection->query('SELECT * FROM news');
//		$sql = 'select * from news'; //. $this->tablename;
//		return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
		return $sqln->fetchAll(PDO::FETCH_OBJ);
	}
	public function getRows_id()
	{	
            $sqld = $this->connection->query('SELECT * FROM disclosure WHERE id IN (47,64)');
            //return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
            return $sqld->fetchAll(PDO::FETCH_OBJ);
	}
        public function getAuthenticity_user()
        {
            $sqln = $this->connection->query('SELECT * FROM bez_reg WHERE login = :email');                         
            return $sqln->fetchAll(PDO::FETCH_ASSOC);                                    
        }
        public function getStatusAdmin()
        {
            //echo "Non";exit;
            $status_admin = 10;
	
            session_start();

            if ($_SESSION['status'] != $status_admin)	

            {	
		header("Location: http://finkvartal.org.ru/auth_form.php");
		exit;
            }
        }
        public function getRowsDisclosure()
        {
            
            $sqln = $this->connection->query('SELECT * FROM disclosure');            
            return $sqln->fetchAll(PDO::FETCH_OBJ);
            
        }
}