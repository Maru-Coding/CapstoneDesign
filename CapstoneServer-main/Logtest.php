<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$con = mysqli_connect("13.125.205.121", "hyun", "hyun1234", "capstone");
	//mysqli_close();
	if (mysqli_connect_errno())
	{

		echo "DB 연결에 실패했습니다 " . mysqli_connect_error();
	}

	mysqli_query($con, 'SET NAMES utf8');

	$id = $_POST["id"];
	$pw = $_POST["pw"];

	$statement = mysqli_prepare($con, "select * from user where id = ? AND pw = ?");
	mysqli_stmt_bind_param($statement, "ss", $id, $pw);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $id, $pw);

	$response = array();
	$response["success"] = false;

	while(mysqli_stmt_fetch($statement)) 
	{
		$response["success"] = true;
		$response["id"] = $id;
		$response["pw"] = $pw;
	}

	echo json_encode($response);

?>