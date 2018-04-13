<?php
	// connect to mongodb
	$m = new MongoClient();
	echo "Connection to database successfully";

	// select a database
	$db = $m->formq;
	echo "Database 'formq' selected";
	echo "<br>";
	$collection = $db->createCollection("users");
	echo "Collection 'users' created succsessfully";
	echo "<br>";

	//create document
	$document = array(
		"user" => array("user_id" => 2, "name" => "Omer Osman", "rin" => 661392198, "rcsid" => "osmano", "role" => 1, "email" => "1@3.com"),
		"group" => array("group_id" => 2, "name" => "From Q", "current_num" => 2, "desired_num" => 4),
		"profile" => array("age" => 21, "year" => 2018, "budget" => 500, "gender" => "Male", "coed" => "no", "on/off campus" => "off campus"),
		"answers" => array("q1" => "Dust", "q2" => "smokeno", "q3" => "bedtime12", "q4" => "night", "q5" => "petsno", "q6" => 1, "q7" => 5, "q8" => 1, "q9" => 3, "q10" => 3, "q11" => 3, "q12" => 2, "q13" => "friendssome", "q14" => "partiesnever")
	);

	$collection->insert($document);
	echo "Document inserted succsessfully";
?>