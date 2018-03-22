$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
			alert("put code to remove from the database here");
		});
	}); 
});

function blacklistClick(idno) {
	if (confirm("Are you sure you want to blacklist this user?")) {
		$('#' + idno).hide();
	}
}

function ignoreClick(idno) {
	if (confirm("Are you sure you want to ignore this report?")) {
		$('#' + idno).hide();
	}
}