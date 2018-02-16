      $(document).ready(function(){
          var counter=0;
          $("#secondI").hide();
          $("#secondG").hide();
          $("#life").hide();
          $("#pref").hide();
          $("#campus").hide();
          function next(){
            if (counter==2){
                  $("#first").hide();
                  $("#secondG").show();
                  $("#button").show();
              } else if (counter==1){
                  $("#first").hide();
                  $("#singlephoto").hide();
                  $("#secondI").show();
                  $("#button").show();
                  counter=2;
              }
              if (counter==3){
                  $("#campus").show();
                  $("#secondI").hide();
                  $("#secondG").hide();
                  $("#button").hide();
              }
              if (counter==5){
                  alert("you got offcamp");
                  $("#campus").hide();
                  $("#button").show();
                  $("#life").show();
              } else if (counter==4){
                  alert("you got oncamp");
                  $("#campus").hide();
                  $("#button").show();
                  $("#life").show();
                  counter=5;
              }
              if (counter==6){
                  $("#life").hide();
                  $("#pref").show();
              }
              counter+=1;
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
      });