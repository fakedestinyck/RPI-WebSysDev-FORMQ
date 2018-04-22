function avg_arr_val(arr){
	//this function takes an array of ints and returns the average 
	var sum = 0; 
	for (var i = 0; i < arr.length; ++i){
		sum += arr[i]; 
	}
	return sum/arr.length;
}

function get_group_vals(my_group_id, my_pref){
	/* 
	given the id and the preferences of the user, 
	return an array of group values 
	*/
	q1_vals = []; q2_vals = []; q3_vals = []; 
	q4_vals = []; q5_vals = []; q6_vals = []; 
	q7_vals = []; q8_vals = []; q9_vals = []; 
	q10_vals = []; q11_vals = []; 
	//query to get list of people w/ same my_group_id 
	 /* group_members = query to get people w/ same my_group_id*/
	$.ajax({
		url: 'api/storedata.php', 
		type: 'post'; 
		data: {'group_id': my_group_id}, 
		success: function(data){
			console.log(data); //to communicate. 
			var group_members = []; 
			for(var i = 0; i < data.length; ++i){
				if(data[i]['group']['group_id'] == my_group_id){
					group_members.append(data[i]['answers']); 
				}
			}
			console.log(group_members); 
			//now have to move everything here. 
			for(var i = 0; i < group_members.length; ++i){
				if(my_pref[0]){
					smoke_val = group_members[i]['q2']; 
					if(smoke_val == "smokeyes"){ //smokes 
						q1_vals.append(5);
					} else{	
						q1_vals.append(1); //doesn't smoke 
					}
					 
				}
				if(my_pref[1]){
					bedtime_val = group_members[i]['q3']; 
					if(bedtime_val == "bedtime8"){
						q2_vals.append(0.45); 
					}
					else if(bedtime_val == "bedtime9"){
						q2_vals.append(0.9); 
					}
					else if(bedtime_val == "bedtime10"){
						q2_vals.append(1.35); 
					}
					else if(bedtime_val == "bedtime11"){
						q2_vals.append(1.8); 
					}
					else if(bedtime_val == "bedtime12"){
						q2_vals.append(2.25); 
					}
					else if(bedtime_val == "bedtime1"){
						q2_vals.append(2.7); 
					}
					else if(bedtime_val == "bedtime2"){
						q2_vals.append(3.15); 
					}
					else if(bedtime_val == "bedtime3"){
						q2_vals.append(3.6); 
					}
					else if(bedtime_val == "bedtime4"){
						q2_vals.append(4.05); 
					}
					else if(bedtime_val == "bedtime5"){
						q2_vals.append(4.5); 
					}
					else{
						q2_vals.append(4.95);
					}
				}
				if(my_pref[2]){
					sleep_pref = group_members[i]['q4']; 
					if(sleep_pref == "morning"){
						q3_vals.append(1); 
					}
					else if(sleep_pref == "night"){
						q3_vals.append(5); 
					} else{
						q3_vals.append(3); 
					}
				}
				if(my_pref[3]){
					//pets one 
					pets_ans = group_members[i]['q5'];
					if(pets_ans == "petsno"){
						q4_vals.append(1); 
					}
					else{
						q4_vals.append(5); 
					}
				}
				if(my_pref[4]){ //schedule 
					q5_vals.append(group_members[i]['q6']); 
				}
				if(my_pref[5]){ //handle a mess 
					q6_vals.append(group_members[i]['q7']); 
				}
				if(my_pref[6]){ //how much do you drink? 
					q7_vals.append(group_members[i]['q8']); 
				}
				if(my_pref[7]){ //party 
					q8_vals.append(group_members[i]['q9']); 
				}
				if(my_pref[8]){ //TV watching 
					q9_vals.append(group_members[i]['q10']);
				}
				if(my_pref[9]){ //how much of a gamer 
					q10_vals.append(group_members[i]['q11']);
				}
				if(my_pref[10]){ //loud_music sensitivity 
					q11_vals.append(group_members[i]['q12']);
				}
			}
			//now average all the vals 
			group_vals = [];
			if(q1_vals.length != 0){
				group_vals.append(avg_arr_val(q1_vals));
			}
			if(q2_vals.length != 0){
				group_vals.append(avg_arr_val(q2_vals));
			}
			if(q3_vals.length != 0){
				group_vals.append(avg_arr_val(q3_vals));
			}
			if(q4_vals.length != 0){
				group_vals.append(avg_arr_val(q4_vals));
			}
			if(q5_vals.length != 0){
				group_vals.append(avg_arr_val(q5_vals));
			}
			if(q6_vals.length != 0){
				group_vals.append(avg_arr_val(q6_vals));
			}
			if(q7_vals.length != 0){
				group_vals.append(avg_arr_val(q7_vals));
			}
			if(q8_vals.length != 0){
				group_vals.append(avg_arr_val(q8_vals));
			}
			if(q9_vals.length != 0){
				group_vals.append(avg_arr_val(q9_vals));
			}
			if(q10_vals.length != 0){
				group_vals.append(avg_arr_val(q10_vals));
			}
			if(q11_vals.length != 0){
				group_vals.append(avg_arr_val(q11_vals));
			}
			return group_vals;
		}, 
		error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                alert("An error occur: "+err+".\nPlease try again later.");
                location.reload();
        }
	}); 
	return group_vals; //needed? 
}

function euclid_distance(group1, group2){
	//this function takes the group_vals of 2 groups 
	//and returns the euclidean distance between them
	//precondition - group1.length == group2.length
	if(group1.length != group2.length){
		throw "group1 and group2 aren't the same length!"; 
	}
	var euclid = []; 
	var num = 0; 
	for(var i = 0; i < group1.length; ++i){
		num = group1[i] - group2[i]; 
		num = num * num; 
		euclid.append(num); 
	}
	var sum = 0;
	for(var j = 0; j < euclid.length; ++i){
		sum = sum + euclid[j]; 
	}
	return Math.sqrt(sum); //euclids = sqrt((u_1 - v_1)^2 + ... + (u_n - v_n)^2)
}

function match_similar(id, pref){
	/*  finds the Euclidean distance of groups 
	id is the group id of the person doing the matching 
	pref is an array of boolean sent by the user searching when hitting the button to match. if the 
	 bool is True, that means include the value. if the bool is false, don't take 
	the value into account. this means, if the checkmark is checked, the value should be set to false
	1 is low, 5 is high 
	1st bool --> Smoke (2 options)
	2nd bool --> bedtime (6 options)
	3rd bool --> morning/night (3 options)
	4th bool --> pets (2 options)
	5th bool --> schedule strictness (1-5)
	6th bool --> handle a mess (1-5)
	7th bool --> alcohol (1-5)
	8th bool --> party (1-5)
	9th bool --> TV (1-5)
	10th bool --> gamer (1-5)
	11th bool --> music sensitivity (1-5)
	*/
	var my_group_vals = get_group_vals(id, pref); 
	//var potential_matches = query for all groups w/ same onOffcampus value and 
	//have same # of group members as group with id or less. returns ids
	$.ajax({
		url: 'api/storedata.php', 
		type: 'post'; 
		data: {'group_id': my_group_id}, 
		success: function(data){
			var all_group_ids = []; //for all the group_ids 
			var potential_matches = []; //hoo boy 
			for(var i = 0; i < data.length; ++i){
				if(my_group_id != data[i]['group']['group_id']){ //might need a thing to check size later IMPORTANT
					all_group_ids.append(data[i]['group']['group_id']); 
				}
			} 
			//now to make them unique 
			var unique_group_ids = all_group_ids.filter(function(item, i, ar){ return ar.indexOf(item) === i; });
/*			var people_in_groups = []; //an array of arrays of people objects w/ same group ID 
			var temp = []; //meant to hold people
			for(var i = 0; i < unique_group_ids.length; ++i){
				temp = []; 
				for(var j = 0; j < data.length; ++j){
					if(unique_group_ids[i] == data[i]['group']['group_id']){
						temp.append(data[i]);
					}
				}
				people_in_groups.append([unique_group_ids[i], temp]); 
			} MIGHT NOT NEED THIS, AS get_group_vals gets the stuff anyway */
			//okay, should now have all the people who are in individual groups. 
			var group_ids_with_scores = [];
			for(var i = 0; i < unique_group_ids.length; ++i){
				var id_vals = get_group_vals(unique_group_ids[i], my_pref); 
				group_ids_with_scores.append([unique_group_ids[i], id_vals]); 
			} 
			//okay, should have all the group_vals now.
			//now get the distances 
			try{
				var with_euclid = []; 
				for(var i = 0; i < group_ids_with_scores.length; ++i){
					with_euclid.append([euclid_distance(my_group_vals, group_ids_with_scores[i][1]), group_ids_with_scores[0]]);
				}

			} catch(e){
				console.log(e);
			}
			with_euclid.sort(function(a, b){return a[0] - b[0]});


			var best_matches = []; //array of group ids
			for(var i = 0; i < with_euclid.length; ++i){
				best_matches.append(with_euclid[i][1]);
			}

			return best_matches;
		}, 
		error function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                alert("An error occur: "+err+".\nPlease try again later.");
                location.reload();
        }
	}); 
	/*var potential_matches = []; 
	var with_scores = []; 
	for(var i = 0; i < potential_matches.length; ++i){
		with_scores.append([potential_matches[i], get_group_vals(potential_matches[i], pref)]); 
	}
	//now thal all the potential matches have their scores, get the Euclid distances 
	try{
		var with_euclid = [] 
		for (var i = 0; i < with_scores.length; ++i){
			with_euclid.append([euclid_distance(my_group_vals, with_scores[i][1]), with_scores[0]]); 
		}
	} catch(e){ //to communicate if something goes wrong 
		console.log(e); 
	}
	//now should have all the Euclid distances 
	//the lowest ones have the best match
	with_euclid.sort(function(a, b){return a[0] - b[0]}); 
	//should be sorted by ascending euclid val, so best match first 
	//just isolate group_ids 
	var best_matches = []; //array of group ids
	for(var i = 0; i < with_euclid.length; ++i){
		best_matches.append(with_euclid[i][1]);
	}*/

	return best_matches; //might still need? DEBUGGING IF NOT 
}