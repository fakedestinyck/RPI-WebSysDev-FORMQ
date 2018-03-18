$(document).ready(function(){
	$(".close").click(function(){
		$(this).parent().parent().slideUp("slow", function(){
			alert("put code to remove from the database here");
		});
	}); 
});