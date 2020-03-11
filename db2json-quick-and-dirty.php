<?php
try {
	$db = new \PDO("pgsql:host=localhost;port=5433;dbname=exampledb;user=exampleuser;password=0v7IKQv3Owl6a6GL89UM");
	
	$resultSet = $db->query('SELECT * FROM public."Vehicles"');
	
	if ($resultSet == false) {
		header('Content-type: text/plain;charset=utf-8');
		http_response_code(503);
		echo "Wrong query.";
	} else {
		$json = json_encode($resultSet->fetchAll(\PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
		header('Content-type: application/json;charset=utf-8');
		http_response_code(200);
		echo $json;
	}
	
	$db = null;
	$resultSet = null;
	
} catch (\PDOException $e) {
	header('Content-type: text/plain;charset=latin');
	http_response_code(503);
	echo "Error!: " . $e->getMessage();
}
?>