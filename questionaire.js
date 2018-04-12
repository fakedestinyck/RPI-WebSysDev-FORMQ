  $(document).ready(function(){
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
      //gamerslider
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
      $("#secondI").hide();
      $("#secondG").hide();
      $("#life").hide();
      $("#pref").hide();
      $("#campus").hide();
      jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
      });
      function next(){
          if (counter==3){

              var form = $("#myform");
              form.validate();
              if (form.valid()) {
                  console.log("valid!");
              }
              var name = $("#individual_name").val();
              var rin = $("#individual_rin").val();
              var email = $("#individual_email").val();
              var age = $("#individual_age").val();
              var year = $("#individual_year").val();
              var content = {
                  "name" : name,
                  "rin" : rin,
                  "email" : email,
                  "age" : age,
                  "year" : year
              };
              sendToDatabase(JSON.stringify(content),"user");
          }
          if (counter==6){
              // alert("6");
              // $("#life").hide();
              // $("#pref").show();
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
      });

      // post result to database
      function sendToDatabase(content, column) {
          $.ajax({
              url: 'api/storedata.php',
              type: 'post',
              data: {'action': 'store', 'column': column, 'content': content},
              success: function(data) {
                  var responseData = data.content;
                  console.log(responseData);
                  if (counter==3){
                      $("#campus").show();
                      $("#secondI").hide();
                      $("#secondG").hide();
                      $("#button").hide();
                  }
                  if (counter==6){
                      alert("6");
                      $("#life").hide();
                      $("#pref").show();
                  }
                  if (counter==7){
                      alert("7");
                      location.href = 'profile.php';
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