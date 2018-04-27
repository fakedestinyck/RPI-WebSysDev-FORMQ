// When a user is banned from the dashboard
function banClick(idno) {
	if (confirm("Are you sure you want to blacklist this user?")) {
		window.location.href = "/admin_dashboard.php?b="+idno;
	}
}

// A report is ignored
function ignoreClick(idno) {
	if (confirm("Are you sure you want to ignore this report?")) {
		window.location.href = "/admin_dashboard.php?i="+idno;

	}
}

//  Used for the mobile open/close menu
function removeHidden() {
	if ($('#symbol').hasClass('glyphicon-plus')) {
		$('#symbol').removeClass('glyphicon-plus').addClass('glyphicon-minus');
		$('#reported_content').removeClass('hidden-xs');
	}
	else {
		$('#symbol').addClass('glyphicon-plus').removeClass('glyphicon-minus');
		$('#reported_content').addClass('hidden-xs');	
	}
}