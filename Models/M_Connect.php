<?php

class M_Connect
{
	private $host = "localhost",
	$username = "root",
	$pass = "",
	$db = "ukk_4_fahmi";
  
	public $connect;

	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->username, $this->pass, $this->db);

		if ($this->connect)
		{
			return $this->connect;
		}else{
			echo mysqli_connect_error();
		}
	}
}