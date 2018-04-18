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
		"user" => (object)array("user_id" => 5, "name" => "Random Data", "rin" => 661392198, "rcsid" => "osmano", "role" => 1, "email" => "1@3.com", "in_group" => "yes", "reported" => "yes"),
		"group" => (object)array("group_id" => 1, "name" => "From Q", "current_num" => 10, "desired_num" => 0, 
			"group_members" => (object)array("member1" => "Random1", "member2" => "Random2", "member3" => "Random3", "member4" => "Random4", "member5" => "Random5", "member6" => "Random6", "member7" => "Random7", "member8" => "Random8", "member9" => "Random9"),
			"group_answers" => (object)array("q1" => "Dust", "q2" => "smokeno", "q3" => "bedtime12", "q4" => "night", "q5" => "petsno", "q6" => 1, "q7" => 5, "q8" => 1, "q9" => 3, "q10" => 3, "q11" => 3, "q12" => 2, "q13" => "friendssome", "q14" => "partiesnever")
		),
		"profile" => (object)array("age" => 21, "year" => 2018, "budget" => 500, "gender" => "Male", "coed" => "no", "on/off campus" => "off campus"),
		"answers" => (object)array("q1" => "Dust", "q2" => "smokeno", "q3" => "bedtime12", "q4" => "night", "q5" => "petsno", "q6" => 1, "q7" => 5, "q8" => 1, "q9" => 3, "q10" => 3, "q11" => 3, "q12" => 2, "q13" => "friendssome", "q14" => "partiesnever")
	);

	$collection->insert($document);
	echo "Document inserted succsessfully";
?>