$(document).ready(function(){
    function sendToDatabase(content, column) {
        $.ajax({
            url: 'api/storedata.php',
            type: 'post',
            data: {'action': 'store', 'column': column, 'content': content},
            success: function(data) {
                var responseStatus = data.status;
                if (responseStatus !== 0) {
                    alert(data.error+".\nPlease try again later.");
                } else {
                    console.log('submit success');
                    location.reload();
                }
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                alert("An error occur: "+err+".\nPlease try again later.");
                location.reload();
            }
        });
    }
});

function jump(){
    window.location.href = "questionaire.php?edit=true";
}
