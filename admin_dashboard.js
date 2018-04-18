function banClick(idno) {
	if (confirm("Are you sure you want to blacklist this user?")) {
		$('#' + idno).hide();
		window.location.href = "/admin_dashboard.php?b="+idno;
	}
}

function ignoreClick(idno) {
	if (confirm("Are you sure you want to ignore this report?")) {
		$('#' + idno).hide();
		window.location.href = "/admin_dashboard.php?i="+idno;

	}
}

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