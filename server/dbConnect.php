<?php
	function dbConnect()
	{
		$sql = mysqli_connect('localhost' ,'root','tsus2312','login');
		return $sql;
	}
?>