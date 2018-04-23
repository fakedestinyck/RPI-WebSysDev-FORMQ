
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
$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
		});
	});
$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
		});
	});
  //ALLOWS USERS TO ENTER MORE RCS ids FOR ADDITIONAL TEAM MEMBERS
  $("#addbutton").click(function(){;
      addRequest($("#groupmember1").val());
      console.log(rcsid);
  })
});
