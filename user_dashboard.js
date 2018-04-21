$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
		});
	});
});

function removeRequest(idno){
	if (confirm("Are you sure you want to remove this request?")){
		window.location.href = "user_dashboard.php?r="+idno;
	};
};

function function_name(idno){
	if (confirm("Are you sure you want to add this member?")){
		window.location.href = "user_dashboard.php?y="+idno;
	};
};