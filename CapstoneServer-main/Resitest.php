<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$con = mysqli_connect("13.125.205.121", "hyun", "hyun1234", "capstone");
	//mysqli_close();

	$id = $_POST["id"];
	$pw = $_POST["pw"];

	$statement = mysqli_prepare($con, "insert into user values (?,?)");
	mysqli_stmt_bind_param($statement, "ss", $id, $pw);
	mysqli_stmt_execute($statement);

	$response = array();
	$response["success"] = true;

	echo json_encode($response);

?>