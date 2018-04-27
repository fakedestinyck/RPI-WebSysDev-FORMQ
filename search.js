// JavaScript for the matches page

function avg_arr_val(arr){
    //this function takes an array of ints and returns the average
    var sum = 0;
    for (var i = 0; i < arr.length; ++i){
        sum += arr[i];
    }
    return sum/arr.length;
}

function get_group_vals(my_group_id, my_pref, data){
    /*
     given the id and the preferences of the user,
     return an array of group values
     */
    var q1_vals = []; var q2_vals = []; var q3_vals = [];
    var q4_vals = []; var q5_vals = []; var q6_vals = [];
    var q7_vals = []; var q8_vals = []; var q9_vals = [];
    var q10_vals = []; var q11_vals = [];
    //query to get list of people w/ same my_group_id
    /* group_members = query to get people w/ same my_group_id*/
    console.log(data); //to communicate.
    var group_members = [];
    for(var i = 0; i < data.length; ++i){
        if(data[i]['group']['group_id'] == my_group_id){
            group_members.push(data[i]['answers']);
        }
    }
    console.log(group_members);
    //now have to move everything here.
    for(var i = 0; i < group_members.length; ++i){
        console.log("inside get_group_vals,group_members.lenght is " + group_members.length);
        if(my_pref[0]){
            var smoke_val = group_members[i]['q2'];
            if(smoke_val == "smokeyes"){ //smokes
                q1_vals.push(5);
            } else{
                q1_vals.push(1); //doesn't smoke
            }

        }
        if(my_pref[1]){
            var bedtime_val = group_members[i]['q3'];
            if(bedtime_val == "bedtime8"){
                q2_vals.push(0.45);
            }
            else if(bedtime_val == "bedtime9"){
                q2_vals.push(0.9);
            }
            else if(bedtime_val == "bedtime10"){
                q2_vals.push(1.35);
            }
            else if(bedtime_val == "bedtime11"){
                q2_vals.push(1.8);
            }
            else if(bedtime_val == "bedtime12"){
                q2_vals.push(2.25);
            }
            else if(bedtime_val == "bedtime1"){
                q2_vals.push(2.7);
            }
            else if(bedtime_val == "bedtime2"){
                q2_vals.push(3.15);
            }
            else if(bedtime_val == "bedtime3"){
                q2_vals.push(3.6);
            }
            else if(bedtime_val == "bedtime4"){
                q2_vals.push(4.05);
            }
            else if(bedtime_val == "bedtime5"){
                q2_vals.push(4.5);
            }
            else{
                q2_vals.push(4.95);
            }
        }
        if(my_pref[2]){
            var sleep_pref = group_members[i]['q4'];
            if(sleep_pref == "morning"){
                q3_vals.push(1);
            }
            else if(sleep_pref == "night"){
                q3_vals.push(5);
            } else{
                q3_vals.push(3);
            }
        }
        if(my_pref[3]){
            //pets one
            var pets_ans = group_members[i]['q5'];
            if(pets_ans == "petsno"){
                q4_vals.push(1);
            }
            else{
                q4_vals.push(5);
            }
        }
        if(my_pref[4]){ //schedule
            q5_vals.push(group_members[i]['q6']);
        }
        if(my_pref[5]){ //handle a mess
            q6_vals.push(group_members[i]['q7']);
        }
        if(my_pref[6]){ //how much do you drink?
            q7_vals.push(group_members[i]['q8']);
        }
        if(my_pref[7]){ //party
            q8_vals.push(group_members[i]['q9']);
        }
        if(my_pref[8]){ //TV watching
            q9_vals.push(group_members[i]['q10']);
        }
        if(my_pref[9]){ //how much of a gamer
            q10_vals.push(group_members[i]['q11']);
        }
        if(my_pref[10]){ //loud_music sensitivity
            q11_vals.push(group_members[i]['q12']);
        }
    }
    //now average all the vals
    var group_vals = [];
    if(q1_vals.length != 0){
        group_vals.push(avg_arr_val(q1_vals));
    }
    if(q2_vals.length != 0){
        group_vals.push(avg_arr_val(q2_vals));
    }
    if(q3_vals.length != 0){
        group_vals.push(avg_arr_val(q3_vals));
    }
    if(q4_vals.length != 0){
        group_vals.push(avg_arr_val(q4_vals));
    }
    if(q5_vals.length != 0){
        group_vals.push(avg_arr_val(q5_vals));
    }
    if(q6_vals.length != 0){
        group_vals.push(avg_arr_val(q6_vals));
    }
    if(q7_vals.length != 0){
        group_vals.push(avg_arr_val(q7_vals));
    }
    if(q8_vals.length != 0){
        group_vals.push(avg_arr_val(q8_vals));
    }
    if(q9_vals.length != 0){
        group_vals.push(avg_arr_val(q9_vals));
    }
    if(q10_vals.length != 0){
        group_vals.push(avg_arr_val(q10_vals));
    }
    if(q11_vals.length != 0){
        group_vals.push(avg_arr_val(q11_vals));
    }
    console.log("end get_group_vals");
    return group_vals;
    //return group_vals; //needed?
}

function euclid_distance(group1, group2){
    //this function takes the group_vals of 2 groups
    //and returns the euclidean distance between them
    //precondition - group1.length == group2.length
    var euclid = [];
    var num = 0;
    console.log("group1: " + group1);
    console.log("group2: " + group2);
    for(var i = 0; i < group1.length; ++i){
        num = group1[i] - group2[i];
        num = num * num;
        euclid.push(num);
    }
    console.log("euclid_distance foor loop 1");
    var sum = 0;
    console.log(euclid);
    for(var j = 0; j < euclid.length; ++j){
        sum = sum + euclid[j];
    }
    console.log("euclid_distance foor loop q");
    return Math.sqrt(sum); //euclids = sqrt((u_1 - v_1)^2 + ... + (u_n - v_n)^2)
}

function match_similar(my_group_id, pref){
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
    //var my_group_vals = get_group_vals(my_group_id, pref);
    //console.log(my_group_id);
    //console.log(pref);
    //var potential_matches = query for all groups w/ same onOffcampus value and
    //have same # of group members as group with id or less. returns ids
    $.ajax({
        url: 'api/getallusers.php',
        type: 'post',
        data: {'group_id': my_group_id, 'action': 'action'},
        success: function(data){
            data = data.users;
            console.log(data);

            var my_group_vals = get_group_vals(my_group_id, pref, data);
            console.log(my_group_id);
            console.log(pref);
            console.log("after get_group_vaks" + my_group_vals);

            var all_group_ids = []; //for all the group_ids
            var potential_matches = []; //hoo boy
            for(var i = 0; i < data.length; ++i){

                if(my_group_id != data[i]['group']['group_id']){ //might need a thing to check size later IMPORTANT
                    all_group_ids.push(data[i]['group']['group_id']);
                }
            }
            console.log("end for loops");
            //now to make them unique
            var unique_group_ids = all_group_ids.filter(function(item, i, ar){ return ar.indexOf(item) === i; });
            /*			var people_in_groups = []; //an array of arrays of people objects w/ same group ID
             var temp = []; //meant to hold people
             for(var i = 0; i < unique_group_ids.length; ++i){
             temp = [];
             for(var j = 0; j < data.length; ++j){
             if(unique_group_ids[i] == data[i]['group']['group_id']){
             temp.push(data[i]);
             }
             }
             people_in_groups.push([unique_group_ids[i], temp]);
             } MIGHT NOT NEED THIS, AS get_group_vals gets the stuff anyway */
            //okay, should now have all the people who are in individual groups.
            var group_ids_with_scores = [];
            for(var i = 0; i < unique_group_ids.length; ++i){
                var id_vals = get_group_vals(unique_group_ids[i], pref, data);
                group_ids_with_scores.push([unique_group_ids[i], id_vals]);
                console.log(unique_group_ids[i]);
                console.log(id_vals);
                console.log([unique_group_ids[i], id_vals]);
            }
            console.log("end second get_group_vals");
            //okay, should have all the group_vals now.
            //now get the distances
            var with_euclid = [];
            console.log(group_ids_with_scores);
            for(var i = 0; i < group_ids_with_scores.length; ++i){
                if(my_group_id !== group_ids_with_scores[0]) {
                    with_euclid.push([euclid_distance(my_group_vals, group_ids_with_scores[i][1]), group_ids_with_scores[i][0]]);
                }
            }
            console.log("end euclid_distance");


            with_euclid.sort(function(a, b){return a[0] - b[0]});
            console.log("WITH EUCLID" + with_euclid);
            console.log("With_euclid length" + with_euclid.length);
            console.log(with_euclid);
            var best_matches = []; //array of group ids
            for(var i = 0; i < with_euclid.length; ++i){
                best_matches.push(with_euclid[i][1]);
            }
            var without_me = [];
            for(var i = 0; i < with_euclid.length; ++i){
                if(my_group_id != best_matches[i]){
                    without_me.push(best_matches[i]);
                }
            }
            best_matches = without_me;
            console.log("best matches=-=-=-=-=-=-=-=-=-=-=-=" + best_matches);
            var url = 'match.php';
            var form2 = $('<form action="' + url + '" method="post">' +
                '<input type="hidden" name="groupid" value="' + JSON.stringify(best_matches) + '" />' +
                '</form>');
            $('body').append(form2);
            form2.submit();
            return best_matches;
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
            alert("An error occur: "+err+".\nPlease try again later.");
            location.reload();
        }
    });
    /*var potential_matches = [];
     var with_scores = [];
     for(var i = 0; i < potential_matches.length; ++i){
     with_scores.push([potential_matches[i], get_group_vals(potential_matches[i], pref)]);
     }
     //now thal all the potential matches have their scores, get the Euclid distances
     try{
     var with_euclid = []
     for (var i = 0; i < with_scores.length; ++i){
     with_euclid.push([euclid_distance(my_group_vals, with_scores[i][1]), with_scores[0]]);
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
     best_matches.push(with_euclid[i][1]);
     }*/

    // return best_matches; //might still need? DEBUGGING IF NOT
}


 $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
 })

 $(document).ready(function(){
    $("#request1").click(function() {
        if ($("#contentx").hasClass("hidden")) {
            $("#contentx").removeClass("hidden");
            $("#expand").addClass("hidden");
        }
        else {
            $("#contentx").addClass("hidden");
            $("#expand").removeClass("hidden");
        }
    });
    var preferences = [true,true,true,true,true,true,true,true,true,true,true];
    $("#button").click(function(){
        if($('#smoking').is(":checked")){
            preferences[0]=false;
        }
        if($('#bedtime').is(":checked")){
            preferences[1]=false;
        }
        if($('#mornnight').is(":checked")){
            preferences[2]=false;
        }
        if($('#pets').is(":checked")){
            preferences[3]=false;
        }
        if($('#schedule').is(":checked")){
            preferences[4]=false;
        }
        if($('#mess').is(":checked")){
            preferences[5]=false;
        }
        if($('#drink').is(":checked")){
            preferences[6]=false;
        }
        if($('#party').is(":checked")){
            preferences[7]=false;
        }
        if($('#tv').is(":checked")){
            preferences[8]=false;
        }
        if($('#gamer').is(":checked")){
            preferences[9]=false;
        }
        if($('#music').is(":checked")){
            preferences[10]=false;
        }
        console.log(preferences);
        //CHANGE THIS TO BE FOR THE GROUP_ID OF THE PERSON WHO IS CLICKING THE BUTTON
        var matches = match_similar(1, preferences);
    });
});
