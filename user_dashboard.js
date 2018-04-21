$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
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

function removeRequest(idno){
	if (confirm("Are you sure you want to remove this request?")){
		window.location.href = "user_dashboard.php?r="+idno;
	};
};

function addRequest(idno){
	if (confirm("Are you sure you want to add this member?")){
		window.location.href = "user_dashboard.php?y="+idno;
	};
};

