$(document).ready(function(){
    // $("#button").click(function(){
    //     var name = $("#individual_name").val();
    //     var rin = $("#individual_rin").val();
    //     var email = $("#individual_email").val();
    //     var age = $("#individual_age").val();
    //     var year = $("#individual_year").val();
    //     var budget = $("#individual_budget").val();
    //     var number = $("#individual_number").val();
    //     var gender = $("#individual_gender").val();
    //     var coed = $("#individual_coed").val();
    //     var content = [
    //         {
    //             "name" : name,
    //             "rin" : rin,
    //             "email" : email
    //         },
    //         {
    //             "age" : age,
    //             "year" : year,
    //             "budget" : budget,
    //             "number" : number,
    //             "gender" : gender,
    //             "coed" : coed
    //         }
    //     ];
    //     var column = ["user","profile"];
    //     sendToDatabase(JSON.stringify(content),JSON.stringify(column));
    // });


    // post result to database
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
