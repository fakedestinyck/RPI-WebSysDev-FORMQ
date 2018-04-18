  $(document).ready(function(){
      membercounter = 1;
      //ALLOWS USERS TO ENTER MORE RCS ids FOR ADDITIONAL TEAM MEMBERS
      $("#addbutton").click(function(){
          if (membercounter<=9){
              membercounter +=1;
              $("#toadd").append('<div class="form-group"><label for="groupmember' + membercounter + '">Enter another RCS ID:</label><div id="groupmembers"><input type="text" class="form-control" id="groupmember' + membercounter + '" placeholder="RCSID" name="groupmember' + membercounter + '" required></div></div>');
          } else {
              alert("You can't make a group larger than 10! Sorry")
          }
      });
      //FOR ALL OF THE SLIDERS
      //reference https://www.w3schools.com/howto/howto_js_rangeslider.asp
      //scheduleslider
      var slider1 = document.getElementById("schedule");
      var output1 = document.getElementById("scheduleoutput");
      output1.innerHTML = slider1.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider1.oninput = function() {
          output1.innerHTML = this.value;
      }
      //messslider
      var slider2 = document.getElementById("mess");
      var output2 = document.getElementById("messoutput");
      output2.innerHTML = slider2.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider2.oninput = function() {
          output2.innerHTML = this.value;
      }
      //drinkslider
      var slider3 = document.getElementById("drink");
      var output3 = document.getElementById("drinkoutput");
      output3.innerHTML = slider3.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider3.oninput = function() {
          output3.innerHTML = this.value;
      }
      //tvslider
      var slider4 = document.getElementById("tv");
      var output4 = document.getElementById("tvoutput");
      output4.innerHTML = slider4.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider4.oninput = function() {
          output4.innerHTML = this.value;
      }
      //gamerslider
      var slider5 = document.getElementById("gamer");
      var output5 = document.getElementById("gameroutput");
      output5.innerHTML = slider5.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider5.oninput = function() {
          output5.innerHTML = this.value;
      }
      //musicslider
      var slider6 = document.getElementById("music");
      var output6 = document.getElementById("musicoutput");
      output6.innerHTML = slider6.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider6.oninput = function() {
          output6.innerHTML = this.value;
      }
      //partyslider
      var slider7 = document.getElementById("party");
      var output7 = document.getElementById("partyoutput");
      output7.innerHTML = slider7.value; // Display the default slider value
      // Update the current slider value (each time you drag the slider handle)
      slider7.oninput = function() {
          output7.innerHTML = this.value;
      }
      //to make different parts of questionnaire hide/show
      var counter=0;
      var isGroupOrNot = false;
      var onOrOffCamput = 'off campus';
      $("#secondI").hide();
      $("#secondG").hide();
      $("#life").hide();
      $("#pref").hide();
      $("#campus").hide();
      function next(){
          if (counter==3){
              var content;
              var column;
              if (isGroupOrNot) {
                  var name = $("#group_name").val();
                  var rin = $("#group_rin").val();
                  var email = $("#group_email").val();
                  var age = $("#group_age").val();
                  var year = $("#group_year").val();
                  var budget = $("#group_budget").val();
                  var number = $("#group_number").val();
                  var gender = $("#group_gender").val();
                  var coed = $("#group_coed").val();
                  content = [
                      {
                          "name" : name,
                          "rin" : rin,
                          "email" : email,
                          "in_group" : "yes"
                      },
                      {
                          "age" : age,
                          "year" : year,
                          "budget" : budget,
                          "number" : number,
                          "gender" : gender,
                          "coed" : coed
                      },
                      {
                          "desired_num" : number
                      }
                  ];
                  column = ["user","profile","group"];
              } else {
                  var name = $("#individual_name").val();
                  var rin = $("#individual_rin").val();
                  var email = $("#individual_email").val();
                  var age = $("#individual_age").val();
                  var year = $("#individual_year").val();
                  var budget = $("#individual_budget").val();
                  var number = $("#individual_number").val();
                  var gender = $("#individual_gender").val();
                  var coed = $("#individual_coed").val();
                  content = [
                      {
                          "name" : name,
                          "rin" : rin,
                          "email" : email
                      },
                      {
                          "age" : age,
                          "year" : year,
                          "budget" : budget,
                          "number" : number,
                          "gender" : gender,
                          "coed" : coed
                      }
                  ];
                  column = ["user","profile"];

              }
              sendToDatabase(JSON.stringify(content),JSON.stringify(column));

          }
          if (counter==6){
              // alert("6");
              // $("#life").hide();
              // $("#pref").show();
              var allergies = $('#allergies').val();
              var smoke = $('#smoke').val();
              var bedtime = $('#bedtime').val();
              var mornnight = $('#mornnight').val();
              var pets = $('#pets').val();
              var content = [
                  {
                      "q1" : allergies,
                      "q2" : smoke,
                      "q3" : bedtime,
                      "q4" : mornnight,
                      "q5" : pets,
                      "q6" : slider1.value,
                      "q7" : slider2.value,
                      "q8" : slider3.value,
                      "q9" : slider7.value,
                      "q10" : slider4.value,
                      "q11" : slider5.value,
                      "q12" : slider6.value
                  },
                  {
                      "on/off campus" : onOrOffCamput
                  }
              ];
              var column;
              if (isGroupOrNot) {
                  column = ["group_answers","profile"];
              } else {
                  column = ["answers","profile"];
              }
              sendToDatabase(JSON.stringify(content),JSON.stringify(column));
          }
          if (counter==7){
              alert("7");
              location.href = 'profile.php';
          }
          if (counter==2){
              $("#first").hide();
              $("#secondG").show();
              $("#button").show();
              counter+=1;
              isGroupOrNot = true;
          } else if (counter==1){
              $("#first").hide();
              $("#singlephoto").hide();
              $("#secondI").show();
              $("#button").show();
              counter=3;
          }
          if (counter==5){
              $("#campus").hide();
              $("#button").show();
              $("#life").show();
              counter+=1;
          } else if (counter==4){
              $("#campus").hide();
              $("#button").show();
              $("#life").show();
              counter=6;
              onOrOffCamput = 'on campus';
          }
          // counter+=1;
      }
      $("#button").hide();
      $("#groupphoto").click(function(){
          counter=2;
          next();
      });
      $("#singlephoto").click(function(){
          counter=1;
          next();
      });
      $("#ocampus").click(function(){
          counter=4;
          next();
      });
      $("#offcampus").click(function(){
          counter=5;
          next();
      });
      $("#button").click(function(){
          next();
          return false;
      });

      // post result to database
      function sendToDatabase(content, column) {
          $.ajax({
              url: 'api/storedata.php',
              type: 'post',
              data: {'action': 'store', 'column': column, 'content': content},
              success: function(data) {
                  var responseStatus = data.status;
                  if (responseStatus !== 0) {
                      alert(data.error+".\nPlease try again later.");
                  } else {
                      console.log('submit success');
                      if (counter===3){
                          $("#campus").show();
                          $("#secondI").hide();
                          $("#secondG").hide();
                          $("#button").hide();
                      }
                      if (counter===6){
                          // $("#life").hide();
                          // $("#pref").show();
                          counter++;
                      }
                      if (counter===7){
                          location.href = 'profile.php';
                      }
                  }
              },
              error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                  alert("An error occur: "+err+".\nPlease try again later.");
                  location.reload();
              }
          });
      }
  });
