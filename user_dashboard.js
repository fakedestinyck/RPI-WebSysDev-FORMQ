
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
  membercounter = 1;
  var rcsid = [];
  //ALLOWS USERS TO ENTER MORE RCS ids FOR ADDITIONAL TEAM MEMBERS
  $("#addbutton").click(function(){
       rcsid.push($("#groupmember"+membercounter).val());
       addRequest($("#groupmember"+membercounter).val());
      if (membercounter<=9){
          membercounter +=1;
          $("#addrcs").append('<input type="text" class="form-control" id="groupmember'+membercounter+'" placeholder="RCS ID" name="groupmember'+membercounter+'" required>');
      } else {
          alert("You can't make a group larger than 10! Sorry")
      }
      console.log(rcsid);
  })
});
