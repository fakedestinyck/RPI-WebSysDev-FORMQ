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
        "user" => array("user_id" => 10, "name" => "John Lemon", "rin" => 123456789, "rcsid" => "lemonj", "role" => 2, "email" => "abdussamad100@gmail.com", "in_group" => "yes", "reported" => "no", "requested_group"=>-1),
        "group" => array("group_id" => 10, "name" => "", "current_num" => 2, "desired_num" => 4,
            "group_members" => array("member1" => "lemonj", "member2" => "purpp", "member3" => "", "member4" => "", "member5" => "", "member6" => "", "member7" => "", "member8" => "", "member9" => "", "member10" => ""),
            "group_answers" => array("q1" => "", "q2" => "", "q3" => "", "q4" => "", "q5" => "", "q6" => 0, "q7" => 0, "q8" => 0, "q9" => 0, "q10" => 0, "q11" => 0, "q12" => 0, "notes" => "")
        ),
        "profile" => array("age" => 20, "year" => "junior", "budget" => 777, "number" => 4, "gender" => "Trans", "coed" => "coedyes", "on/off campus" => "off campus"),
        "answers" => array("q1" => "Air", "q2" => "smokeno", "q3" => "bedtime12", "q4" => "Morning", "q5" => "petsyes", "q6" => 3, "q7" => 2, "q8" => 1, "q9" => 3, "q10" => 2, "q11" => 1, "q12" => 3, "notes" => "I like plyaing vdieo gaems!")
    );

	$collection->insert($document);
    $document = array(
        "user" => array("user_id" => 11, "name" => "Paul Purple", "rin" => 123456789, "rcsid" => "purpp", "role" => 2, "email" => "abdussamad100@gmail.com", "in_group" => "yes", "reported" => "no", "requested_group"=>-1),
        "group" => array("group_id" => 10, "name" => "", "current_num" => 2, "desired_num" => 4,
            "group_members" => array("member1" => "lemonj", "member2" => "purpp", "member3" => "", "member4" => "", "member5" => "", "member6" => "", "member7" => "", "member8" => "", "member9" => "", "member10" => ""),
            "group_answers" => array("q1" => "", "q2" => "", "q3" => "", "q4" => "", "q5" => "", "q6" => 0, "q7" => 0, "q8" => 0, "q9" => 0, "q10" => 0, "q11" => 0, "q12" => 0, "notes" => "")
        ),
        "profile" => array("age" => 21, "year" => "senior", "budget" => 888, "number" => 4, "gender" => "Male to Female", "coed" => "coedyes", "on/off campus" => "off campus"),
        "answers" => array("q1" => "Carbon dioxide", "q2" => "smokeyes", "q3" => "bedtime2", "q4" => "No Preference", "q5" => "petsyes", "q6" => 2, "q7" => 5, "q8" => 3, "q9" => 2, "q10" => 2, "q11" => 3, "q12" => 4, "notes" => "I love adfawdfawdfawdfawd!")
    );

    $collection->insert($document);
	echo "Document inserted succsessfully";
?>