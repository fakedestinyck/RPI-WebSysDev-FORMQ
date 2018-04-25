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
function removeMember(idno){
	if (confirm("Are you sure you want to remove this member from your group?")){
		window.location.href = "user_dashboard.php?d="+idno;
	};
};

$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
		});
	});
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
		});
	});
  //ALLOWS USERS TO ENTER MORE RCS ids FOR ADDITIONAL TEAM MEMBERS
  $("#addbutton").click(function(){;
      addRequest($("#groupmember1").val());
      console.log(rcsid);

  });
  //ALLOWS USERS TO REMOVE RCSIDS
  $("#removebutton").click(function(){
      removeRequest($("#groupmemberr").val());
      console.log("#groupmemberr");
  });
});
