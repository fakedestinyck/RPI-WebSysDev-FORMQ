$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
			alert("put code to remove from the database here");
		});
	});
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

});
